<?php

namespace Wearesho\Pvbki;

/**
 * Class RequestResponsePair
 * @package Wearesho\Pvbki
 */
class RequestResponsePair
{
    /** @var string */
    protected $request;

    /** @var string */
    protected $response;

    public function __construct(string $request, string $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): string
    {
        return $this->request;
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
