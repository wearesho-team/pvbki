<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Wearesho\Pvbki\Elements\Summary;

use PHPUnit\Framework\TestCase;

/**
 * Class SummaryTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Summary
 * @internal
 */
class SummaryTest extends TestCase
{
    protected const CATEGORY = 'category';
    protected const VALUE = 1;
    protected const CODE = 'code';
    protected const COUNT = 1;
    protected const AMOUNT = 12.3;

    /** @var Summary */
    protected $fakeSummary;

    protected function setUp(): void
    {
        $this->fakeSummary = new Summary(
            static::CATEGORY,
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
                'category' => static::CATEGORY,
                'value' => static::VALUE,
                'code' => static::CODE,
                'count' => static::COUNT,
                'amount' => static::AMOUNT,
            ],
            $this->fakeSummary->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(Summary::ROOT, Summary::tag());
    }

    public function testGetCategory(): void
    {
        $this->assertEquals(static::CATEGORY, $this->fakeSummary->getCategory());
    }

    public function testGetAmount(): void
    {
        $this->assertEquals(static::AMOUNT, $this->fakeSummary->getAmount());
    }

    public function testGetCode(): void
    {
        $this->assertEquals(static::CODE, $this->fakeSummary->getCode());
    }

    public function testGetCount(): void
    {
        $this->assertEquals(static::COUNT, $this->fakeSummary->getCount());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeSummary->getValue());
    }
}
