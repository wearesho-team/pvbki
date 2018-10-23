<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki;

/**
 * Class Passport
 * @package Wearesho\Pvbki\Identifications
 */
class Passport implements Pvbki\Interrelations\SubjectInterface
{
    use Pvbki\Infrastructure\SubjectTrait;

    public function __construct(string $series, string $number)
    {
        $passportData = $series . $number;

        if (!preg_match('/^[ыЫа-яА-Яa-zA-ZіІєЄґҐїЇ]{2}\d{6}$/u', $series . $number)) {
            throw new Pvbki\Exceptions\IdentificationDataValidation($passportData);
        }

        $this->id = $passportData;
    }
}
