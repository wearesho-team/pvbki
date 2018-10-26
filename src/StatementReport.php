<?php

namespace Wearesho\Pvbki;

/**
 * Class StatementReport
 * @package Wearesho\Pvbki
 */
class StatementReport implements \JsonSerializable
{
    public const PROTECTION = 'protection';
    public const GENERATED = 'generated';
    public const POWERED = 'powered';

    /** @var bool */
    protected $protection;

    /** @var \DateTimeInterface */
    protected $generated;

    /** @var string */
    protected $powered;

    /** @var Collections\Errors */
    protected $errors;

    /** @var Elements\Subject */
    protected $subject;

    /** @var Collections\Identifiers */
    protected $identifications;

    /** @var Collections\Communications */
    protected $communications;

    /** @var Collections\Addresses */
    protected $addresses;

    /** @var Collections\Dependants */
    protected $dependants;

    /** @var Collections\MonthlyIncomes */
    protected $monthlyIncomes;

    /** @var Collections\Summaries */
    protected $summaries;

    /** @var Collections\Contracts */
    protected $contracts;

    /** @var Collections\Events */
    protected $events;

    /** @var Elements\Scoring */
    protected $scoring;

    public function __construct(
        bool $protection,
        \DateTimeInterface $generated,
        string $powered,
        Collections\Errors $errors,
        Elements\Subject $subject,
        Collections\Identifiers $identifications,
        Collections\Communications $communications,
        Collections\Addresses $addresses,
        Collections\Dependants $dependants,
        Collections\MonthlyIncomes $monthlyIncomes,
        Collections\Summaries $summaries,
        Collections\Contracts $contracts,
        Collections\Events $events,
        Elements\Scoring $scoring
    ) {
        $this->protection = $protection;
        $this->generated = $generated;
        $this->powered = $powered;
        $this->errors = $errors;
        $this->subject = $subject;
        $this->identifications = $identifications;
        $this->communications = $communications;
        $this->addresses = $addresses;
        $this->dependants = $dependants;
        $this->monthlyIncomes = $monthlyIncomes;
        $this->summaries = $summaries;
        $this->contracts = $contracts;
        $this->events = $events;
        $this->scoring = $scoring;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function isProtection(): bool
    {
        return $this->protection;
    }

    public function getGenerated(): \DateTimeInterface
    {
        return $this->generated;
    }

    public function getPowered(): string
    {
        return $this->powered;
    }

    public function getErrors(): Collections\Errors
    {
        return $this->errors;
    }

    public function getSubject(): Elements\Subject
    {
        return $this->subject;
    }

    public function getIdentifications(): Collections\Identifiers
    {
        return $this->identifications;
    }

    public function getCommunications(): Collections\Communications
    {
        return $this->communications;
    }

    public function getAddresses(): Collections\Addresses
    {
        return $this->addresses;
    }

    public function getDependants(): Collections\Dependants
    {
        return $this->dependants;
    }

    public function getMonthlyIncomes(): Collections\MonthlyIncomes
    {
        return $this->monthlyIncomes;
    }

    public function getSummaries(): Collections\Summaries
    {
        return $this->summaries;
    }

    public function getContracts(): Collections\Contracts
    {
        return $this->contracts;
    }

    public function getEvents(): Collections\Events
    {
        return $this->events;
    }

    public function getScoring(): Elements\Scoring
    {
        return $this->scoring;
    }
}
