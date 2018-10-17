<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\Pvbki\Collections;
use Wearesho\Pvbki\Elements;
use Wearesho\Pvbki\Exceptions;
use Wearesho\Pvbki\Statements\Statement;

/**
 * Class Parser
 * @package Wearesho\Pvbki
 */
class Parser
{
    /**
     * @param string $plainXml
     *
     * @return Elements\Report
     * @throws Exceptions\InvalidXmlFormatException
     */
    public function parse(string $plainXml): Elements\Report
    {
        $document = new \DOMDocument('1.0', 'utf-8');
        $document->loadXML($plainXml);

        $errors = new Collections\ErrorCollection();

        foreach ($document->getElementsByTagName(Statement::ERROR) as $error) {
            $errors->append(new Elements\Error(
                ...$this->fetchParameters(simplexml_import_dom($error), Elements\Error::class)
            ));
        }

        if (!empty($errors)) {
            return new Elements\Report($errors);
        }

        $statementCollection = $document->getElementsByTagName('Statement');

        if (empty($statementCollection)) {
            throw new Exceptions\MissingStatementException();
        }

        $document = new \DOMDocument('1.0', 'utf-8');
        $document->appendChild($statementCollection->item(0));

        if (!$document->schemaValidate(__DIR__ . '../data/schemas/StatementPlusSchema.xsd')
            || !$document->schemaValidate(__DIR__ . '../data/schemas/StatementSchema.xsd')) {
            throw new Exceptions\InvalidXmlFormatException($plainXml);
        }

        $subjectCollection = new Collections\SubjectCollection();
        $identificationCollection = new Collections\IdentificationCollection();
        $communicationCollection = new Collections\CommunicationCollection();
        $addressCollection = new Collections\AddressCollection();
        $dependantCollection = new Collections\DependantCollection();
        $document = simplexml_import_dom($document->getElementsByTagName('Statement')->item(0));

        foreach ($document->{Statement::SUBJECT} as $subject) {
            $subjectCollection->append(new Elements\Subject(
                ...$this->fetchParameters($subject, Elements\Subject::class)
            ));
        }

        foreach ($document->{Statement::IDENTIFICATION} as $identification) {
            $identificationCollection->append(new Elements\Identification(
                ...$this->fetchParameters($identification, Elements\Identification::class)
            ));
        }

        foreach ($document->{Statement::COMMUNICATION} as $communication) {
            $communicationCollection->append(new Elements\Communication(
                ...$this->fetchParameters($communication, Elements\Communication::class)
            ));
        }

        foreach ($document->{Statement::ADDRESS} as $address) {
            $addressCollection->append(new Elements\Address(
                ...$this->fetchParameters($address, Elements\Address::class)
            ));
        }

        foreach ($document->{Statement::DEPENDANT} as $dependant) {
            $dependantCollection->append(new Elements\Dependant(
                ...$this->fetchParameters($dependant, Elements\Dependant::class)
            ));
        }

        $scoring = new Elements\Scoring(
            ...$this->fetchParameters($document->{Statement::SCORING}, Elements\Scoring::class)
        );

        return new Elements\Report(
            $errors,
            $subjectCollection,
            $identificationCollection,
            $scoring
        );
    }

    private function fetchParameters(\SimpleXMLElement $element, string $class): array
    {
        /** @var Element $class */

        $contexts = [];

        foreach ($class::parameters() as $param => $type) {
            $value = $element->{$param} ?: null;

            if ($type)

            switch ($type) {
                case ParameterType::STRING:
                    $contexts[] = (string)$value;

                    break;
                case ParameterType::INTEGER:
                    $contexts[] = (int)$value;

                    break;
                case ParameterType::FLOAT:
                    $contexts[] = (float)$value;

                    break;
                case ParameterType::DOUBLE:
                    $contexts[] = (double)$value;

                    break;
                case ParameterType::DATE:
                    $contexts[] = Carbon::parse($value);

                    break;
                case Elements\Translator::class:
                    $translators = $class::translators();
                    $keys = array_intersect_key($type, $translators);
                    $rules = [];

                    foreach ($keys as $key) {
                        $rules[$key] = $translators[$key];
                    }

                    $contexts[] = new Elements\Translator(...$this->fetchParameters($element, $rules));

                    break;
                default:
                    $contexts[] = $value;
            }
        }

        return $contexts;
    }

    private function (\SimpleXMLElement $element, array $params)
    {
        $contexts = [];

        foreach ($params as $param => $type) {
            $value = $element->{$param} ?: null;

            switch ($type) {
                case ParameterType::STRING:
                    $contexts[] = (string)$value;

                    break;
                case ParameterType::INTEGER:
                    $contexts[] = (int)$value;

                    break;
                case ParameterType::FLOAT:
                    $contexts[] = (float)$value;

                    break;
                case ParameterType::DOUBLE:
                    $contexts[] = (double)$value;

                    break;
                case ParameterType::DATE:
                    $contexts[] = Carbon::parse($value);

                    break;
                default:
                    $contexts[] = $value;
            }
        }

        return $contexts;
    }
}
