<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Enums\CommunicationType;
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

    /** @var CommunicationType */
    protected $typeId;

    public function __construct(string $value, CommunicationType $typeId)
    {
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public function getTypeId(): CommunicationType
    {
        return $this->typeId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
