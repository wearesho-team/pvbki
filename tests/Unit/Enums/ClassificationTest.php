<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Classification;

/**
 * Class ClassificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 */
class ClassificationTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Classification::INDIVIDUAL(), new Classification(Classification::INDIVIDUAL));
        $this->assertEquals(Classification::ENTREPRENEUR(), new Classification(Classification::ENTREPRENEUR));

        $this->assertNull((new Classification(null))->getValue());
        $this->assertNull(Classification::UNDEFINED()->getValue());
    }
}
