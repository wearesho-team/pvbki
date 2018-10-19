<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Event;

/**
 * Class EventTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Event
 * @internal
 */
class EventTest extends TestCase
{
    protected const NAME = 'name';
    protected const WHEN = '2018-03-12';
    protected const PROVIDER = 1;

    /** @var Event */
    protected $fakeEvent;

    protected function setUp(): void
    {
        $this->fakeEvent = new Event(
            static::NAME,
            Carbon::parse(static::WHEN),
            static::PROVIDER
        );
    }

    public function testJsoSerialize(): void
    {
        $this->assertArraySubset(
            [
                'name' => static::NAME,
                'when' => Carbon::parse(static::WHEN),
                'provider' => static::PROVIDER,
            ],
            $this->fakeEvent->jsonSerialize()
        );
    }

    public function testGetProvider(): void
    {
        $this->assertEquals(static::PROVIDER, $this->fakeEvent->getProvider());
    }

    public function testGetName(): void
    {
        $this->assertEquals(static::NAME, $this->fakeEvent->getName());
    }

    public function testGetWhen(): void
    {
        $this->assertEquals(static::WHEN, Carbon::make($this->fakeEvent->getWhen())->toDateString());
    }
}
