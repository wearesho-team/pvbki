<?php

namespace Wearesho\Pvbki\Exceptions;

/**
 * Class IdentificationValidationException
 * @package Wearesho\Pvbki\Exceptions
 */
class IdentificationValidationException extends \Exception
{
    /** @var string $identificationArgument */
    protected $identificationArgument;

    public function __construct(
        string $identificationArgument,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->identificationArgument = $identificationArgument;

        parent::__construct('Identification validation exception: ' . $message, $code, $previous);
    }

    public function getIdentificationArgument(): string
    {
        return $this->identificationArgument;
    }
}
