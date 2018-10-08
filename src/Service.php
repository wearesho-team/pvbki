<?php

namespace Wearesho\Pvbki;

use GuzzleHttp;
use Psr\Log;
use Wearesho\Pvbki\Exceptions\SoapException;
use Wearesho\Pvbki\Statements;

/**
 * Class Service
 * @package Wearesho\Pvbki
 */
class Service implements ServiceInterface
{
    protected const SOAP = 'soap12';
    protected const XMLNS = 'xmlns';

    /** @var ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param Statements\Interfaces\CreditRequestInterface $statement
     *
     * @return RequestResponsePair
     * @throws GuzzleHttp\Exception\GuzzleException
     * @todo: add SoapFault validation
     */
    public function import(Statements\Interfaces\CreditRequestInterface $statement): RequestResponsePair
    {
        $body = $this->formBody($statement);
        $request = new GuzzleHttp\Psr7\Request(
            'POST',
            $this->config->getUrl(),
            [
                'Content-Type' => 'application/soap+xml; charset=utf-8',
                'Content-Length' => strlen($body)
            ],
            $body
        );

        $response = $this->client->send($request);

        $document = new \DOMDocument('1.0', 'UTF-8');
        $document->loadXML((string)$response->getBody());

        return new RequestResponsePair(
            $request,
            new Statements\StatementResponse($document, $statement->getType())
        );
    }

    protected function formBody(Statements\Interfaces\CreditRequestInterface $statement): string
    {
        $type = $statement->getType();
        $document = new \DOMDocument('1.0', 'UTF-8');

        $root = $document->createElement(static::SOAP . ':Envelope');
        $root->setAttribute(static::XMLNS . ':xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $root->setAttribute(static::XMLNS . ':xsd', 'http://www.w3.org/2001/XMLSchema');
        $root->setAttribute(static::XMLNS . ':' . static::SOAP, 'http://www.w3.org/2003/05/soap-envelope');
        $serviceAttributeValue = 'https://service.pvbki.com/reverse';
        $header = $document->createElement(static::SOAP . ':Header');
        $credential = $document->createElement('AuthenticationCredential');
        $credential->setAttribute(static::XMLNS, $serviceAttributeValue);
        $credential->appendChild($document->createElement('UserName', $this->config->getUsername()));
        $credential->appendChild($document->createElement('Password', $this->config->getPassword()));
        $identity = $document->createElement('AuthenticationIdentity');
        $identity->setAttribute(static::XMLNS, $serviceAttributeValue);
        $identity->appendChild($document->createElement('Name', $this->config->getAccessPoint()));
        $identity->appendChild($document->createElement('Key', $this->config->getKey()));
        $header->appendChild($credential);
        $header->appendChild($identity);
        $body = $document->createElement(static::SOAP . ':Body');
        $report = $document->createElement($type->getValue());
        $report->setAttribute(static::XMLNS, $serviceAttributeValue);
        $report->appendChild($document->createElement('forID', $statement->getIdentification()->getId()));
        $body->appendChild($report);
        $root->appendChild($header);
        $root->appendChild($body);
        $document->appendChild($root);

        return $document->saveXML();
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }
}
