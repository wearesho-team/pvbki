<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Scoring
 * @package Wearesho\Pvbki\Elements
 */
class Scoring extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Scoring';
    public const DEGREE = 'Degree';
    public const SCORE = 'Score';
    public const FAULT_CHANCE = 'FaultChance';
    public const ADVERSE = 'Adverse';

    /** @var string|null */
    protected $degree;

    /** @var int|null */
    protected $score;

    /** @var float|null */
    protected $faultChance;

    /** @var string|null */
    protected $adverse;

    public function __construct(?string $degree, ?int $score, ?float $faultChance, ?string $adverse)
    {
        $this->degree = $degree;
        $this->score = $score;
        $this->faultChance = $faultChance;
        $this->adverse = $adverse;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function getFaultChance(): ?float
    {
        return $this->faultChance;
    }

    public function getAdverse(): ?string
    {
        return $this->adverse;
    }
}
