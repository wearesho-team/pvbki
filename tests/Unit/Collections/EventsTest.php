<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class EventsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Events
 * @internal
 */
class EventsTest extends TestCase
{
    /** @var Pvbki\Collections\Events */
    protected $fakeEvents;

    protected function setUp(): void
    {
        $this->fakeEvents = new Pvbki\Collections\Events();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Event::class, $this->fakeEvents->type());
    }
}
