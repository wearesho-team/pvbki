<?php

namespace Wearesho\Pvbki\Identifications\Validators;

/**
 * Class NumberValidator
 * @package Wearesho\Pvbki\Identifications\Validators
 */
class NumberValidator extends Validator
{
    protected static function pattern(int $injected = null): string
    {
        return "/(^\d{{$injected}}$)/u";
    }
}
