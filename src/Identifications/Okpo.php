<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki;

/**
 * Class Okpo
 * @package Wearesho\Pvbki\Identifications
 */
class Okpo implements Pvbki\Interrelations\SubjectInterface
{
    use Pvbki\Infrastructure\SubjectTrait;

    public function __construct(string $number)
    {
        if (!preg_match('/^[0-9]{8}$/', $number)) {
            throw new Pvbki\Exceptions\IdentificationDataValidation($number);
        }

        $this->id = $number;
    }
}
