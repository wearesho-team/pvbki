<?php

namespace Wearesho\Pvbki\Elements;

/**
 * Class Scoring
 * @package Wearesho\Pvbki\Elements
 */
class Scoring implements \JsonSerializable
{
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
