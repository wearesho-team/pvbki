<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Record
 * @package Wearesho\Pvbki\Elements
 */
class Record extends Element
{
    public const ROOT = 'Record';
    public const CONTRACT_ID = 'contractid';
    public const ACCOUNTING_DATE = 'accountingDate';
    public const CREDIT_USAGE = 'creditUsage';
    public const REST_AMOUNT = 'restAmount';
    public const REST_CURRENCY = 'restCurrency';
    public const REST_INSTALMENT_COUNT = 'restInstalmentCount';
    public const OVERDUE_AMOUNT = 'overdueAmount';
    public const OVERDUE_CURRENCY = 'overdueCurrency';
    public const OVERDUE_COUNT = 'overdueCount';

    /** @var string|null */
    protected $contractId;

    /** @var \DateTimeInterface|null */
    protected $accountingDate;

    /** @var int|null */
    protected $creditUsage;

    /** @var float|null */
    protected $restAmount;

    /** @var string|null */
    protected $restCurrency;

    /** @var int|null */
    protected $restInstalmentCount;

    /** @var float|null */
    protected $overdueAmount;

    /** @var string|null */
    protected $overdueCurrency;

    /** @var int|null */
    protected $overdueCount;

    public function __construct(
        ?string $contractId,
        ?\DateTimeInterface $accountingDate,
        ?int $creditUsage,
        ?float $restAmount,
        ?string $restCurrency,
        ?int $restInstalmentCount,
        ?float $overdueAmount,
        ?string $overdueCurrency,
        ?int $overdueCount
    ) {
        $this->contractId = $contractId;
        $this->accountingDate = $accountingDate;
        $this->creditUsage = $creditUsage;
        $this->restAmount = $restAmount;
        $this->restCurrency = $restCurrency;
        $this->restInstalmentCount = $restInstalmentCount;
        $this->overdueAmount = $overdueAmount;
        $this->overdueCurrency = $overdueCurrency;
        $this->overdueCount = $overdueCount;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getAccountingDate(): ?\DateTimeInterface
    {
        return $this->accountingDate;
    }

    public function getCreditUsage(): ?int
    {
        return $this->creditUsage;
    }

    public function getRestAmount(): ?float
    {
        return $this->restAmount;
    }

    public function getRestCurrency(): ?string
    {
        return $this->restCurrency;
    }

    public function getRestInstalmentCount(): ?int
    {
        return $this->restInstalmentCount;
    }

    public function getOverdueAmount(): ?float
    {
        return $this->overdueAmount;
    }

    public function getOverdueCurrency(): ?string
    {
        return $this->overdueCurrency;
    }

    public function getOverdueCount(): ?int
    {
        return $this->overdueCount;
    }
}
