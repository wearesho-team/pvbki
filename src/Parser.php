<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;

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
        $subject = $this->simpleXmlDocument->{Elements\Subject::tag()};
        $scoring = $this->simpleXmlDocument->{Elements\Scoring::tag()};
        $attributes = $this->simpleXmlDocument->attributes();

        return new StatementReport(
            (string)$attributes[StatementReport::PROTECTION] === 'false'
                ? false : true,
            Carbon::make((string)$attributes[StatementReport::GENERATED]),
            (string)$attributes[StatementReport::POWERED],
            $errors,
            new Elements\Subject(
                (string)$subject->{Elements\Subject::REQUEST_ID} ?: null,
                Carbon::make((string)$subject->{Elements\Subject::LAST_UPDATE} ?: null),
                new Enums\Entity((string)$subject->{Elements\Subject::ENTITY} ?: null),
                new Enums\Gender((int)$subject->{Elements\Subject::GENDER} ?: null),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::SURNAME_UA} ?: null,
                    (string)$subject->{Elements\Subject::SURNAME_RU} ?: null,
                    (string)$subject->{Elements\Subject::SURNAME_EN} ?: null
                ),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::NAME_UA} ?: null,
                    (string)$subject->{Elements\Subject::NAME_RU} ?: null,
                    (string)$subject->{Elements\Subject::NAME_EN} ?: null
                ),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::PATRONYMIC_UA} ?: null,
                    (string)$subject->{Elements\Subject::PATRONYMIC_RU} ?: null,
                    (string)$subject->{Elements\Subject::PATRONYMIC_EN} ?: null
                ),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::BIRTH_SURNAME_UA} ?: null,
                    (string)$subject->{Elements\Subject::BIRTH_SURNAME_RU} ?: null,
                    (string)$subject->{Elements\Subject::BIRTH_SURNAME_EN} ?: null
                ),
                new Enums\Classification((int)$subject->{Elements\Subject::CLASSIFICATION}),
                Carbon::make((string)$subject->{Elements\Subject::BIRTH_DATE} ?: null),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::BIRTH_PLACE_UA} ?: null,
                    (string)$subject->{Elements\Subject::BIRTH_PLACE_RU} ?: null,
                    (string)$subject->{Elements\Subject::BIRTH_PLACE_EN} ?: null
                ),
                new Enums\Residency((int)$subject->{Elements\Subject::RESIDENCY} ?: null),
                (string)$subject->{Elements\Subject::CITIZENSHIP} ?: null,
                new Enums\SubjectNegativeStatus((int)$subject->{Elements\Subject::NEGATIVE_STATUS} ?: null),
                new Enums\Education((int)$subject->{Elements\Subject::EDUCATION} ?: null),
                new Enums\MaritalStatus((int)$subject->{Elements\Subject::MARITAL_STATUS} ?: null),
                new Enums\Status((int)$subject->{Elements\Subject::STATUS_ID} ?: null),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::FULL_NAME_UA} ?: null,
                    (string)$subject->{Elements\Subject::FULL_NAME_RU} ?: null,
                    (string)$subject->{Elements\Subject::FULL_NAME_EN} ?: null
                ),
                new Sentence\Translation(
                    (string)$subject->{Elements\Subject::ABBREVIATION_UA} ?: null,
                    (string)$subject->{Elements\Subject::ABBREVIATION_RU} ?: null,
                    (string)$subject->{Elements\Subject::ABBREVIATION_EN} ?: null
                ),
                new Enums\Ownership((int)$subject->{Elements\Subject::OWNERSHIP} ?: null),
                Carbon::make((string)$subject->{Elements\Subject::REGISTRATION_DATE} ?: null),
                new Enums\EconomicActivity((int)$subject->{Elements\Subject::ECONOMIC_ACTIVITY} ?: null),
                new Enums\EmployeeCount((int)$subject->{Elements\Subject::EMPLOYEE_COUNT} ?: null)
            ),
            new Collections\Identifiers(array_map(function (\SimpleXMLElement $element): Elements\Identifier {
                return new Elements\Identifier(
                    new Enums\IdentificationType((int)$element->{Elements\Identifier::TYPE_ID} ?: null),
                    (string)$element->{Elements\Identifier::NUMBER} ?: null,
                    Carbon::make((string)$element->{Elements\Identifier::REGISTRATION_DATE} ?: null),
                    Carbon::make((string)$element->{Elements\Identifier::EXPIRATION_DATE} ?: null),
                    new Sentence\Translation(
                        (string)$element->{Elements\Identifier::ISSUED_BY_UA} ?: null,
                        (string)$element->{Elements\Identifier::ISSUED_BY_RU} ?: null,
                        (string)$element->{Elements\Identifier::ISSUED_BY_EN} ?: null
                    )
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Identifier::tag()}))),
            new Collections\Communications(array_map(function (\SimpleXMLElement $element): Elements\Communication {
                return new Elements\Communication(
                    (string)$element->{Elements\Communication::VALUE},
                    new Enums\CommunicationType((int)$element->{Elements\Communication::TYPE_ID} ?: null)
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Communication::tag()}))),
            new Collections\Addresses(array_map(function (\SimpleXMLElement $element): Elements\Address {
                return new Elements\Address(
                    (int)$element->{Elements\Address::LOCATION_ID},
                    new Enums\AddressType((int)$element->{Elements\Address::TYPE_ID} ?: null),
                    new Sentence\Translation(
                        (string)$element->{Elements\Address::STREET_UA} ?: null,
                        (string)$element->{Elements\Address::STREET_RU} ?: null,
                        (string)$element->{Elements\Address::STREET_EN} ?: null
                    ),
                    (string)$element->{Elements\Address::POSTAL_CODE} ?: null
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Address::tag()}))),
            new Collections\Dependants(array_map(function (\SimpleXMLElement $element): Elements\Dependant {
                return new Elements\Dependant(
                    (int)$element->{Elements\Dependant::COUNT},
                    (int)$element->{Elements\Dependant::TYPE_ID} ?: null
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Dependant::tag()}))),
            new Collections\MonthlyIncomes(array_map(function (\SimpleXMLElement $element): Elements\MonthlyIncome {
                return new Elements\MonthlyIncome(
                    (float)$element->{Elements\MonthlyIncome::VALUE} ?: null,
                    (string)$element->{Elements\MonthlyIncome::CURRENCY} ?: null
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\MonthlyIncome::tag()}))),
            new Collections\Summaries(array_map(function (\SimpleXMLElement $element): Elements\Summary {
                return new Elements\Summary(
                    new Enums\Category((string)$element->{Elements\Summary::CATEGORY} ?: null),
                    (int)$element->{Elements\Summary::VALUE} ?: null,
                    (string)$element->{Elements\Summary::CODE} ?: null,
                    (int)$element->{Elements\Summary::COUNT} ?: null,
                    (float)$element->{Elements\Summary::AMOUNT} ?: null
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Summary::tag()}))),
            new Collections\Contracts(array_map(function (\SimpleXMLElement $element): Elements\Contract {
                $contractId = (string)$element->{Elements\Contract::CONTRACT_ID};

                return new Elements\Contract(
                    new Enums\Role((int)$element->{Elements\Contract::ROLE_ID} ?: null),
                    (string)$element->{Elements\Contract::PROVIDER} ?: null,
                    $contractId,
                    Carbon::make((string)$element->{Elements\Contract::LAST_UPDATE} ?: null),
                    new Enums\Phase((int)$element->{Elements\Contract::PHASE_ID} ?: null),
                    (string)$element->{Elements\Contract::CURRENCY} ?: null,
                    Carbon::make((string)$element->{Elements\Contract::DATE_OF_SIGNATURE} ?: null),
                    new Enums\CreditPurpose((int)$element->{Elements\Contract::CREDIT_PURPOSE} ?: null),
                    new Enums\ContractNegativeStatus((int)$element->{Elements\Contract::NEGATIVE_STATUS} ?: null),
                    Carbon::make((string)$element->{Elements\Contract::APPLICATION_DATE} ?: null),
                    Carbon::make((string)$element->{Elements\Contract::START_DATE} ?: null),
                    Carbon::make((string)$element->{Elements\Contract::EXPECTED_END_DATE} ?: null),
                    Carbon::make((string)$element->{Elements\Contract::FACTUAL_END_DATE} ?: null),
                    new Enums\ContractType((string)$element->{Elements\Contract::TYPE} ?: null),
                    new Enums\PaymentMethod((int)$element->{Elements\Contract::PAYMENT_METHOD_ID} ?: null),
                    new Enums\PaymentPeriod((int)$element->{Elements\Contract::PAYMENT_PERIOD_ID} ?: null),
                    (string)$element->{Elements\Contract::ACTUAL_CURRENCY} ?: null,
                    (float)$element->{Elements\Contract::TOTAL_AMOUNT} ?: null,
                    (float)$element->{Elements\Contract::CREDIT_LIMIT} ?: null,
                    (int)$element->{Elements\Contract::INSTALMENT_COUNT} ?: null,
                    (string)$element->{Elements\Contract::INSTALMENT_AMOUNT_CURRENCY} ?: null,
                    (float)$element->{Elements\Contract::INSTALMENT_AMOUNT} ?: null,
                    (int)$element->{Elements\Contract::REST_INSTALMENT_COUNT} ?: null,
                    (float)$element->{Elements\Contract::REST_AMOUNT} ?: null,
                    (int)$element->{Elements\Contract::OVERDUE_COUNT} ?: null,
                    (float)$element->{Elements\Contract::OVERDUE_AMOUNT} ?: null,
                    new Collections\Records(array_filter(
                        array_map(function (\SimpleXMLElement $element) use ($contractId): ?Elements\Record {
                            return $contractId === (string)$element->{Elements\Record::CONTRACT_ID}
                                ? new Elements\Record(
                                    Carbon::make((string)$element->{Elements\Record::ACCOUNTING_DATE}),
                                    (float)$element->{Elements\Record::REST_AMOUNT},
                                    $contractId,
                                    new Enums\CreditUsage((int)$element->{Elements\Record::CREDIT_USAGE} ?: null),
                                    (string)$element->{Elements\Record::REST_CURRENCY} ?: null,
                                    (int)$element->{Elements\Record::REST_INSTALMENT_COUNT} ?: null,
                                    (float)$element->{Elements\Record::OVERDUE_AMOUNT} ?: null,
                                    (string)$element->{Elements\Record::OVERDUE_CURRENCY} ?: null,
                                    (int)$element->{Elements\Record::OVERDUE_COUNT} ?: null
                                )
                                : null;
                        }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Record::tag()}))
                    )),
                    new Collections\Collaterals(array_filter(
                        array_map(function (\SimpleXMLElement $element) use ($contractId): Elements\Collateral {
                            return $contractId === (string)$element->{Elements\Collateral::CONTRACT_ID}
                                ? new Elements\Collateral(
                                    $contractId,
                                    new Enums\CollateralType((int)$element->{Elements\Collateral::TYPE_ID} ?: null),
                                    (float)$element->{Elements\Collateral::VALUE} ?: null,
                                    (string)$element->{Elements\Collateral::CURRENCY} ?: null,
                                    new Enums\AddressType(
                                        (int)$element->{Elements\Collateral::ADDRESS_TYPE_ID} ?: null
                                    ),
                                    (int)$element->{Elements\Collateral::LOCATION_ID} ?: null,
                                    new Sentence\Translation(
                                        (string)$element->{Elements\Collateral::STREET_UA} ?: null,
                                        (string)$element->{Elements\Collateral::STREET_RU} ?: null,
                                        (string)$element->{Elements\Collateral::STREET_EN} ?: null
                                    ),
                                    (string)$element->{Elements\Collateral::POSTAL_CODE},
                                    new Enums\IdentificationType(
                                        (int)$element->{Elements\Collateral::IDENTIFICATION_TYPE_ID}
                                    ),
                                    (string)$element->{Elements\Collateral::NUMBER} ?: null,
                                    Carbon::make((string)$element->{Elements\Collateral::REGISTRATION_DATE} ?: null),
                                    Carbon::make((string)$element->{Elements\Collateral::ISSUE_DATE} ?: null),
                                    Carbon::make((string)$element->{Elements\Collateral::EXPIRATION_DATE} ?: null),
                                    new Sentence\Translation(
                                        (string)$element->{Elements\Collateral::AUTHORITY_UA} ?: null,
                                        (string)$element->{Elements\Collateral::AUTHORITY_RU} ?: null,
                                        (string)$element->{Elements\Collateral::AUTHORITY_EN} ?: null
                                    )
                                )
                                : null;
                        }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Collateral::tag()}))
                    ))
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Contract::tag()}))),
            new Collections\Events(array_map(function (\SimpleXMLElement $element): Elements\Event {
                return new Elements\Event(
                    (string)$element->{Elements\Event::NAME},
                    Carbon::parse((string)$element->{Elements\Event::WHEN}),
                    (int)$element->{Elements\Event::PROVIDER} ?: null
                );
            }, $this->xmlToArray($this->simpleXmlDocument->{Elements\Event::tag()}))),
            !empty($scoring)
                ? new Elements\Scoring(
                    (string)$scoring->{Elements\Scoring::DEGREE} ?: null,
                    (int)$scoring->{Elements\Scoring::SCORE} ?: null,
                    (float)$scoring->{Elements\Scoring::FAULT_CHANCE} ?: null,
                    (string)$scoring->{Elements\Scoring::ADVERSE} ?: null
                )
                : null
        );
    }

    private function xmlToArray(\SimpleXMLElement $element): array
    {
        $response = [];

        foreach ($element as $item) {
            $response[] = $item;
        }

        return $response;
    }
}
