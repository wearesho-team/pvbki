<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Infrastructure\Element;

/**
 * Class Communication
 * @package Wearesho\Pvbki\Elements
 */
class Communication extends Element
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

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
