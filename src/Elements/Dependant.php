<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Dependant
 * @package Wearesho\Pvbki\Elements
 */
class Dependant extends Element
{
    public const ROOT = 'Dependant';
    public const TYPE_ID = 'typeId';
    public const COUNT = 'count';

    /** @var int|null */
    protected $typeId;

    /** @var int|null */
    protected $count;

    public function __construct(?int $typeId, ?int $count)
    {
        $this->typeId = $typeId;
        $this->count = $count;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }
}
