<?php

namespace Wearesho\Pvbki\Identifications;

use Carbon\Carbon;
use Wearesho\Pvbki;

/**
 * Class Complex
 * @package Wearesho\Pvbki\Identifications
 */
class Complex implements Pvbki\Interrelations\SubjectInterface
{
    use Pvbki\Infrastructure\SubjectTrait;

    public function __construct(string $name, string $surname, \DateTimeInterface $birthDate)
    {
        if (empty($name) || empty($surname)) {
            throw new Pvbki\Exceptions\IdentificationDataValidation("Name: {$name}; Surname: {$surname};");
        }

        $this->id = $name . $surname . Carbon::instance($birthDate)->toDateString();
    }
}
