<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;
use Wearesho\Pvbki\Collections\RuleCollection;

/**
 * Class Identifier
 * @package Wearesho\Pvbki\Elements
 */
class Identifier extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Identification';
    public const TYPE_ID = 'typeId';
    public const NUMBER = 'number';
    public const REGISTRATION_DATE = 'registrationDate';
    public const ISSUE_DATE = 'issueDate';
    public const EXPIRATION_DATE = 'expirationDate';
    public const ISSUED_BY_UA = 'authorityUA';
    public const ISSUED_BY_RU = 'authorityRU';
    public const ISSUED_BY_EN = 'authorityEN';

    /** @var int|null */
    protected $typeId;

    /** @var string|null */
    protected $number;

    /** @var \DateTimeInterface|null */
    protected $registrationDate;

    /** @var \DateTimeInterface|null */
    protected $expirationDate;

    /** @var Pvbki\Sentence\Translation|null */
    protected $authority;

    public function __construct(
        ?int $typeId,
        ?string $number,
        ?\DateTimeInterface $registrationDate,
        ?\DateTimeInterface $expirationDate,
        ?Pvbki\Sentence\Translation $authority
    ) {
        $this->typeId = $typeId;
        $this->number = $number;
        $this->registrationDate = $registrationDate;
        $this->expirationDate = $expirationDate;
        $this->authority = $authority;
    }

    public static function arguments(): RuleCollection
    {
        return new RuleCollection([
            new Pvbki\Rule(Pvbki\Enums\RuleType::INT(), static::TYPE_ID),
            new Pvbki\Rule(Pvbki\Enums\RuleType::STRING(), static::NUMBER),
            new Pvbki\Rule(Pvbki\Enums\RuleType::DATETIME(), static::REGISTRATION_DATE),
            new Pvbki\Rule(Pvbki\Enums\RuleType::DATETIME(), static::EXPIRATION_DATE),
            new Pvbki\Rule(
                Pvbki\Enums\RuleType::TRANSLATE(),
                static::ISSUED_BY_UA,
                static::ISSUED_BY_RU,
                static::ISSUED_BY_EN
            ),
        ]);
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function getAuthority(): ?Pvbki\Sentence\Translation
    {
        return $this->authority;
    }
}
