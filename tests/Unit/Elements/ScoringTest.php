<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Scoring;
use Wearesho\Pvbki\ParameterType;

/**
 * Class ScoringTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Scoring
 * @internal
 */
class ScoringTest extends TestCase
{
    protected const DEGREE = 'degree';
    protected const SCORE = 1000;
    protected const FAULT_CHANCE = 45.1234;
    protected const ADVERSE = 'adverse';

    /** @var Scoring */
    protected $fakeScoring;

    protected function setUp(): void
    {
        $this->fakeScoring = new Scoring(
            static::DEGREE,
            static::SCORE,
            static::FAULT_CHANCE,
            static::ADVERSE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'degree' => static::DEGREE,
                'score' => static::SCORE,
                'faultChance' => static::FAULT_CHANCE,
                'adverse' => static::ADVERSE,
            ],
            $this->fakeScoring->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Scoring::DEGREE => ParameterType::STRING,
                Scoring::SCORE => ParameterType::INTEGER,
                Scoring::FAULT_CHANCE => ParameterType::FLOAT,
                Scoring::ADVERSE => ParameterType::STRING,
            ],
            Scoring::parameters()
        );
    }

    public function testGetAdverse(): void
    {
        $this->assertEquals(static::ADVERSE, $this->fakeScoring->getAdverse());
    }

    public function testGetDegree(): void
    {
        $this->assertEquals(static::DEGREE, $this->fakeScoring->getDegree());
    }

    public function testGetFaultChance(): void
    {
        $this->assertEquals(static::FAULT_CHANCE, $this->fakeScoring->getFaultChance());
    }

    public function testGetScore(): void
    {
        $this->assertEquals(static::SCORE, $this->fakeScoring->getScore());
    }
}
