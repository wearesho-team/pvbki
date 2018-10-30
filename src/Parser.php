<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\BaseCollection;
use Wearesho\Pvbki\Exceptions\InvalidReportXmlStructure;

/**
 * Class Parser
 * @package Wearesho\Pvbki
 */
class Parser
{
    public function parse(string $reportXml): StatementReport
    {
        $domDocument = new \DOMDocument('1.0', 'utf-8');

        try {
            $domDocument->loadXML($reportXml);
        } catch (\Exception $exception) {
            throw new InvalidReportXmlStructure($reportXml, $exception->getCode(), $exception);
        }

        $errors = new Collections\Errors();

        $errorXmlCollection = $domDocument->getElementsByTagName(Elements\Error::ROOT);

        /** @var \DOMElement $errorXml */
        foreach ($errorXmlCollection as $errorXml) {
            $error = simplexml_import_dom($errorXml);
            $errors->append(new Elements\Error(
                $this->toString($error, Elements\Error::CODE),
                $this->toString($error, Elements\Error::MESSAGE),
                $this->toString($error, Elements\Error::TYPE)
            ));
        }

        /** @var \DOMElement $report */
        $report = $domDocument->getElementsByTagName('Statement')[0];
        $xml = simplexml_import_dom($report);

        // todo: add schema validation
        $subject = $this->fetchTag($xml, Elements\Subject::tag());
        $scoring = $this->fetchTag($xml, Elements\Scoring::tag());
        $attributes = $xml->attributes();

        return new StatementReport(
            (string)$attributes[StatementReport::PROTECTION] !== 'false',
            Carbon::make((string)$attributes[StatementReport::GENERATED]),
            (string)$attributes[StatementReport::POWERED],
            $errors,
            new Elements\Subject(
                $this->toString($subject, Elements\Subject::REQUEST_ID),
                $this->toCarbon($subject, Elements\Subject::LAST_UPDATE),
                new Enums\Entity($this->toString($subject, Elements\Subject::ENTITY)),
                new Enums\Gender($this->toInt($subject, Elements\Subject::GENDER)),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::SURNAME_UA),
                    $this->toString($subject, Elements\Subject::SURNAME_RU),
                    $this->toString($subject, Elements\Subject::SURNAME_EN)
                ),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::NAME_UA),
                    $this->toString($subject, Elements\Subject::NAME_RU),
                    $this->toString($subject, Elements\Subject::NAME_EN)
                ),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::PATRONYMIC_UA),
                    $this->toString($subject, Elements\Subject::PATRONYMIC_RU),
                    $this->toString($subject, Elements\Subject::PATRONYMIC_EN)
                ),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::BIRTH_SURNAME_UA),
                    $this->toString($subject, Elements\Subject::BIRTH_SURNAME_RU),
                    $this->toString($subject, Elements\Subject::BIRTH_SURNAME_EN)
                ),
                new Enums\Classification($this->toInt($subject, Elements\Subject::CLASSIFICATION)),
                $this->toCarbon($subject, Elements\Subject::BIRTH_DATE),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::BIRTH_PLACE_UA),
                    $this->toString($subject, Elements\Subject::BIRTH_PLACE_RU),
                    $this->toString($subject, Elements\Subject::BIRTH_PLACE_EN)
                ),
                new Enums\Residency($this->toInt($subject, Elements\Subject::RESIDENCY)),
                $this->toString($subject, Elements\Subject::CITIZENSHIP),
                new Enums\SubjectNegativeStatus($this->toInt($subject, Elements\Subject::NEGATIVE_STATUS)),
                new Enums\Education($this->toInt($subject, Elements\Subject::EDUCATION)),
                new Enums\MaritalStatus($this->toInt($subject, Elements\Subject::MARITAL_STATUS)),
                new Enums\Status($this->toInt($subject, Elements\Subject::STATUS_ID)),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::FULL_NAME_UA),
                    $this->toString($subject, Elements\Subject::FULL_NAME_RU),
                    $this->toString($subject, Elements\Subject::FULL_NAME_EN)
                ),
                new Sentence\Translation(
                    $this->toString($subject, Elements\Subject::ABBREVIATION_UA),
                    $this->toString($subject, Elements\Subject::ABBREVIATION_RU),
                    $this->toString($subject, Elements\Subject::ABBREVIATION_EN)
                ),
                new Enums\Ownership($this->toInt($subject, Elements\Subject::OWNERSHIP)),
                $this->toCarbon($subject, Elements\Subject::REGISTRATION_DATE),
                new Enums\EconomicActivity($this->toInt($subject, Elements\Subject::ECONOMIC_ACTIVITY)),
                new Enums\EmployeeCount($this->toInt($subject, Elements\Subject::EMPLOYEE_COUNT))
            ),
            $this->fetchIdentifiers($xml),
            $this->fetchCommunications($xml),
            $this->fetchAddresses($xml),
            $this->fetchDependants($xml),
            $this->fetchMonthlyIncomes($xml),
            $this->fetchSummaries($xml),
            $this->fetchContracts($xml),
            $this->fetchEvents($xml),
            new Elements\Scoring(
                $this->toString($scoring, Elements\Scoring::DEGREE),
                $this->toInt($scoring, Elements\Scoring::SCORE),
                $this->toFloat($scoring, Elements\Scoring::FAULT_CHANCE),
                $this->toString($scoring, Elements\Scoring::ADVERSE)
            )
        );
    }

    protected function fetchIdentifiers(\SimpleXMLElement $xml): Collections\Identifiers
    {
        $identifiers = new Collections\Identifiers();

        $this->fillCollection(
            $identifiers,
            function (\SimpleXMLElement $element): Elements\Identifier {
                return new Elements\Identifier(
                    new Enums\IdentificationType($this->toInt($element, Elements\Identifier::TYPE_ID)),
                    $this->toString($element, Elements\Identifier::NUMBER),
                    $this->toCarbon($element, Elements\Identifier::REGISTRATION_DATE),
                    $this->toCarbon($element, Elements\Identifier::EXPIRATION_DATE),
                    new Sentence\Translation(
                        $this->toString($element, Elements\Identifier::ISSUED_BY_UA),
                        $this->toString($element, Elements\Identifier::ISSUED_BY_RU),
                        $this->toString($element, Elements\Identifier::ISSUED_BY_EN)
                    )
                );
            },
            $xml
        );

        return $identifiers;
    }

    protected function fetchCommunications(\SimpleXMLElement $xml): Collections\Communications
    {
        $communications = new Collections\Communications();

        $this->fillCollection(
            $communications,
            function (\SimpleXMLElement $element): Elements\Communication {
                return new Elements\Communication(
                    $this->toString($element, Elements\Communication::VALUE),
                    new Enums\CommunicationType($this->toInt($element, Elements\Communication::TYPE_ID))
                );
            },
            $xml
        );

        return $communications;
    }

    protected function fetchAddresses(\SimpleXMLElement $xml): Collections\Addresses
    {
        $addresses = new Collections\Addresses();

        $this->fillCollection(
            $addresses,
            function (\SimpleXMLElement $element): Elements\Address {
                return new Elements\Address(
                    $this->toInt($element, Elements\Address::LOCATION_ID),
                    new Enums\AddressType($this->toInt($element, Elements\Address::TYPE_ID)),
                    new Sentence\Translation(
                        $this->toString($element, Elements\Address::STREET_UA),
                        $this->toString($element, Elements\Address::STREET_RU),
                        $this->toString($element, Elements\Address::STREET_EN)
                    ),
                    $this->toString($element, Elements\Address::POSTAL_CODE)
                );
            },
            $xml
        );

        return $addresses;
    }

    protected function fetchMonthlyIncomes(\SimpleXMLElement $xml): Collections\MonthlyIncomes
    {
        $monthlyIncomes = new Collections\MonthlyIncomes();

        $this->fillCollection(
            $monthlyIncomes,
            function (\SimpleXMLElement $element): Elements\MonthlyIncome {
                return new Elements\MonthlyIncome(
                    $this->toFloat($element, Elements\MonthlyIncome::VALUE),
                    $this->toString($element, Elements\MonthlyIncome::CURRENCY)
                );
            },
            $xml
        );

        return $monthlyIncomes;
    }

    protected function fetchContracts(\SimpleXMLElement $xml): Collections\Contracts
    {
        $contracts = new Collections\Contracts();

        $this->fillCollection(
            $contracts,
            function (\SimpleXMLElement $element) use ($xml): Elements\Contract {
                $contractId = $this->toString($element, Elements\Contract::CONTRACT_ID);

                return new Elements\Contract(
                    new Enums\Role($this->toInt($element, Elements\Contract::ROLE_ID)),
                    $this->toString($element, Elements\Contract::PROVIDER),
                    $contractId,
                    $this->toCarbon($element, Elements\Contract::LAST_UPDATE),
                    new Enums\Phase($this->toInt($element, Elements\Contract::PHASE_ID)),
                    $this->toString($element, Elements\Contract::CURRENCY),
                    $this->toCarbon($element, Elements\Contract::DATE_OF_SIGNATURE),
                    new Enums\CreditPurpose($this->toInt($element, Elements\Contract::CREDIT_PURPOSE)),
                    new Enums\ContractNegativeStatus($this->toInt($element, Elements\Contract::NEGATIVE_STATUS)),
                    $this->toCarbon($element, Elements\Contract::APPLICATION_DATE),
                    $this->toCarbon($element, Elements\Contract::START_DATE),
                    $this->toCarbon($element, Elements\Contract::EXPECTED_END_DATE),
                    $this->toCarbon($element, Elements\Contract::FACTUAL_END_DATE),
                    new Enums\ContractType($this->toString($element, Elements\Contract::TYPE)),
                    new Enums\PaymentMethod($this->toInt($element, Elements\Contract::PAYMENT_METHOD_ID)),
                    new Enums\PaymentPeriod($this->toInt($element, Elements\Contract::PAYMENT_PERIOD_ID)),
                    $this->toString($element, Elements\Contract::ACTUAL_CURRENCY),
                    $this->toFloat($element, Elements\Contract::TOTAL_AMOUNT),
                    $this->toFloat($element, Elements\Contract::CREDIT_LIMIT),
                    $this->toInt($element, Elements\Contract::INSTALMENT_COUNT),
                    $this->toString($element, Elements\Contract::INSTALMENT_AMOUNT_CURRENCY),
                    $this->toFloat($element, Elements\Contract::INSTALMENT_AMOUNT),
                    $this->toInt($element, Elements\Contract::REST_INSTALMENT_COUNT),
                    $this->toFloat($element, Elements\Contract::REST_AMOUNT),
                    $this->toInt($element, Elements\Contract::OVERDUE_COUNT),
                    $this->toFloat($element, Elements\Contract::OVERDUE_AMOUNT),
                    $this->fetchRecords($contractId, $xml),
                    $this->fetchCollaterals($contractId, $xml)
                );
            },
            $xml
        );

        return $contracts;
    }

    protected function fetchSummaries(\SimpleXMLElement $xml): Collections\Summaries
    {
        $summaries = new Collections\Summaries();

        $this->fillCollection(
            $summaries,
            function (\SimpleXMLElement $element): Elements\Summary {
                return new Elements\Summary(
                    new Enums\Category($this->toString($element, Elements\Summary::CATEGORY)),
                    $this->toInt($element, Elements\Summary::VALUE),
                    $this->toString($element, Elements\Summary::CODE),
                    $this->toInt($element, Elements\Summary::COUNT),
                    $this->toFloat($element, Elements\Summary::AMOUNT)
                );
            },
            $xml
        );

        return $summaries;
    }

    protected function fetchRecords(string $contractId, \SimpleXMLElement $xml): Collections\Records
    {
        $records = new Collections\Records();

        $this->fillCollection(
            $records,
            function (\SimpleXMLElement $element) use ($contractId): ?Elements\Record {
                return $contractId === $this->toString($element, Elements\Record::CONTRACT_ID)
                    ? new Elements\Record(
                        $this->toCarbon($element, Elements\Record::ACCOUNTING_DATE),
                        $this->toFloat($element, Elements\Record::REST_AMOUNT),
                        $contractId,
                        new Enums\CreditUsage($this->toInt($element, Elements\Record::CREDIT_USAGE)),
                        $this->toString($element, Elements\Record::REST_CURRENCY),
                        $this->toInt($element, Elements\Record::REST_INSTALMENT_COUNT),
                        $this->toFloat($element, Elements\Record::OVERDUE_AMOUNT),
                        $this->toString($element, Elements\Record::OVERDUE_CURRENCY),
                        $this->toInt($element, Elements\Record::OVERDUE_COUNT)
                    )
                    : null;
            },
            $xml,
            true
        );

        return $records;
    }

    protected function fetchCollaterals(string $contractId, \SimpleXMLElement $xml): Collections\Collaterals
    {
        $collaterals = new Collections\Collaterals();

        $this->fillCollection(
            $collaterals,
            function (\SimpleXMLElement $element) use ($contractId): ?Elements\Collateral {
                return $contractId === $this->toString($element, Elements\Collateral::CONTRACT_ID)
                    ? new Elements\Collateral(
                        $contractId,
                        new Enums\CollateralType($this->toInt($element, Elements\Collateral::TYPE_ID)),
                        $this->toFloat($element, Elements\Collateral::VALUE),
                        $this->toString($element, Elements\Collateral::CURRENCY),
                        new Enums\AddressType(
                            $this->toInt($element, Elements\Collateral::ADDRESS_TYPE_ID)
                        ),
                        $this->toInt($element, Elements\Collateral::LOCATION_ID),
                        new Sentence\Translation(
                            $this->toString($element, Elements\Collateral::STREET_UA),
                            $this->toString($element, Elements\Collateral::STREET_RU),
                            $this->toString($element, Elements\Collateral::STREET_EN)
                        ),
                        $this->toString($element, Elements\Collateral::POSTAL_CODE),
                        new Enums\IdentificationType(
                            $this->toInt($element, Elements\Collateral::IDENTIFICATION_TYPE_ID)
                        ),
                        $this->toString($element, Elements\Collateral::NUMBER),
                        $this->toCarbon($element, Elements\Collateral::REGISTRATION_DATE),
                        $this->toCarbon($element, Elements\Collateral::ISSUE_DATE),
                        $this->toCarbon($element, Elements\Collateral::EXPIRATION_DATE),
                        new Sentence\Translation(
                            $this->toString($element, Elements\Collateral::AUTHORITY_UA),
                            $this->toString($element, Elements\Collateral::AUTHORITY_RU),
                            $this->toString($element, Elements\Collateral::AUTHORITY_EN)
                        )
                    )
                    : null;
            },
            $xml,
            true
        );

        return $collaterals;
    }

    protected function fetchEvents(\SimpleXMLElement $xml): Collections\Events
    {
        $events = new Collections\Events();

        $this->fillCollection(
            $events,
            function (\SimpleXMLElement $element): Elements\Event {
                return new Elements\Event(
                    $this->toString($element, Elements\Event::NAME),
                    $this->toCarbon($element, Elements\Event::WHEN),
                    $this->toInt($element, Elements\Event::PROVIDER)
                );
            },
            $xml
        );

        return $events;
    }

    protected function fetchDependants(\SimpleXMLElement $xml): Collections\Dependants
    {
        $dependants = new Collections\Dependants();

        $this->fillCollection(
            $dependants,
            function (\SimpleXMLElement $element): Elements\Dependant {
                return new Elements\Dependant(
                    $this->toInt($element, Elements\Dependant::COUNT),
                    $this->toInt($element, Elements\Dependant::TYPE_ID)
                );
            },
            $xml
        );

        return $dependants;
    }

    private function fillCollection(
        BaseCollection $collection,
        \Closure $callback,
        \SimpleXMLElement $xml,
        bool $filter = false
    ): void {
        $items = array_map($callback, $this->toArray($xml, $collection->type()));

        foreach ($filter ? array_filter($items) : $items as $item) {
            $collection->append($item);
        }
    }

    private function toCarbon(\SimpleXMLElement $element, string $tagName): ?Carbon
    {
        return Carbon::make($this->toString($element, $tagName));
    }

    private function toFloat(\SimpleXMLElement $element, string $tagName, $alternateValue = null): ?float
    {
        return (float)$this->fetchTag($element, $tagName) ?: $alternateValue;
    }

    private function toString(\SimpleXMLElement $element, string $tagName, $alternateValue = null): ?string
    {
        return (string)$this->fetchTag($element, $tagName) ?: $alternateValue;
    }

    private function toInt(\SimpleXMLElement $element, string $tagName, $alternateValue = null): ?int
    {
        return (int)$this->fetchTag($element, $tagName) ?: $alternateValue;
    }

    private function toArray(\SimpleXMLElement $element, string $class): array
    {
        $response = [];

        /** @var Infrastructure\Element $class */
        foreach ($this->fetchTag($element, $class::tag()) as $item) {
            $response[] = $item;
        }

        return $response;
    }

    private function fetchTag(\SimpleXMLElement $element, string $tagName): \SimpleXMLElement
    {
        return $element->{$tagName};
    }
}
