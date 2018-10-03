<?php

namespace Wearesho\Pvbki;

use GuzzleHttp;
use Psr\Log;
use Wearesho\Pvbki\Statements\Interfaces\CreditRequestInterface;
use Wearesho\Pvbki\Statements\StatementType;

/**
 * Class Service
 * @package Wearesho\Pvbki
 */
class Service
{
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

    public function import(CreditRequestInterface $statementRequest): RequestResponsePair
    {
        switch ($statementRequest->getType()->getValue()) {
            case StatementType::BASE:
                break;
            case StatementType::EXTEND:
                break;
            case StatementType::SCORING:
                break;
        }
    }
}
