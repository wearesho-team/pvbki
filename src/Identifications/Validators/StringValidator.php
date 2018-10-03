<?php

namespace Wearesho\Pvbki\Identifications\Validators;

/**
 * Class StringValidator
 * @package Wearesho\Pvbki\Identifications\Validators
 */
class StringValidator extends Validator
{
    protected static function pattern(int $injected = null): string
    {
        return "/(^[А-Я]{{$injected}}$)/u";
    }
}
