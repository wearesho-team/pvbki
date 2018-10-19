<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class DependantsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Dependants
 * @internal
 */
class DependantsTest extends TestCase
{
    /** @var Pvbki\Collections\Dependants */
    protected $fakeDependants;

    protected function setUp(): void
    {
        $this->fakeDependants = new Pvbki\Collections\Dependants();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Dependant::class, $this->fakeDependants->type());
    }
}
