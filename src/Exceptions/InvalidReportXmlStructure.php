<?php

namespace Wearesho\Pvbki\Exceptions;

use Wearesho\Pvbki;

/**
 * Class InvalidXmlStructure
 * @package Wearesho\Pvbki\Exceptions
 */
class InvalidReportXmlStructure extends \RuntimeException implements Pvbki\Exception
{
    /** @var string */
    protected $xml;

    public function __construct(string $xml, int $code = 0, \Throwable $previous = null)
    {
        $this->xml = $xml;
        parent::__construct("Xml document have invalid structure", $code, $previous);
    }

    public function __toString(): string
    {
        return parent::__toString() . PHP_EOL . 'XML: ' . $this->getXml();
    }

    public function getXml(): string
    {
        return $this->xml;
    }
}
