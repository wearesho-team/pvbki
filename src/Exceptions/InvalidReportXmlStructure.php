<?php

namespace Wearesho\Pvbki\Exceptions;

use Throwable;

/**
 * Class InvalidXmlStructure
 * @package Wearesho\Pvbki\Exceptions
 */
class InvalidReportXmlStructure extends \InvalidArgumentException
{
    /** @var \DOMDocument */
    protected $xml;

    public function __construct(\DOMDocument $xml, int $code = 0, Throwable $previous = null)
    {
        $this->xml = $xml;

        parent::__construct("Xml document have invalid structure", $code, $previous);
    }

    public function getXml(): \DOMDocument
    {
        return $this->xml;
    }
}
