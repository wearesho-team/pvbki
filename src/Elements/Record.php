<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Record
 * @package Wearesho\Pvbki\Elements
 */
class Record extends Pvbki\Infrastructure\Element
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

    /** @var \DateTimeInterface|null */
    protected $accountingDate;

    /** @var float|null */
    protected $restAmount;

    /** @var string|null */
    protected $contractId;

    /** @var Pvbki\Enums\CreditUsage */
    protected $creditUsage;

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
        ?\DateTimeInterface $accountingDate,
        ?float $restAmount,
        ?string $contractId,
        Pvbki\Enums\CreditUsage $creditUsage,
        ?string $restCurrency,
        ?int $restInstalmentCount,
        ?float $overdueAmount,
        ?string $overdueCurrency,
        ?int $overdueCount
    ) {
        $this->accountingDate = $accountingDate;
        $this->restAmount = $restAmount;
        $this->contractId = $contractId;
        $this->creditUsage = $creditUsage;
        $this->restCurrency = $restCurrency;
        $this->restInstalmentCount = $restInstalmentCount;
        $this->overdueAmount = $overdueAmount;
        $this->overdueCurrency = $overdueCurrency;
        $this->overdueCount = $overdueCount;
    }

    public function getAccountingDate(): ?\DateTimeInterface
    {
        return $this->accountingDate;
    }

    public function getRestAmount(): ?float
    {
        return $this->restAmount;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getCreditUsage(): Pvbki\Enums\CreditUsage
    {
        return $this->creditUsage;
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
