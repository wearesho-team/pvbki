<?php

namespace Wearesho\Pvbki\Identifications;

use Wearesho\Pvbki\Identifications\Validators\NumberValidator;
use Wearesho\Pvbki\Identifications\Validators\UppercaseStringValidator;

/**
 * Class PassportIdentification
 * @package Wearesho\Pvbki\Identifications
 */
class PassportIdentification extends SubjectIdentification implements SubjectIdentificationInterface
{
    public const NUMBER_LENGTH = 6;
    public const SERIES_LENGTH = 2;

    /** @var string */
    protected $series;

    /** @var string */
    protected $number;

    /**
     * PassportIdentification constructor.
     *
     * @param string $series
     * @param string $number
     *
     * @throws \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     */
    public function __construct(string $series, string $number)
    {
        NumberValidator::validate(
            static::NUMBER_LENGTH,
            $number,
            'Passport number must be in ' . static::NUMBER_LENGTH . ' digits length'
        );
        UppercaseStringValidator::validate(
            static::SERIES_LENGTH,
            $series,
            'Passport series must be in ' . static::SERIES_LENGTH . ' chars length'
        );

        $this->series = $series;
        $this->number = $number;
    }

    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return $this->series . $this->number;
    }
}
