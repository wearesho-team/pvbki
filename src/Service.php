<?php

declare(strict_types=1);

namespace Wearesho\Pvbki;

use GuzzleHttp;

/**
 * Class Service
 * @package Wearesho\Pvbki
 */
class Service implements Interrelations\ServiceInterface
{
    protected const SOAP12 = 'soap12';
    protected const XMLNS = 'xmlns';

    /** @var Interrelations\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    public function __construct(Interrelations\ConfigInterface $config, GuzzleHttp\ClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * @param Interrelations\StatementRequestInterface $statementRequest
     *
     * @return RequestResponsePair
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function import(Interrelations\StatementRequestInterface $statementRequest): RequestResponsePair
    {
        $url = $this->config->getUrl();
        $body = $this->getBody($statementRequest);
        $guzzleRequest = new GuzzleHttp\Psr7\Request(
            'POST',
            $url,
            [
                'Content-Type' => 'application/soap+xml; charset=utf-8',
                'Content-Length' => strlen($body)
            ],
            $body
        );

        return new RequestResponsePair(
            $guzzleRequest->getBody()->__toString(),
            $this->client->send($guzzleRequest)->getBody()->__toString()
        );
    }

    protected function getBody(Interrelations\StatementRequestInterface $request): string
    {
        $type = $request->getType();
        $document = new \DOMDocument('1.0', 'UTF-8');
        $root = $document->createElement(static::SOAP12 . ':Envelope');
        $root->setAttribute(static::XMLNS . ':xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $root->setAttribute(static::XMLNS . ':xsd', 'http://www.w3.org/2001/XMLSchema');
        $root->setAttribute(static::XMLNS . ':' . static::SOAP12, 'http://www.w3.org/2003/05/soap-envelope');
        $serviceAttributeValue = 'https://service.pvbki.com/reverse';
        $header = $document->createElement(static::SOAP12 . ':Header');
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
        $body = $document->createElement(static::SOAP12 . ':Body');
        $report = $document->createElement($type->getValue());
        $report->setAttribute(static::XMLNS, $serviceAttributeValue);
        $report->appendChild($document->createElement('forID', $request->getIdentification()->getId()));
        $body->appendChild($report);
        $root->appendChild($header);
        $root->appendChild($body);
        $document->appendChild($root);
        return $document->saveXML();
    }

    public function config(): Interrelations\ConfigInterface
    {
        return $this->config;
    }
}
