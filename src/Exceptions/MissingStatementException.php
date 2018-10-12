<?php

namespace Wearesho\Pvbki\Exceptions;

use Throwable;

/**
 * Class MissingStatementException
 * @package Wearesho\Pvbki\Exceptions
 */
class MissingStatementException extends \UnexpectedValueException
{
    public function __construct(
        string $message = "Xml document does not contain statement report",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
