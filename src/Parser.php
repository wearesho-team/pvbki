<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\Pvbki\Elements\Collateral;
use Wearesho\Pvbki\Elements\Contract;
use Wearesho\Pvbki\Elements\Record;

/**
 * Class Parser
 * @package Wearesho\Pvbki
 */
class Parser
{
    protected const STRING = 0;
    protected const INT = 1;
    protected const FLOAT = 2;
    protected const DATE = 3;
    protected const TRANSLATION = 4;

    /** @var \DOMDocument */
    private $domDocument;

    /** @var \SimpleXMLElement */
    private $simpleXmlDocument;

    // todo: need refactor and optimization
    public function parse(string $reportXml): StatementReport
    {
        $this->domDocument = new \DOMDocument('1.0', 'utf-8');
        $this->domDocument->loadXML($reportXml);

        $errors = new Collections\Errors();

        $errorXmlCollection = $this->domDocument->getElementsByTagName(Elements\Error::ROOT);

        /** @var \DOMElement $errorXml */
        foreach ($errorXmlCollection as $errorXml) {
            $error = simplexml_import_dom($errorXml);
            $errors->append(new Elements\Error(
                (string)$error->{Elements\Error::CODE},
                (string)$error->{Elements\Error::MESSAGE},
                (string)$error->{Elements\Error::TYPE}
            ));
        }

        /** @var \DOMElement $report */
        $report = $this->domDocument->getElementsByTagName('Statement')[0];
        $this->simpleXmlDocument = simplexml_import_dom($report);

        // todo: add schema validation

        $attributes = $this->simpleXmlDocument->attributes();
        $report = new StatementReport(
            (bool)$attributes[StatementReport::PROTECTION],
            Carbon::make((string)$attributes[StatementReport::GENERATED]),
            (string)$attributes[StatementReport::POWERED],
            $errors,
            new Elements\Subject(...$this->fetchElements(
                $this->simpleXmlDocument->{Elements\Subject::tag()},
                Elements\Subject::arguments()
            )),
            $this->fillCollection(new Collections\Identifiers()),
            $this->fillCollection(new Collections\Communications()),
            $this->fillCollection(new Collections\Addresses()),
            $this->fillCollection(new Collections\Dependants()),
            $this->fillCollection(new Collections\MonthlyIncomes()),
            $this->fillCollection(new Collections\Summaries()),
            $this->fillCollection(new Collections\Contracts()),
            $this->fillCollection(new Collections\Events()),
            new Elements\Scoring(...$this->fetchElements(
                $this->simpleXmlDocument->{Elements\Scoring::tag()},
                Elements\Scoring::arguments()
            ))
        );

        /** @var Contract $contract */
        foreach ($report->getContracts() as $contract) {
            $id = $contract->getContractId();

            foreach ($this->simpleXmlDocument->{Record::tag()} as $element) {
                if ((string)$element->{Record::CONTRACT_ID} === $id) {
                    $contract->getRecords()->append(new Record(...$this->fetchElements(
                        $element,
                        Record::arguments()
                    )));
                }
            }

            foreach ($this->simpleXmlDocument->{Collateral::tag()} as $element) {
                if ((string)$element->{Collateral::CONTRACT_ID} === $id) {
                    $contract->getCollaterals()->append(new Collateral(...$this->fetchElements(
                        $element,
                        Collateral::arguments()
                    )));
                }
            }
        }

        return $report;
    }

    private function fillCollection(Infrastructure\BaseCollection $collection): Infrastructure\BaseCollection
    {
        /** @var Infrastructure\Element $element */
        $element = $collection->type();

        return new $collection(
            array_map(function (\SimpleXMLElement $xml) use ($element): Infrastructure\Element {
                return new $element(...$this->fetchElements($xml, $element::arguments()));
            }, $this->xmlToArray($element))
        );
    }

    public function fetchElements(\SimpleXMLElement $element, Collections\RuleCollection $rules): array
    {
        $response = [];

        /** @var Rule $rule */
        foreach ($rules as $rule) {
            if ($rule->getType()->equals(Enums\RuleType::TRANSLATE())) {
                $response[] = new Sentence\Translation(
                    ...array_map(function ($code) use ($element) {
                        return (string)$element->{$code};
                    }, $rule->getArguments())
                );

                continue;
            }

            if ($rule->getType()->equals(Enums\RuleType::COLLECTION())) {
                $collectionName = $rule->getArguments()[0];
                $response[] = new $collectionName();

                continue;
            }

            $item = $element->{$rule->getArguments()[0]};

            if (empty($item)) {
                $response[] = null;

                continue;
            }

            switch ($rule->getType()->getValue()) {
                case Enums\RuleType::STRING:
                    $response[] = (string)$item;
                    break;
                case Enums\RuleType::INT:
                    $response[] = (int)$item;
                    break;
                case Enums\RuleType::FLOAT:
                    $response[] = (float)$item;
                    break;
                case Enums\RuleType::DATETIME:
                    $response[] = Carbon::make((string)$item);
                    break;
            }
        }

        return $response;
    }

    private function xmlToArray(string $element): array
    {
        $response = [];

        foreach ($this->simpleXmlDocument->{$element::tag()} as $item) {
            $response[] = $item;
        }

        return $response;
    }
}
