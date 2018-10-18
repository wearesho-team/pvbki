<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Exceptions\IdentificationDataValidation;

/**
 * Class Passport
 * @package Wearesho\Pvbki\Identifications
 */
class Passport implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(string $series, string $number)
    {
        $passportData = $series . $number;

        if (!preg_match('/^[ыЫа-яА-Яa-zA-ZіІєЄґҐїЇ]{2}\d{6}$/u', $series . $number)) {
            throw new IdentificationDataValidation($passportData);
        }

        $this->id = $passportData;
    }
}
