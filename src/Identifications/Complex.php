<?php

namespace Wearesho\Pvbki\Identifications;

use Carbon\Carbon;
use Wearesho\Pvbki\Exceptions\IdentificationDataValidation;

/**
 * Class Complex
 * @package Wearesho\Pvbki\Identifications
 */
class Complex implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(string $name, string $surname, \DateTimeInterface $birthDate)
    {
        if (empty($name)) {
            throw new IdentificationDataValidation($name);
        }

        if (empty($surname)) {
            throw new IdentificationDataValidation($surname);
        }

        $this->id = $name . $surname . Carbon::instance($birthDate)->toDateString();
    }
}
