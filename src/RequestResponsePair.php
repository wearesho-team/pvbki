<?php

namespace Wearesho\Pvbki;

/**
 * Class RequestResponsePair
 * @package Wearesho\Pvbki
 */
class RequestResponsePair
{
    /** @var string */
    protected $requestBody;

    /** @var string */
    protected $responseBody;

    public function __construct(string $requestBody, string $responseBody)
    {
        $this->requestBody = $requestBody;
        $this->responseBody = $responseBody;
    }

    public function getRequestBody(): string
    {
        return $this->requestBody;
    }

    public function getResponseBody(): string
    {
        return $this->responseBody;
    }
}
