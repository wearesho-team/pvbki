<?php

namespace Wearesho\Pvbki;

use Carbon\Carbon;
use Wearesho\Pvbki\Collections\Errors;
use Wearesho\Pvbki\Collections\Identifiers;
use Wearesho\Pvbki\Elements\Error;
use Wearesho\Pvbki\Elements\Subject;

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

    public function parse(string $reportXml): StatementReport
    {
        $document = new \DOMDocument('1.0', 'utf-8');
        $document->loadXML($reportXml);

        $errors = new Errors();
        $identifiers = new Identifiers();

        $errorXmlCollection = $document->getElementsByTagName(Error::ROOT);

        /** @var \DOMElement $errorXml */
        foreach ($errorXmlCollection as $errorXml) {
            $error = simplexml_import_dom($errorXml);
            $errors->append(new Error(
                (string)$error->{Error::CODE},
                (string)$error->{Error::MESSAGE},
                (string)$error->{Error::TYPE}
            ));
        }

        $report = $document->getElementsByTagName('Statement')[0];
        $document = new \DOMDocument('1.0', 'utf-8');
        $document->appendChild($report);

        if (!$document->schemaValidate(__DIR__ . '../data/schemas/StatementPlusSchema.xsd')
            || !$document->schemaValidate(__DIR__ . '../data/schemas/StatementSchema.xsd')) {
            throw new Exceptions\InvalidReportXmlStructure($document);
        }

        $subject = new Subject(...$this->fetchAttributes(
            $document->getElementsByTagName(Subject::ROOT)[0],
            [
                static::STRING => Subject::REQUEST_ID,
                static::DATE => Subject::LAST_UPDATE,
                static::STRING => Subject::ENTITY,
            ]
        ));
    }

    public function fetchAttributes(\DOMElement $element, array $tags): array
    {
        $response = [];
        $existedNodes = array_map(function (\DOMElement $node) {
            return $node->tagName;
        }, (array)$element->childNodes);
        $tags = array_filter($tags, function (\DOMElement $tag) use ($existedNodes) {
            return in_array($tag, $existedNodes);
        });

        foreach ($tags as $type => $name) {
            $item = $element->getElementsByTagName($name)[0]->textContent;

            switch ($type) {
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
                    $response[] = Carbon::parse($item);
            }
        }

        return $response;
    }
}
