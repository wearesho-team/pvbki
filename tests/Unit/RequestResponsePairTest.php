<?php

namespace Wearesho\Pvbki\Tests\Unit;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Identifications\DrfoIdentification;
use Wearesho\Pvbki\RequestResponsePair;
use Wearesho\Pvbki\Statements;

/**
 * Class RequestResponsePairTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass RequestResponsePair
 * @internal
 */
class RequestResponsePairTest extends TestCase
{
    protected const VALID_DRFO_NUMBER = '1234567890';
    protected const BODY = 'body';

    /** @var RequestResponsePair */
    protected $fakeRequestResponsePair;

    protected function setUp(): void
    {
        $this->fakeRequestResponsePair = new RequestResponsePair(
            new Request('POST', 'www.google.com'),
            new Statements\CreditResponse(new \DOMDocument('1.0', 'utf-8'), Statements\StatementType::BASE())
        );
    }

    public function testGetRequest(): void
    {
        $this->assertEquals(
            new Request('POST', 'www.google.com'),
            $this->fakeRequestResponsePair->getRequest()
        );
    }

    public function testGetResponse(): void
    {
        $this->assertEquals(
            new Statements\CreditResponse(new \DOMDocument('1.0', 'utf-8'), Statements\StatementType::BASE()),
            $this->fakeRequestResponsePair->getResponse()
        );
    }
}
