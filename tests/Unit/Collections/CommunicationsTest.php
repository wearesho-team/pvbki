<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class CommunicationsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Communications
 * @internal
 */
class CommunicationsTest extends TestCase
{
    /** @var Pvbki\Collections\Communications */
    protected $fakeCommunications;

    protected function setUp(): void
    {
        $this->fakeCommunications = new Pvbki\Collections\Communications();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Communication::class, $this->fakeCommunications->type());
    }
}
