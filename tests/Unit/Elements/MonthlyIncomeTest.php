<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\MonthlyIncome;
use Wearesho\Pvbki\ParameterType;

/**
 * Class MonthlyIncomeTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass MonthlyIncome
 * @internal
 */
class MonthlyIncomeTest extends TestCase
{
    protected const VALUE = 1234.45;
    protected const CURRENCY = 'currency';

    /** @var MonthlyIncome */
    protected $fakeMonthlyIncome;

    protected function setUp(): void
    {
        $this->fakeMonthlyIncome = new MonthlyIncome(
            static::VALUE,
            static::CURRENCY
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'value' => static::VALUE,
                'currency' => static::CURRENCY,
            ],
            $this->fakeMonthlyIncome->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                MonthlyIncome::VALUE => ParameterType::STRING,
                MonthlyIncome::CURRENCY => ParameterType::DOUBLE,
            ],
            MonthlyIncome::parameters()
        );
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(static::CURRENCY, $this->fakeMonthlyIncome->getCurrency());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeMonthlyIncome->getValue());
    }
}
