<?php

namespace Wearesho\Pvbki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\RequestResponsePair;

/**
 * Class RequestResponsePairTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass RequestResponsePair
 * @internal
 */
class RequestResponsePairTest extends TestCase
{
    protected const REQUEST = 'request';
    protected const RESPONSE = 'response';

    /** @var RequestResponsePair */
    protected $fakeRequestResponsePair;

    protected function setUp(): void
    {
        $this->fakeRequestResponsePair = new RequestResponsePair(static::REQUEST, static::RESPONSE);
    }

    public function testGetRequest(): void
    {
        $this->assertEquals(static::REQUEST, $this->fakeRequestResponsePair->getRequest());
    }

    public function testGetResponse(): void
    {
        $this->assertEquals(static::RESPONSE, $this->fakeRequestResponsePair->getResponse());
    }
}
