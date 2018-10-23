<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Wearesho\Pvbki\Elements\Error;

use PHPUnit\Framework\TestCase;

/**
 * Class ErrorTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Error
 * @internal
 */
class ErrorTest extends TestCase
{
    protected const CODE = 'code';
    protected const MESSAGE = 'message';
    protected const TYPE = 'type';

    /** @var Error */
    protected $fakeError;

    protected function setUp(): void
    {
        $this->fakeError = new Error(
            static::CODE,
            static::MESSAGE,
            static::TYPE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'code' => static::CODE,
                'message' => static::MESSAGE,
                'type' => static::TYPE,
            ],
            $this->fakeError->jsonSerialize()
        );
    }

    public function testGetCode(): void
    {
        $this->assertEquals(static::CODE, $this->fakeError->getCode());
    }

    public function testGetType(): void
    {
        $this->assertEquals(static::TYPE, $this->fakeError->getType());
    }

    public function testGetMessage(): void
    {
        $this->assertEquals(static::MESSAGE, $this->fakeError->getMessage());
    }
}
