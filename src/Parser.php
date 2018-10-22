<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\Pvbki\Collections\Events;
use Wearesho\Pvbki\Collections\Identifiers;
use Wearesho\Pvbki\Collections\RuleCollection;
use Wearesho\Pvbki\Elements\Error;
use Wearesho\Pvbki\Elements\Scoring;
use Wearesho\Pvbki\Elements\Subject;
use Wearesho\Pvbki\Enums\RuleType;
use Wearesho\Pvbki\Infrastructure\BaseCollection;
use Wearesho\Pvbki\Infrastructure\Element;
use Wearesho\Pvbki\Sentence\Translation;

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
                Subject::arguments()
            )),
            $this->fillCollection(new Collections\Identifiers()),
            $this->fillCollection(new Collections\Communications()),
            $this->fillCollection(new Collections\Addresses()),
            $this->fillCollection(new Collections\Dependants()),
            $this->fillCollection(new Collections\MonthlyIncomes()),
            $this->fillCollection(new Collections\Summaries()),
            $this->fillCollection(new Collections\Contracts()),
            $this->fillCollection(new Events()),
            new Scoring(...$this->fetchElements(
                $this->simpleXmlDocument->{Scoring::tag()},
                Scoring::arguments()
            ))
        );

        // todo: fill records and collaterals

        return $report;
    }

    private function fillCollection(BaseCollection $collection): BaseCollection
    {
        /** @var Element $element */
        $element = $collection->type();

        return new $collection(
            array_map(function (\SimpleXMLElement $xml) use ($element): Element {
                return new $element(...$this->fetchElements($xml, $element::arguments()));
            }, $this->xmlToArray($element))
        );
    }

    public function fetchElements(\SimpleXMLElement $element, RuleCollection $rules): array
    {
        $response = [];

        /** @var Rule $rule */
        foreach ($rules as $rule) {
            if ($rule->getType()->equals(RuleType::TRANSLATE())) {
                $response[] = new Translation(
                    ...array_map(function ($code) use ($element) {
                        return (string)$element->{$code};
                    }, $rule->getArguments())
                );

                continue;
            }

            if ($rule->getType()->equals(RuleType::COLLECTION())) {
                $collectionName = $rule->getArguments()[0];
                $response[] = new $collectionName();

                continue;
            }

            $item = $element->{$rule->getArguments()[0]};

            switch ($rule->getType()->getValue()) {
                case RuleType::STRING:
                    $response[] = (string)$item;
                    break;
                case RuleType::INT:
                    $response[] = (int)$item;
                    break;
                case RuleType::FLOAT:
                    $response[] = (float)$item;
                    break;
                case RuleType::DATETIME:
                    $response[] = Carbon::make((string)$item);
                    break;
                default:
                    $response[] = null;
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
