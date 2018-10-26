<?php

namespace Wearesho\Pvbki\Exceptions;

/**
 * Class InvalidXmlStructure
 * @package Wearesho\Pvbki\Exceptions
 */
class InvalidReportXmlStructure extends \InvalidArgumentException
{
    /** @var string */
    protected $xml;

    public function __construct(string $xml, int $code = 0, \Throwable $previous = null)
    {
        $this->xml = $xml;
        parent::__construct("Xml document have invalid structure", $code, $previous);
    }

    public function getXml(): string
    {
        return $this->xml;
    }
}
