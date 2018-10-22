<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
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

        $errorXmlCollection = $this->domDocument->getElementsByTagName(Error::ROOT);

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

        return new StatementReport(
            (bool)$attributes[StatementReport::PROTECTION],
            Carbon::make($attributes[StatementReport::GENERATED]),
            (string)$attributes[StatementReport::POWERED],
            $errors,
            new Elements\Subject(...$this->fetchElements($this->simpleXmlDocument->{Elements\Subject::tag()}, [
                [Elements\Subject::REQUEST_ID, static::STRING,],
                [Elements\Subject::LAST_UPDATE, static::DATE,],
                [Elements\Subject::ENTITY, static::STRING,],
                [Elements\Subject::GENDER, static::INT,],
                [
                    [Elements\Subject::SURNAME_UA, Elements\Subject::SURNAME_RU, Elements\Subject::SURNAME_EN,],
                    static::TRANSLATION,
                ],
                [
                    [Elements\Subject::NAME_UA, Elements\Subject::NAME_RU, Elements\Subject::NAME_EN,],
                    static::TRANSLATION,
                ],
                [
                    [
                        Elements\Subject::PATRONYMIC_UA,
                        Elements\Subject::PATRONYMIC_RU,
                        Elements\Subject::PATRONYMIC_EN,
                    ],
                    static::TRANSLATION,
                ],
                [
                    [
                        Elements\Subject::BIRTH_SURNAME_UA,
                        Elements\Subject::BIRTH_SURNAME_RU,
                        Elements\Subject::BIRTH_SURNAME_EN,
                    ],
                    static::TRANSLATION,
                ],
                [Elements\Subject::CLASSIFICATION, static::INT,],
                [Elements\Subject::BIRTH_DATE, static::DATE,],
                [
                    [
                        Elements\Subject::BIRTH_PLACE_UA,
                        Elements\Subject::BIRTH_PLACE_RU,
                        Elements\Subject::BIRTH_PLACE_EN,
                    ],
                    static::TRANSLATION,
                ],
                [Elements\Subject::RESIDENCY, static::INT,],
                [Elements\Subject::CITIZENSHIP, static::INT,],
                [Elements\Subject::NEGATIVE_STATUS, static::INT,],
                [Elements\Subject::EDUCATION, static::INT,],
                [Elements\Subject::MARITAL_STATUS, static::INT,],
                [Elements\Subject::STATUS_ID, static::INT,],
                [
                    [Elements\Subject::FULL_NAME_UA, Elements\Subject::FULL_NAME_RU, Elements\Subject::FULL_NAME_EN,],
                    static::TRANSLATION,
                ],
                [
                    [
                        Elements\Subject::ABBREVIATION_UA,
                        Elements\Subject::ABBREVIATION_RU,
                        Elements\Subject::ABBREVIATION_EN,
                    ],
                    static::TRANSLATION,
                ],
                [Elements\Subject::OWNERSHIP, static::INT,],
                [Elements\Subject::REGISTRATION_DATE, static::DATE,],
                [Elements\Subject::ECONOMIC_ACTIVITY, static::INT,],
                [Elements\Subject::EMPLOYEE_COUNT, static::INT,],
            ])),
            new Collections\Identifiers(array_map(function (\SimpleXMLElement $identifier): Elements\Identifier {
                return new Elements\Identifier(...$this->fetchElements($identifier, [
                    [Elements\Identifier::TYPE_ID, static::INT,],
                    [Elements\Identifier::NUMBER, static::STRING,],
                    [Elements\Identifier::REGISTRATION_DATE, static::DATE,],
                    [Elements\Identifier::EXPIRATION_DATE, static::DATE,],
                    [
                        [
                            Elements\Identifier::ISSUED_BY_UA,
                            Elements\Identifier::ISSUED_BY_RU,
                            Elements\Identifier::ISSUED_BY_EN,
                        ],
                        static::TRANSLATION,
                    ],
                ]));
            }, $this->xmlToArray(Elements\Identifier::class))),
            new Collections\Communications(
                array_map(function (\SimpleXMLElement $communication): Elements\Communication {
                    return new Elements\Communication(...$this->fetchElements($communication, [
                        [Elements\Communication::VALUE, static::STRING,],
                        [Elements\Communication::TYPE_ID, static::INT,],
                    ]));
                }, $this->xmlToArray(Elements\Communication::class))
            ),
            new Collections\Addresses(array_map(function (\SimpleXMLElement $address): Elements\Address {
                return new Elements\Address(...$this->fetchElements($address, [
                    [Elements\Address::LOCATION_ID, static::INT,],
                    [Elements\Address::TYPE_ID, static::INT,],
                    [
                        [Elements\Address::STREET_UA, Elements\Address::STREET_RU, Elements\Address::STREET_EN,],
                        static::TRANSLATION,
                    ],
                    [Elements\Address::POSTAL_CODE, static::STRING,],
                ]));
            }, $this->xmlToArray(Elements\Address::class))),
            new Collections\Dependants(array_map(function (\SimpleXMLElement $dependant): Elements\Dependant {
                return new Elements\Dependant(...$this->fetchElements($dependant, [
                    [Elements\Dependant::COUNT, static::INT,],
                    [Elements\Dependant::TYPE_ID, static::INT,],
                ]));
            }, $this->xmlToArray(Elements\Dependant::class))),
            new Collections\MonthlyIncomes(
                array_map(function (\SimpleXMLElement $monthlyIncome): Elements\MonthlyIncome {
                    return new Elements\MonthlyIncome(...$this->fetchElements($monthlyIncome, [
                        [Elements\MonthlyIncome::VALUE, static::FLOAT,],
                        [Elements\MonthlyIncome::CURRENCY, static::STRING,],
                    ]));
                }, $this->xmlToArray(Elements\MonthlyIncome::class))
            ),
            new Collections\Summaries(array_map(function (\SimpleXMLElement $summary): Elements\Summary {
                return new Elements\Summary(...$this->fetchElements($summary, [
                    [Elements\Summary::CATEGORY, static::STRING,],
                    [Elements\Summary::VALUE, static::INT,],
                    [Elements\Summary::CODE, static::STRING,],
                    [Elements\Summary::COUNT, static::INT,],
                    [Elements\Summary::AMOUNT, static::FLOAT,],
                ]));
            }, $this->xmlToArray(Elements\Summary::class))),
            new Collections\Contracts(array_map(function (\SimpleXMLElement $contract): Elements\Contract {
                return new Elements\Contract(...$this->fetchElements($contract, [

                ]));
            }, $this->xmlToArray(Elements\Contract::class)))
        );
    }

    public function fetchElements(\SimpleXMLElement $element, array $rules): array
    {
        $response = [];

        // todo: need refactor
        foreach ($rules as $rule) {
            if ($rule[1] === static::TRANSLATION) {
                $response[] = new Translation(
                    ...array_map(function ($code) use ($element) {
                        return (string)$element->{$code};
                    }, $rule[0])
                );

                continue;
            }

            $item = $element->{$rule[0]};

            switch ($rule[1]) {
                case static::STRING:
                    $response[] = (string)$item;
                    break;
                case static::INT:
                    $response[] = (int)$item;
                    break;
                case static::FLOAT:
                    $response[] = (float)$item;
                    break;
                case static::DATE:
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
