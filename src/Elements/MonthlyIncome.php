<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Infrastructure\Element;

/**
 * Class MonthlyIncome
 * @package Wearesho\Pvbki\Elements
 */
class MonthlyIncome extends Element
{
    public const ROOT = 'MonthlyIncome';
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

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }
}
