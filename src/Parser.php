<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\Pvbki\Colelctions\ErrorCollection;
use Wearesho\Pvbki\Colelctions\SubjectCollection;
use Wearesho\Pvbki\Elements;
use Wearesho\Pvbki\Exceptions\InvalidXmlFormatException;
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
     * @throws InvalidXmlFormatException
     */
    public function parse(string $plainXml): Elements\Report
    {
        $document = new \DOMDocument('1.0', 'utf-8');
        $document->loadXML($plainXml);

        // todo: can be incorrect
        if (!$document->schemaValidate(__DIR__ . '../data/schemas/StatementPlusSchema.xsd')
            || !$document->schemaValidate(__DIR__ . '../data/schemas/StatementSchema.xsd')) {
            throw new InvalidXmlFormatException($plainXml);
        }

        $errors = new ErrorCollection();

        foreach ($document->getElementsByTagName(Statement::ERROR) as $error) {
            $errors->append(new Elements\Error(
                ...$this->fetchParameters(simplexml_import_dom($error), Elements\Error::parameters())
            ));
        }

        if (!empty($errors)) {
            return new Elements\Report($errors);
        }

        $subjectCollection = new SubjectCollection();
        $document = simplexml_import_dom($document->getElementsByTagName('Statement')->item(0));

        foreach ($document->{Statement::SUBJECT} as $subject) {
            $subjectCollection->append(new Elements\Subject(
                ...$this->fetchParameters($subject, Elements\Subject::parameters())
            ));
        }

        return new Elements\Report($subjectCollection);
    }

    private function fetchParameters(\SimpleXMLElement $element, array $params): array
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
