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
    protected const REQUEST_BODY = 'request_body';
    protected const RESPONSE_BODY = 'response_body';

    /** @var RequestResponsePair */
    protected $fakeRequestResponsePair;

    protected function setUp(): void
    {
        $this->fakeRequestResponsePair = new RequestResponsePair(
            static::REQUEST_BODY,
            static::RESPONSE_BODY
        );
    }

    public function testGetResponseBody(): void
    {
        $this->assertEquals(static::RESPONSE_BODY, $this->fakeRequestResponsePair->getResponseBody());
    }

    public function testGetRequestBody(): void
    {
        $this->assertEquals(static::REQUEST_BODY, $this->fakeRequestResponsePair->getRequestBody());
    }
}
