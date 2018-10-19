<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class SummariesTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Summaries
 * @internal
 */
class SummariesTest extends TestCase
{
    /** @var Pvbki\Collections\Summaries */
    protected $fakeSummaries;

    protected function setUp(): void
    {
        $this->fakeSummaries = new Pvbki\Collections\Summaries();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Summary::class, $this->fakeSummaries->type());
    }
}
