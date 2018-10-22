<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Communication
 * @package Wearesho\Pvbki\Elements
 */
class Communication extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Communication';
    public const TYPE_ID = 'typeId';
    public const VALUE = 'value';

    /** @var string */
    protected $value;

    /** @var int|null */
    protected $typeId;

    public function __construct(string $value, ?int $typeId)
    {
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public static function arguments(): Pvbki\Collections\RuleCollection
    {
        return new Pvbki\Collections\RuleCollection([
            new Pvbki\Rule(Pvbki\Enums\RuleType::STRING(), static::VALUE),
            new Pvbki\Rule(Pvbki\Enums\RuleType::INT(), static::TYPE_ID),
        ]);
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
