<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Dependant
 * @package Wearesho\Pvbki\Elements
 */
class Dependant extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Dependant';
    public const COUNT = 'count';
    public const TYPE_ID = 'typeId';

    /** @var int */
    protected $count;

    /** @var int|null */
    protected $typeId;

    public function __construct(int $count, ?int $typeId)
    {
        $this->count = $count;
        $this->typeId = $typeId;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }
}
