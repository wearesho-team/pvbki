<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class MonthlyIncome
 * @package Wearesho\Pvbki\Elements
 */
class MonthlyIncome implements ElementInterface
{
    public const VALUE = 'value';
    public const CURRENCY = 'currency';

    /** @var double|null */
    protected $value;

    /** @var string|null */
    protected $currency;

    public function __construct(?float $value, ?string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function jsonSerialize(): array
    {
        return [
            'value' => $this->value,
            'currency' => $this->currency,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::VALUE => ParameterType::STRING,
            static::CURRENCY => ParameterType::DOUBLE,
        ];
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }
}
