<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Exceptions\IdentificationDataValidation;

/**
 * Class Okpo
 * @package Wearesho\Pvbki\Identifications
 */
class Okpo implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(string $number)
    {
        if (!preg_match('/^[0-9]{8}$/', $number)) {
            throw new IdentificationDataValidation($number);
        }

        $this->id = $number;
    }
}
