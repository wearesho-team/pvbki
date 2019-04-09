<?php

namespace Wearesho\Pvbki;

use GuzzleHttp;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * Class Service
 * @package Wearesho\Pvbki
 */
class Service implements Interrelations\ServiceInterface
{
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
        $serviceAttributeValue = 'https://service.pvbki.com/reverse';
        $root = [
            'rootElementName' => 'soap12:Envelope',
            '_attributes' => [
                'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
                'xmlns:soap12' => 'http://www.w3.org/2003/05/soap-envelope',
            ]
        ];
        $params = [
            'soap12:Header' => [
                'AuthenticationCredential' => [
                    '_attributes' => [
                        'xmlns' => $serviceAttributeValue,
                    ],
                    'UserName' => $this->config->getUsername(),
                    'Password' => $this->config->getPassword(),
                ],
                'AuthenticationIdentity' => [
                    '_attributes' => [
                        'xmlns' => $serviceAttributeValue
                    ],
                    'Name' => $this->config->getAccessPoint(),
                    'Key' => $this->config->getKey(),
                ]
            ],
            'soap12:Body' => [
                $request->getType()->getValue() => [
                    '_attributes' => [
                        'xmlns' => $serviceAttributeValue
                    ],
                    'forID' => $request->getIdentification()->getId(),
                ]
            ]
        ];

        return ArrayToXml::convert($params, $root, true, 'UTF-8');
    }

    public function config(): Interrelations\ConfigInterface
    {
        return $this->config;
    }
}
