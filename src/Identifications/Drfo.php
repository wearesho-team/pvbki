<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Exceptions\IdentificationDataValidation;

/**
 * Class Drfo
 * @package Wearesho\Pvbki\Identifications
 */
class Drfo implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(string $number)
    {
        if (!preg_match('/^[0-9]{10}$/', $number)) {
            throw new IdentificationDataValidation($number);
        }

        $this->id = $number;
    }
}
