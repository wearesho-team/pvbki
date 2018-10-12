<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Identifications\Validators\NumberValidator;

/**
 * Class OkpoIdentification
 * @package Wearesho\Pvbki\Identifications
 */
class OkpoIdentification extends SubjectIdentification implements SubjectIdentificationInterface
{
    public const OKPO_NUMBER_LENGTH = 8;

    /** @var string */
    protected $number;

    /**
     * OkpoIdentification constructor.
     *
     * @param string $number
     *
     * @throws \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     */
    public function __construct(string $number)
    {
        NumberValidator::validate(
            static::OKPO_NUMBER_LENGTH,
            $number,
            'OKPO number must be in ' . static::OKPO_NUMBER_LENGTH . ' digits length'
        );

        $this->number = $number;
    }

    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return $this->number;
    }
}
