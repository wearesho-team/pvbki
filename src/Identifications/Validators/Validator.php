<?php

namespace Wearesho\Pvbki\Identifications\Validators;

use Wearesho\Pvbki\Exceptions\IdentificationValidationException;

/**
 * Class Validator
 * @package Wearesho\Pvbki\Identifications\Validators
 */
abstract class Validator
{
    /**
     * @param int    $length
     * @param string $value
     * @param string $message
     *
     * @throws IdentificationValidationException
     */
    public static function validate(int $length, string $value, string $message): void
    {
        if (!preg_match(static::pattern($length), $value)) {
            throw new IdentificationValidationException($value, $message);
        }
    }

    abstract protected static function pattern(int $injected = null): string;
}
