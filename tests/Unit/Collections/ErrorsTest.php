<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class ErrorsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Errors
 * @internal
 */
class ErrorsTest extends TestCase
{
    /** @var Pvbki\Collections\Errors */
    protected $fakeErrors;

    protected function setUp(): void
    {
        $this->fakeErrors = new Pvbki\Collections\Errors();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Error::class, $this->fakeErrors->type());
    }
}
