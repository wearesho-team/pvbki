<?php

namespace Wearesho\Pvbki\Elements;

/**
 * Class MonthlyIncome
 * @package Wearesho\Pvbki\Elements
 */
class MonthlyIncome
{
    public const VALUE = 'value';
    public const CURRENCY = 'currency';

    /** @var double */
    protected $value;

    /** @var string */
    protected $currency;
}
