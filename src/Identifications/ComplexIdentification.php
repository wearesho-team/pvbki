<?php

namespace Wearesho\Pvbki\Identifications;

use Carbon\Carbon;

/**
 * Class ComplexIdentification
 * @package Wearesho\Pvbki\Identifications
 */
class ComplexIdentification extends SubjectIdentification implements SubjectIdentificationInterface
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    public function __construct(string $name, string $surname, \DateTimeInterface $birthDate)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
    }

    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return $this->name
            . $this->surname
            . Carbon::instance($this->birthDate)->format('dmY');
    }
}
