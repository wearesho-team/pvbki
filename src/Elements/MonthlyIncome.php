<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class MonthlyIncome
 * @package Wearesho\Pvbki\Elements
 */
class MonthlyIncome extends Pvbki\Infrastructure\Element
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

    public static function arguments(): Pvbki\Collections\RuleCollection
    {
        return new Pvbki\Collections\RuleCollection([
            new Pvbki\Rule(Pvbki\Enums\RuleType::FLOAT(), static::VALUE),
            new Pvbki\Rule(Pvbki\Enums\RuleType::STRING(), static::CURRENCY),
        ]);
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
