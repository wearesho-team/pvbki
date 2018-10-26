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

    /** @var Pvbki\Enums\CommunicationType */
    protected $typeId;

    public function __construct(string $value, Pvbki\Enums\CommunicationType $typeId)
    {
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public function getTypeId(): Pvbki\Enums\CommunicationType
    {
        return $this->typeId;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
