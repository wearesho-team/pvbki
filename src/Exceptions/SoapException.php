<?php

namespace Wearesho\Pvbki\Exceptions;

/**
 * Class SoapException
 * @package Wearesho\Pvbki\Exceptions
 */
class SoapException extends \Exception
{
    /** @var string $type */
    protected $type;

    public function __construct(
        string $type,
        string $message,
        int $code,
        \Throwable $previous = null
    ) {
        $this->type = $type;

        parent::__construct($message, $code, $previous);
    }

    public function getType(): string
    {
        return $this->type;
    }
}
