<?php

namespace Wearesho\Pvbki\Elements;

use Carbon\Carbon;
use Wearesho\Pvbki\Collections\CollateralCollection;
use Wearesho\Pvbki\Collections\RecordCollection;
use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Contract
 * @package Wearesho\Pvbki\Elements
 */
class Contract implements ElementInterface
{
    public const ROLE_ID = 'roleId';
    public const PROVIDER = 'provider';
    public const CONTRACT_ID = 'contractid';
    public const LAST_UPDATE = 'lastUpdate';
    public const PHASE_ID = 'phaseId';
    public const CURRENCY = 'currency';
    public const DATE_OF_SIGNATURE = 'dateOfSignature';
    public const CREDIT_PURPOSE = 'creditPurpose';
    public const NEGATIVE_STATUS = 'negativeStatus';
    public const APPLICATION_DATE = 'applicationDate';
    public const START_DATE = 'startDate';
    public const EXPECTED_END_DATE = 'expectedEndDate';
    public const FACTUAL_END_DATE = 'factualEndDate';
    public const TYPE = 'type';
    public const PAYMENT_METHOD_ID = 'paymentMethodId';
    public const PAYMENT_PERIOD_ID = 'paymentPeriodId';
    public const ACTUAL_CURRENCY = 'actualCurrency';
    public const TOTAL_AMOUNT = 'totalAmount';
    public const CREDIT_LIMIT = 'creditLimit';
    public const INSTALMENT_COUNT = 'instalmentCount';
    public const INSTALMENT_AMOUNT_CURRENCY = 'instalmentAmountCurrency';
    public const INSTALMENT_AMOUNT = 'instalmentAmount';
    public const REST_INSTALMENT_COUNT = 'restInstalmentCount';
    public const REST_AMOUNT = 'restAmount';
    public const OVERDUE_COUNT = 'overdueCount';
    public const OVERDUE_AMOUNT = 'overdueAmount';

    /** @var int|null */
    protected $roleId;

    /** @var string|null */
    protected $provider;

    /** @var string|null */
    protected $contractId;

    /** @var \DateTimeInterface|null */
    protected $lastUpdate;

    /** @var int|null */
    protected $phaseId;

    /** @var string|null */
    protected $currency;

    /** @var \DateTimeInterface|null */
    protected $dateOfSignature;

    /** @var int|null */
    protected $creditPurpose;

    /** @var int|null */
    protected $negativeStatus;

    /** @var \DateTimeInterface|null */
    protected $applicationDate;

    /** @var \DateTimeInterface|null */
    protected $startDate;

    /** @var \DateTimeInterface|null */
    protected $expectedEndDate;

    /** @var \DateTimeInterface|null */
    protected $factualEndDate;

    /** @var string|null */
    protected $type;

    /** @var int|null */
    protected $paymentMethodId;

    /** @var int|null */
    protected $paymentPeriodId;

    /** @var string|null */
    protected $actualCurrency;

    /** @var float|null */
    protected $totalAmount;

    /** @var float|null */
    protected $creditLimit;

    /** @var int|null */
    protected $instalmentCount;

    /** @var string|null */
    protected $instalmentAmountCurrency;

    /** @var float|null */
    protected $instalmentAmount;

    /** @var int|null */
    protected $restInstalmentCount;

    /** @var float|null */
    protected $restAmount;

    /** @var int|null */
    protected $overdueCount;

    /** @var float|null */
    protected $overdueAmount;

    /** @var CollateralCollection */
    protected $collaterals;

    /** @var RecordCollection */
    protected $records;

    public function __construct(
        ?int $roleId,
        ?string $provider,
        ?string $contractId,
        ?\DateTimeInterface $lastUpdate,
        ?int $phaseId,
        ?string $currency,
        ?\DateTimeInterface $dateOfSignature,
        ?int $creditPurpose,
        ?int $negativeStatus,
        ?\DateTimeInterface $applicationDate,
        ?\DateTimeInterface $startDate,
        ?\DateTimeInterface $expectedEndDate,
        ?\DateTimeInterface $factualEndDate,
        ?string $type,
        ?int $paymentMethodId,
        ?int $paymentPeriodId,
        ?string $actualCurrency,
        ?float $totalAmount,
        ?float $creditLimit,
        ?int $instalmentCount,
        ?string $instalmentAmountCurrency,
        ?float $instalmentAmount,
        ?int $restInstalmentCount,
        ?float $restAmount,
        ?int $overdueCount,
        ?float $overdueAmount,
        ?CollateralCollection $collaterals,
        ?RecordCollection $records
    ) {
        $this->roleId = $roleId;
        $this->provider = $provider;
        $this->contractId = $contractId;
        $this->lastUpdate = $lastUpdate;
        $this->phaseId = $phaseId;
        $this->currency = $currency;
        $this->dateOfSignature = $dateOfSignature;
        $this->creditPurpose = $creditPurpose;
        $this->negativeStatus = $negativeStatus;
        $this->applicationDate = $applicationDate;
        $this->startDate = $startDate;
        $this->expectedEndDate = $expectedEndDate;
        $this->factualEndDate = $factualEndDate;
        $this->type = $type;
        $this->paymentMethodId = $paymentMethodId;
        $this->paymentPeriodId = $paymentPeriodId;
        $this->actualCurrency = $actualCurrency;
        $this->totalAmount = $totalAmount;
        $this->creditLimit = $creditLimit;
        $this->instalmentCount = $instalmentCount;
        $this->instalmentAmountCurrency = $instalmentAmountCurrency;
        $this->instalmentAmount = $instalmentAmount;
        $this->restInstalmentCount = $restInstalmentCount;
        $this->restAmount = $restAmount;
        $this->overdueCount = $overdueCount;
        $this->overdueAmount = $overdueAmount;
        $this->collaterals = $collaterals ?? new CollateralCollection();
        $this->records = $records ?? new RecordCollection();
    }

    public function jsonSerialize(): array
    {
        return [
            static::ROLE_ID => $this->roleId,
            static::PROVIDER => $this->provider,
            static::CONTRACT_ID => $this->contractId,
            static::LAST_UPDATE => Carbon::make($this->lastUpdate),
            static::PHASE_ID => $this->phaseId,
            static::CURRENCY => $this->currency,
            static::DATE_OF_SIGNATURE => Carbon::make($this->dateOfSignature),
            static::CREDIT_PURPOSE => $this->creditPurpose,
            static::NEGATIVE_STATUS => $this->negativeStatus,
            static::APPLICATION_DATE => Carbon::make($this->applicationDate),
            static::START_DATE => Carbon::make($this->startDate),
            static::EXPECTED_END_DATE => Carbon::make($this->expectedEndDate),
            static::FACTUAL_END_DATE => Carbon::make($this->factualEndDate),
            static::TYPE => $this->type,
            static::PAYMENT_METHOD_ID => $this->paymentMethodId,
            static::PAYMENT_PERIOD_ID => $this->paymentPeriodId,
            static::ACTUAL_CURRENCY => $this->actualCurrency,
            static::TOTAL_AMOUNT => $this->totalAmount,
            static::CREDIT_LIMIT => $this->creditLimit,
            static::INSTALMENT_COUNT => $this->instalmentCount,
            static::INSTALMENT_AMOUNT_CURRENCY => $this->instalmentAmountCurrency,
            static::INSTALMENT_AMOUNT => $this->instalmentAmount,
            static::REST_INSTALMENT_COUNT => $this->restInstalmentCount,
            static::REST_AMOUNT => $this->restAmount,
            static::OVERDUE_COUNT => $this->overdueCount,
            static::OVERDUE_AMOUNT => $this->overdueAmount,
            'collaterals' => $this->collaterals,
            'records' => $this->records,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::ROLE_ID => ParameterType::INTEGER,
            static::PROVIDER => ParameterType::STRING,
            static::CONTRACT_ID => ParameterType::STRING,
            static::LAST_UPDATE => ParameterType::DATE,
            static::PHASE_ID => ParameterType::INTEGER,
            static::CURRENCY => ParameterType::STRING,
            static::DATE_OF_SIGNATURE => ParameterType::DATE,
            static::CREDIT_PURPOSE => ParameterType::INTEGER,
            static::NEGATIVE_STATUS => ParameterType::INTEGER,
            static::APPLICATION_DATE => ParameterType::DATE,
            static::START_DATE => ParameterType::DATE,
            static::EXPECTED_END_DATE => ParameterType::DATE,
            static::FACTUAL_END_DATE => ParameterType::DATE,
            static::TYPE => ParameterType::STRING,
            static::PAYMENT_METHOD_ID => ParameterType::INTEGER,
            static::PAYMENT_PERIOD_ID => ParameterType::INTEGER,
            static::ACTUAL_CURRENCY => ParameterType::STRING,
            static::TOTAL_AMOUNT => ParameterType::FLOAT,
            static::CREDIT_LIMIT => ParameterType::FLOAT,
            static::INSTALMENT_COUNT => ParameterType::INTEGER,
            static::INSTALMENT_AMOUNT_CURRENCY => ParameterType::STRING,
            static::INSTALMENT_AMOUNT => ParameterType::FLOAT,
            static::REST_INSTALMENT_COUNT => ParameterType::INTEGER,
            static::REST_AMOUNT => ParameterType::FLOAT,
            static::OVERDUE_COUNT => ParameterType::INTEGER,
            static::OVERDUE_AMOUNT => ParameterType::FLOAT,
        ];
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function getPhaseId(): ?int
    {
        return $this->phaseId;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getDateOfSignature(): ?\DateTimeInterface
    {
        return $this->dateOfSignature;
    }

    public function getCreditPurpose(): ?int
    {
        return $this->creditPurpose;
    }

    public function getNegativeStatus(): ?int
    {
        return $this->negativeStatus;
    }

    public function getApplicationDate(): ?\DateTimeInterface
    {
        return $this->applicationDate;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function getExpectedEndDate(): ?\DateTimeInterface
    {
        return $this->expectedEndDate;
    }

    public function getFactualEndDate(): ?\DateTimeInterface
    {
        return $this->factualEndDate;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getPaymentMethodId(): ?int
    {
        return $this->paymentMethodId;
    }

    public function getPaymentPeriodId(): ?int
    {
        return $this->paymentPeriodId;
    }

    public function getActualCurrency(): ?string
    {
        return $this->actualCurrency;
    }

    public function getTotalAmount(): ?float
    {
        return $this->totalAmount;
    }

    public function getCreditLimit(): ?float
    {
        return $this->creditLimit;
    }

    public function getInstalmentCount(): ?int
    {
        return $this->instalmentCount;
    }

    public function getInstalmentAmountCurrency(): ?string
    {
        return $this->instalmentAmountCurrency;
    }

    public function getInstalmentAmount(): ?float
    {
        return $this->instalmentAmount;
    }

    public function getRestInstalmentCount(): ?int
    {
        return $this->restInstalmentCount;
    }

    public function getRestAmount(): ?float
    {
        return $this->restAmount;
    }

    public function getOverdueCount(): ?int
    {
        return $this->overdueCount;
    }

    public function getOverdueAmount(): ?float
    {
        return $this->overdueAmount;
    }

    public function getCollaterals(): CollateralCollection
    {
        return $this->collaterals;
    }

    public function getRecords(): RecordCollection
    {
        return $this->records;
    }
}
