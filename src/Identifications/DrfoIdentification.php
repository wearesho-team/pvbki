<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Identifications\Validators\NumberValidator;

/**
 * Class DrfoIdentification
 * @package Wearesho\Pvbki\Identifications
 */
class DrfoIdentification implements SubjectIdentificationInterface
{
    public const DRFO_NUMBER_LENGTH = 10;

    /** @var string */
    protected $number;

    /**
     * DrfoIdentification constructor.
     *
     * @param string $number
     *
     * @throws \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     */
    public function __construct(string $number)
    {
        NumberValidator::validate(
            static::DRFO_NUMBER_LENGTH,
            $number,
            'DRFO number must be in ' . static::DRFO_NUMBER_LENGTH . ' digits length'
        );

        $this->number = $number;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): string
    {
        return $this->number;
    }
}
