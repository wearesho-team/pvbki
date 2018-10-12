<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Scoring
 * @package Wearesho\Pvbki\Elements
 */
class Scoring implements ElementInterface
{
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

    public function __construct(
        string $degree = null,
        int $score = null,
        float $faultChance = null,
        string $adverse = null
    ) {
        $this->degree = $degree;
        $this->score = $score;
        $this->faultChance = $faultChance;
        $this->adverse = $adverse;
    }

    public function jsonSerialize(): array
    {
        return [
            'degree' => $this->degree,
            'score' => $this->score,
            'faultChance' => $this->faultChance,
            'adverse' => $this->adverse,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::DEGREE => ParameterType::STRING,
            static::SCORE => ParameterType::INTEGER,
            static::FAULT_CHANCE => ParameterType::FLOAT,
            static::ADVERSE => ParameterType::STRING,
        ];
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
