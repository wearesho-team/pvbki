<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki;

/**
 * Class Drfo
 * @package Wearesho\Pvbki\Identifications
 */
class Drfo implements Pvbki\Interrelations\SubjectInterface
{
    use Pvbki\Infrastructure\SubjectTrait;

    public function __construct(string $number)
    {
        if (!preg_match('/^[0-9]{10}$/', $number)) {
            throw new Pvbki\Exceptions\IdentificationDataValidation($number);
        }

        $this->id = $number;
    }
}
