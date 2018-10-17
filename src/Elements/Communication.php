<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Communication
 * @package Wearesho\Pvbki\Elements
 */
class Communication extends Element
{
    public const ROOT = 'Communication';
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

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
