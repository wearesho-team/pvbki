<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Dependant
 * @package Wearesho\Pvbki\Elements
 */
class Dependant implements ElementInterface
{
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

    public function jsonSerialize(): array
    {
        return [
            'typId' => $this->typeId,
            'count' => $this->count,
        ];
    }

    public static function parameters(): array
    {
        return [
           static::TYPE_ID => ParameterType::INTEGER,
           static::COUNT => ParameterType::INTEGER,
        ];
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
