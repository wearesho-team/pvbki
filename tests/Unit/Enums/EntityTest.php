<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Entity;

/**
 * Class EntityTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Entity
 * @internal
 */
class EntityTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Entity::COMPANY(), new Entity(Entity::COMPANY));
        $this->assertEquals(Entity::INDIVIDUAL(), new Entity(Entity::INDIVIDUAL));
        $this->assertEquals(Entity::SUBJECT(), new Entity(Entity::SUBJECT));

        $this->assertNull((new Entity(null))->jsonSerialize());
        $this->assertNull(Entity::UNDEFINED()->getValue());
    }
}
