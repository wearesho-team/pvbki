<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class IdentifiersTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Identifiers
 * @internal
 */
class IdentifiersTest extends TestCase
{
    /** @var Pvbki\Collections\Identifiers */
    protected $fakeIdentifiers;

    protected function setUp(): void
    {
        $this->fakeIdentifiers = new Pvbki\Collections\Identifiers();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Identifier::class, $this->fakeIdentifiers->type());
    }
}
