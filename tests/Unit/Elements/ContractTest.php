<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class ContractTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Contract
 * @internal
 */
class ContractTest extends TestCase
{
    protected const PROVIDER = 'provider';
    protected const CONTRACT_ID = 'contract_id';
    protected const LAST_UPDATE = '2018-03-12';
    protected const CURRENCY = 'currency';
    protected const DATE_OF_SIGNATURE = '2018-04-25';
    protected const APPLICATION_DATE = '2018-02-10';
    protected const START_DATE = '2017-09-25';
    protected const EXPECTED_END_DATE = '2020-10-22';
    protected const FACTUAL_END_DATE = '2020-11-25';
    protected const ACTUAL_CURRENCY = 'actual_currency';
    protected const TOTAL_AMOUNT = 78.90;
    protected const CREDIT_LIMIT = 1234;
    protected const INSTALMENT_COUNT = 5;
    protected const INSTALMENT_AMOUNT_CURRENCY = 'instalment_amount_currency';
    protected const INSTALMENT_AMOUNT = 67.89;
    protected const REST_INSTALMENT_COUNT = 10;
    protected const REST_AMOUNT = 234.56;
    protected const OVERDUE_COUNT = 7;
    protected const OVERDUE_AMOUNT = 8;

    /** @var Pvbki\Elements\Contract */
    protected $fakeContract;

    protected function setUp(): void
    {
        $this->fakeContract = new Pvbki\Elements\Contract(
            Pvbki\Enums\Role::PARTNER(),
            static::PROVIDER,
            static::CONTRACT_ID,
            Carbon::parse(static::LAST_UPDATE),
            Pvbki\Enums\Phase::WITHDRAWN(),
            static::CURRENCY,
            Carbon::parse(static::DATE_OF_SIGNATURE),
            Pvbki\Enums\CreditPurpose::REPLENISHMENT_CURRENT_ASSETS(),
            Pvbki\Enums\ContractNegativeStatus::INCREASED_RISK(),
            Carbon::parse(static::APPLICATION_DATE),
            Carbon::parse(static::START_DATE),
            Carbon::parse(static::EXPECTED_END_DATE),
            Carbon::parse(static::FACTUAL_END_DATE),
            Pvbki\Enums\ContractType::INSTALMENT(),
            Pvbki\Enums\PaymentMethod::UNDETERMINED(),
            Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(),
            static::ACTUAL_CURRENCY,
            static::TOTAL_AMOUNT,
            static::CREDIT_LIMIT,
            static::INSTALMENT_COUNT,
            static::INSTALMENT_AMOUNT_CURRENCY,
            static::INSTALMENT_AMOUNT,
            static::REST_INSTALMENT_COUNT,
            static::REST_AMOUNT,
            static::OVERDUE_COUNT,
            static::OVERDUE_AMOUNT,
            new Pvbki\Collections\Records([]),
            new Pvbki\Collections\Collaterals([])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'roleId' => Pvbki\Enums\Role::PARTNER(),
                'provider' => static::PROVIDER,
                'contractId' => static::CONTRACT_ID,
                'lastUpdate' => Carbon::parse(static::LAST_UPDATE),
                'phaseId' => Pvbki\Enums\Phase::WITHDRAWN(),
                'currency' => static::CURRENCY,
                'dateOfSignature' => Carbon::parse(static::DATE_OF_SIGNATURE),
                'creditPurpose' => Pvbki\Enums\CreditPurpose::REPLENISHMENT_CURRENT_ASSETS(),
                'negativeStatus' => Pvbki\Enums\ContractNegativeStatus::INCREASED_RISK(),
                'applicationDate' => Carbon::parse(static::APPLICATION_DATE),
                'startDate' => Carbon::parse(static::START_DATE),
                'expectedEndDate' => Carbon::parse(static::EXPECTED_END_DATE),
                'factualEndDate' => Carbon::parse(static::FACTUAL_END_DATE),
                'type' => Pvbki\Enums\ContractType::INSTALMENT(),
                'paymentMethodId' => Pvbki\Enums\PaymentMethod::UNDETERMINED(),
                'paymentPeriodId' => Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(),
                'actualCurrency' => static::ACTUAL_CURRENCY,
                'totalAmount' => static::TOTAL_AMOUNT,
                'creditLimit' => static::CREDIT_LIMIT,
                'instalmentCount' => static::INSTALMENT_COUNT,
                'instalmentAmountCurrency' => static::INSTALMENT_AMOUNT_CURRENCY,
                'instalmentAmount' => static::INSTALMENT_AMOUNT,
                'restInstalmentCount' => static::REST_INSTALMENT_COUNT,
                'restAmount' => static::REST_AMOUNT,
                'overdueCount' => static::OVERDUE_COUNT,
                'overdueAmount' => static::OVERDUE_AMOUNT,
                'records' => new Pvbki\Collections\Records([]),
                'collaterals' => new Pvbki\Collections\Collaterals([])
            ],
            $this->fakeContract->jsonSerialize()
        );
    }

    public function testGetDateOfSignature(): void
    {
        $this->assertEquals(
            static::DATE_OF_SIGNATURE,
            Carbon::make($this->fakeContract->getDateOfSignature())->toDateString()
        );
    }

    public function testGetTotalAmount(): void
    {
        $this->assertEquals(static::TOTAL_AMOUNT, $this->fakeContract->getTotalAmount());
    }

    public function testGetLastUpdate(): void
    {
        $this->assertEquals(static::LAST_UPDATE, Carbon::make($this->fakeContract->getLastUpdate())->toDateString());
    }

    public function testGetApplicationDate(): void
    {
        $this->assertEquals(
            static::APPLICATION_DATE,
            Carbon::make($this->fakeContract->getApplicationDate())->toDateString()
        );
    }

    public function testGetCreditPurpose(): void
    {
        $this->assertEquals(
            Pvbki\Enums\CreditPurpose::REPLENISHMENT_CURRENT_ASSETS(),
            $this->fakeContract->getCreditPurpose()
        );
    }

    public function testGetStartDate(): void
    {
        $this->assertEquals(static::START_DATE, Carbon::make($this->fakeContract->getStartDate())->toDateString());
    }

    public function testGetRecords(): void
    {
        $this->assertEquals(new Pvbki\Collections\Records([]), $this->fakeContract->getRecords());
    }

    public function testGetActualCurrency(): void
    {
        $this->assertEquals(static::ACTUAL_CURRENCY, $this->fakeContract->getActualCurrency());
    }

    public function testGetContractId(): void
    {
        $this->assertEquals(static::CONTRACT_ID, $this->fakeContract->getContractId());
    }

    public function testGetInstalmentAmount(): void
    {
        $this->assertEquals(static::INSTALMENT_AMOUNT, $this->fakeContract->getInstalmentAmount());
    }

    public function testGetFactualEndDate(): void
    {
        $this->assertEquals(
            static::FACTUAL_END_DATE,
            Carbon::make($this->fakeContract->getFactualEndDate())->toDateString()
        );
    }

    public function testGetCollaterals(): void
    {
        $this->assertEquals(new Pvbki\Collections\Collaterals([]), $this->fakeContract->getCollaterals());
    }

    public function testGetRestInstalmentCount(): void
    {
        $this->assertEquals(static::REST_INSTALMENT_COUNT, $this->fakeContract->getRestInstalmentCount());
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(static::CURRENCY, $this->fakeContract->getCurrency());
    }

    public function testGetExpectedEndDate(): void
    {
        $this->assertEquals(
            static::EXPECTED_END_DATE,
            Carbon::make($this->fakeContract->getExpectedEndDate())->toDateString()
        );
    }

    public function testGetCreditLimit(): void
    {
        $this->assertEquals(static::CREDIT_LIMIT, $this->fakeContract->getCreditLimit());
    }

    public function testGetOverdueCount(): void
    {
        $this->assertEquals(static::OVERDUE_COUNT, $this->fakeContract->getOverdueCount());
    }

    public function testGetPaymentPeriodId(): void
    {
        $this->assertEquals(Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(), $this->fakeContract->getPaymentPeriodId());
    }

    public function testGetOverdueAmount(): void
    {
        $this->assertEquals(static::OVERDUE_AMOUNT, $this->fakeContract->getOverdueAmount());
    }

    public function testGetPhaseId(): void
    {
        $this->assertEquals(Pvbki\Enums\Phase::WITHDRAWN(), $this->fakeContract->getPhaseId());
    }

    public function testGetPaymentMethodId(): void
    {
        $this->assertEquals(Pvbki\Enums\PaymentMethod::UNDETERMINED(), $this->fakeContract->getPaymentMethodId());
    }

    public function testGetNegativeStatus(): void
    {
        $this->assertEquals(
            Pvbki\Enums\ContractNegativeStatus::INCREASED_RISK(),
            $this->fakeContract->getNegativeStatus()
        );
    }

    public function testGetRestAmount(): void
    {
        $this->assertEquals(static::REST_AMOUNT, $this->fakeContract->getRestAmount());
    }

    public function testGetType(): void
    {
        $this->assertEquals(Pvbki\Enums\ContractType::INSTALMENT(), $this->fakeContract->getType());
    }

    public function testGetInstalmentCount(): void
    {
        $this->assertEquals(static::INSTALMENT_COUNT, $this->fakeContract->getInstalmentCount());
    }

    public function testGetInstalmentAmountCurrency(): void
    {
        $this->assertEquals(static::INSTALMENT_AMOUNT_CURRENCY, $this->fakeContract->getInstalmentAmountCurrency());
    }

    public function testGetRoleId(): void
    {
        $this->assertEquals(Pvbki\Enums\Role::PARTNER(), $this->fakeContract->getRoleId());
    }

    public function testGetProvider(): void
    {
        $this->assertEquals(static::PROVIDER, $this->fakeContract->getProvider());
    }
}
