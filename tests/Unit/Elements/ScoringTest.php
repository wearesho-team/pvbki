<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Wearesho\Pvbki\Elements\Scoring;

use PHPUnit\Framework\TestCase;

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
    protected const FAULT_CHANCE = 12.34;
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

    public function testGetFaultChance(): void
    {
        $this->assertEquals(static::FAULT_CHANCE, $this->fakeScoring->getFaultChance());
    }

    public function testGetDegree(): void
    {
        $this->assertEquals(static::DEGREE, $this->fakeScoring->getDegree());
    }

    public function testGetScore(): void
    {
        $this->assertEquals(static::SCORE, $this->fakeScoring->getScore());
    }

    public function testGetAdverse(): void
    {
        $this->assertEquals(static::ADVERSE, $this->fakeScoring->getAdverse());
    }
}
