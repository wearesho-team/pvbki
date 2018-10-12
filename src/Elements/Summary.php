<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Summary
 * @package Wearesho\Pvbki\Elements
 */
class Summary implements ElementInterface
{
    public const CATEGORY = 'category';
    public const VALUE = 'value';
    public const CODE = 'code';
    public const COUNT = 'count';
    public const AMOUNT = 'amount';

    /** @var string|null */
    protected $category;

    /** @var int|null */
    protected $value;

    /** @var string|null */
    protected $code;

    /** @var int|null */
    protected $count;

    /** @var double|null */
    protected $amount;

    public function __construct(?string $category, ?int $value, ?string $code, ?int $count, ?float $amount)
    {
        $this->category = $category;
        $this->value = $value;
        $this->code = $code;
        $this->count = $count;
        $this->amount = $amount;
    }

    public function jsonSerialize(): array
    {
        return [
            'category' => $this->category,
            'value' => $this->value,
            'code' => $this->code,
            'count' => $this->count,
            'amount' => $this->amount,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::CATEGORY => ParameterType::STRING,
            static::VALUE => ParameterType::INTEGER,
            static::CODE => ParameterType::STRING,
            static::COUNT => ParameterType::INTEGER,
            static::AMOUNT => ParameterType::DOUBLE
        ];
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }
}
