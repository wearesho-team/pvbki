<?php

namespace Wearesho\Pvbki\Tests\Unit;

use GuzzleHttp;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Config;
use Wearesho\Pvbki\Identifications\OkpoIdentification;
use Wearesho\Pvbki\Service;
use Wearesho\Pvbki\Statements;

/**
 * Class ServiceTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass Service
 * @internal
 */
class ServiceTest extends TestCase
{
    protected const VALID_OKPO_NUMBER = '12345678';

    /** @var Service */
    protected $fakeService;

    /** @var GuzzleHttp\Handler\MockHandler */
    protected $mock;

    /** @var array */
    protected $container;

    protected function setUp(): void
    {
        $this->mock = new GuzzleHttp\Handler\MockHandler();
        $this->container = [];
        $stack = GuzzleHttp\HandlerStack::create($this->mock);
        $stack->push(GuzzleHttp\Middleware::history($this->container));

        $this->fakeService = new Service(
            new Config('username', 'password', 'access-point', 'key'),
            new GuzzleHttp\Client(['handler' => $stack])
        );
    }

    public function testSuccessImport(): void
    {
        $this->mock->append(
            new GuzzleHttp\Psr7\Response(
                200,
                ['Content-type' => 'application/soap+xml; charset=utf-8',],
                file_get_contents(__DIR__ . '/../Mocks/FullSuccessResponse.xml')
            )
        );

        $requestResponsePair = $this->fakeService->import(new Statements\CreditRequest(
            new OkpoIdentification(static::VALID_OKPO_NUMBER),
            Statements\StatementType::BASE()
        ));
        $this->assertNotEmpty($requestResponsePair->getResponse()->getBody()->saveXML());
    }
}
