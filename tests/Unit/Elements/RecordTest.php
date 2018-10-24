<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Record;
use Wearesho\Pvbki\Enums\CreditUsage;

/**
 * Class RecordTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Record
 * @internal
 */
class RecordTest extends TestCase
{
    protected const ACCOUNTING_DATE = '2018-03-12';
    protected const REST_AMOUNT = 123.45;
    protected const CONTRACT_ID = 'contract_id';
    protected const REST_CURRENCY = 'rest_currency';
    protected const REST_INSTALMENT_COUNT = 7;
    protected const OVERDUE_AMOUNT = 89.01;
    protected const OVERDUE_CURRENCY = 'overdue_currency';
    protected const OVERDUE_COUNT = 23;

    /** @var Record */
    protected $fakeRecord;

    protected function setUp(): void
    {
        $this->fakeRecord = new Record(
            Carbon::parse(static::ACCOUNTING_DATE),
            static::REST_AMOUNT,
            static::CONTRACT_ID,
            CreditUsage::IN(),
            static::REST_CURRENCY,
            static::REST_INSTALMENT_COUNT,
            static::OVERDUE_AMOUNT,
            static::OVERDUE_CURRENCY,
            static::OVERDUE_COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'accountingDate' => Carbon::parse(static::ACCOUNTING_DATE),
                'restAmount' => static::REST_AMOUNT,
                'contractId' => static::CONTRACT_ID,
                'creditUsage' => CreditUsage::IN(),
                'restCurrency' => static::REST_CURRENCY,
                'restInstalmentCount' => static::REST_INSTALMENT_COUNT,
                'overdueAmount' => static::OVERDUE_AMOUNT,
                'overdueCurrency' => static::OVERDUE_CURRENCY,
                'overdueCount' => static::OVERDUE_COUNT,
            ],
            $this->fakeRecord->jsonSerialize()
        );
    }

    public function testGetRestAmount(): void
    {
        $this->assertEquals(static::REST_AMOUNT, $this->fakeRecord->getRestAmount());
    }

    public function testGetRestInstalmentCount(): void
    {
        $this->assertEquals(static::REST_INSTALMENT_COUNT, $this->fakeRecord->getRestInstalmentCount());
    }

    public function testGetRestCurrency(): void
    {
        $this->assertEquals(static::REST_CURRENCY, $this->fakeRecord->getRestCurrency());
    }

    public function testGetAccountingDate(): void
    {
        $this->assertEquals(
            static::ACCOUNTING_DATE,
            Carbon::make($this->fakeRecord->getAccountingDate())->toDateString()
        );
    }

    public function testGetOverdueCurrency(): void
    {
        $this->assertEquals(static::OVERDUE_CURRENCY, $this->fakeRecord->getOverdueCurrency());
    }

    public function testGetContractId(): void
    {
        $this->assertEquals(static::CONTRACT_ID, $this->fakeRecord->getContractId());
    }

    public function testGetCreditUsage(): void
    {
        $this->assertEquals(CreditUsage::IN(), $this->fakeRecord->getCreditUsage());
    }

    public function testGetOverdueAmount(): void
    {
        $this->assertEquals(static::OVERDUE_AMOUNT, $this->fakeRecord->getOverdueAmount());
    }

    public function testGetOverdueCount(): void
    {
        $this->assertEquals(static::OVERDUE_COUNT, $this->fakeRecord->getOverdueCount());
    }
}
