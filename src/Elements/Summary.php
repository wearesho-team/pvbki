<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Summary
 * @package Wearesho\Pvbki\Elements
 */
class Summary extends Element
{
    public const ROOT = 'Summary';
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
