<?php

namespace Wearesho\Pvbki\Exceptions;

/**
 * Class InvalidXmlFormatException
 * @package Wearesho\Pvbki\Exceptions
 */
class InvalidXmlFormatException extends \Exception
{
    /** @var string $xml */
    protected $xml;

    public function __construct(
        string $xml,
        string $message = "Xml document does not passed validation",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->xml = $xml;

        parent::__construct($message, $code, $previous);
    }

    public function getXml(): string
    {
        return $this->xml;
    }
}
