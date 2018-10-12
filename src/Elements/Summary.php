<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;

/**
 * Class Summary
 * @package Wearesho\Pvbki\Elements
 */
class Summary implements ElementInterface
{
    protected const CATEGORY = 'category';
    protected const VALUE = 'value';
    protected const CODE = 'code';
    protected const COUNT = 'count';
    protected const AMOUNT = 'amount';

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

    /**
     * Summary constructor.
     *
     * @param null|string $category
     * @param int|null    $value
     * @param null|string $code
     * @param int|null    $count
     * @param float|null  $amount
     */
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
