<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Contract
 * @package Wearesho\Pvbki\Elements
 */
class Contract extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Contract';
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

    /** @var Pvbki\Enums\Phase */
    protected $phaseId;

    /** @var string|null */
    protected $currency;

    /** @var \DateTimeInterface|null */
    protected $dateOfSignature;

    /** @var Pvbki\Enums\CreditPurpose */
    protected $creditPurpose;

    /** @var Pvbki\Enums\ContractNegativeStatus */
    protected $negativeStatus;

    /** @var \DateTimeInterface|null */
    protected $applicationDate;

    /** @var \DateTimeInterface|null */
    protected $startDate;

    /** @var \DateTimeInterface|null */
    protected $expectedEndDate;

    /** @var \DateTimeInterface|null */
    protected $factualEndDate;

    /** @var Pvbki\Enums\ContractType */
    protected $type;

    /** @var Pvbki\Enums\PaymentMethod */
    protected $paymentMethodId;

    /** @var Pvbki\Enums\PaymentPeriod */
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

    /** @var Pvbki\Collections\Records */
    protected $records;

    /** @var Pvbki\Collections\Collaterals */
    protected $collaterals;

    public function __construct(
        Pvbki\Enums\Role $roleId,
        ?string $provider,
        ?string $contractId,
        ?\DateTimeInterface $lastUpdate,
        Pvbki\Enums\Phase $phaseId,
        ?string $currency,
        ?\DateTimeInterface $dateOfSignature,
        Pvbki\Enums\CreditPurpose $creditPurpose,
        Pvbki\Enums\ContractNegativeStatus $negativeStatus,
        ?\DateTimeInterface $applicationDate,
        ?\DateTimeInterface $startDate,
        ?\DateTimeInterface $expectedEndDate,
        ?\DateTimeInterface $factualEndDate,
        Pvbki\Enums\ContractType $type,
        Pvbki\Enums\PaymentMethod $paymentMethodId,
        Pvbki\Enums\PaymentPeriod $paymentPeriodId,
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
        Pvbki\Collections\Records $records,
        Pvbki\Collections\Collaterals $collaterals
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
        $this->records = $records;
        $this->collaterals = $collaterals;
    }

    public function getRoleId(): Pvbki\Enums\Role
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

    public function getPhaseId(): Pvbki\Enums\Phase
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

    public function getCreditPurpose(): Pvbki\Enums\CreditPurpose
    {
        return $this->creditPurpose;
    }

    public function getNegativeStatus(): Pvbki\Enums\ContractNegativeStatus
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

    public function getType(): Pvbki\Enums\ContractType
    {
        return $this->type;
    }

    public function getPaymentMethodId(): Pvbki\Enums\PaymentMethod
    {
        return $this->paymentMethodId;
    }

    public function getPaymentPeriodId(): Pvbki\Enums\PaymentPeriod
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

    public function getRecords(): Pvbki\Collections\Records
    {
        return $this->records;
    }

    public function getCollaterals(): Pvbki\Collections\Collaterals
    {
        return $this->collaterals;
    }
}
