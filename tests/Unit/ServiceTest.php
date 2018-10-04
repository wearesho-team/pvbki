<?php

namespace Wearesho\Pvbki\Tests\Unit;

use GuzzleHttp;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class ServiceTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass \Wearesho\Pvbki\Service
 * @internal
 */
class ServiceTest extends TestCase
{
    protected const VALID_OKPO_NUMBER = '12345678';

    /** @var Pvbki\Service */
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

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->fakeService = new Pvbki\Service(
            new Pvbki\Config('username', 'password', 'access-point', 'key'),
            new GuzzleHttp\Client(['handler' => $stack])
        );
    }

    public function testImport(): void
    {
        $expectStatementBody = '<?xml version="1.0" encoding="utf-8"?>
            <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                             xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
                             xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
              <soap12:Header>
                <AuthenticationCredential xmlns="https://service.pvbki.com/reverse">
                  <UserName>username</UserName>
                  <Password>password</Password>
                </AuthenticationCredential>
                <AuthenticationIdentity xmlns="https://service.pvbki.com/reverse">
                  <Name>access-point</Name>
                  <Key>key</Key>
                </AuthenticationIdentity>
              </soap12:Header>
              <soap12:Body>
                <Report-Statement xmlns="https://service.pvbki.com/reverse">
                  <forID>12345678</forID>
                </Report-Statement>
              </soap12:Body>
            </soap12:Envelope>';

        $expectStatementPlusBody = '<?xml version="1.0" encoding="utf-8"?>
            <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                             xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                             xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
              <soap12:Header>
                <AuthenticationCredential xmlns="https://service.pvbki.com/reverse">
                  <UserName>username</UserName>
                  <Password>password</Password>
                </AuthenticationCredential>
                <AuthenticationIdentity xmlns="https://service.pvbki.com/reverse">
                  <Name>access-point</Name>
                  <Key>key</Key>
                </AuthenticationIdentity>
              </soap12:Header>
              <soap12:Body>
                <Report-StatementPlus xmlns="https://service.pvbki.com/reverse">
                  <forID>12345678</forID>
                </Report-StatementPlus>
              </soap12:Body>
            </soap12:Envelope>';

        $this->mock->append(
            new GuzzleHttp\Psr7\Response(
                200,
                ['Content-type' => 'application/soap+xml; charset=utf-8',],
                file_get_contents(__DIR__ . '/../Mocks/StatementReport.xml')
            ),
            new GuzzleHttp\Psr7\Response(
                200,
                ['Content-type' => 'application/soap+xml; charset=utf-8',],
                file_get_contents(__DIR__ . '/../Mocks/StatementReportPlus.xml')
            )
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $identification = new Pvbki\Identifications\OkpoIdentification(static::VALID_OKPO_NUMBER);
        /** @noinspection PhpUnhandledExceptionInspection */
        $requestResponsePair = $this->fakeService->import(new Pvbki\Statements\CreditRequest(
            $identification,
            Pvbki\Statements\StatementType::BASE()
        ));
        $this->assertNotEmpty($requestResponsePair->getResponse()->getBody()->saveXML());
        $this->assertXmlStringEqualsXmlString(
            $expectStatementBody,
            $requestResponsePair->getRequest()->getBody()->__toString()
        );
        /** @noinspection PhpUnhandledExceptionInspection */
        $requestResponsePair = $this->fakeService->import(new Pvbki\Statements\CreditRequest(
            $identification,
            Pvbki\Statements\StatementType::SCORING()
        ));
        $this->assertNotEmpty($requestResponsePair->getResponse()->getBody()->saveXML());
        $this->assertXmlStringEqualsXmlString(
            $expectStatementPlusBody,
            $requestResponsePair->getRequest()->getBody()->__toString()
        );
    }
}
