<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Summary;
use Wearesho\Pvbki\Enums\Category;

/**
 * Class SummaryTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Summary
 * @internal
 */
class SummaryTest extends TestCase
{
    protected const VALUE = 1;
    protected const CODE = 'code';
    protected const COUNT = 2;
    protected const AMOUNT = 34.56;

    /** @var Summary */
    protected $fakeSummary;

    protected function setUp(): void
    {
        $this->fakeSummary = new Summary(
            Category::COLLATERAL(),
            static::VALUE,
            static::CODE,
            static::COUNT,
            static::AMOUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'category' => Category::COLLATERAL(),
                'value' => static::VALUE,
                'code' => static::CODE,
                'count' => static::COUNT,
                'amount' => static::AMOUNT,
            ],
            $this->fakeSummary->jsonSerialize()
        );
    }

    public function testGetCount(): void
    {
        $this->assertEquals(static::COUNT, $this->fakeSummary->getCount());
    }

    public function testGetCategory(): void
    {
        $this->assertEquals(Category::COLLATERAL(), $this->fakeSummary->getCategory());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeSummary->getValue());
    }

    public function testGetAmount(): void
    {
        $this->assertEquals(static::AMOUNT, $this->fakeSummary->getAmount());
    }

    public function testGetCode(): void
    {
        $this->assertEquals(static::CODE, $this->fakeSummary->getCode());
    }
}
