<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class RecordsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Records
 * @internal
 */
class RecordsTest extends TestCase
{
    /** @var Pvbki\Collections\Records */
    protected $fakeRecords;

    protected function setUp(): void
    {
        $this->fakeRecords = new Pvbki\Collections\Records();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Record::class, $this->fakeRecords->type());
    }
}
