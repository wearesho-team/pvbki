<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Communication
 * @package Wearesho\Pvbki\Elements
 */
class Communication implements ElementInterface
{
    public const TYPE_ID = 'typeId';
    public const VALUE = 'value';

    /** @var int|null */
    protected $typeId;

    /** @var string|null */
    protected $value;

    public function __construct(?int $typeId, ?string $value)
    {
        $this->typeId = $typeId;
        $this->value = $value;
    }

    public function jsonSerialize(): array
    {
        return [
            'typeId' => $this->typeId,
            'value' => $this->value,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::TYPE_ID => ParameterType::INTEGER,
            static::VALUE => ParameterType::STRING,
        ];
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
