<?php

namespace Wearesho\Pvbki;

use GuzzleHttp;
use Wearesho\Pvbki\Statements\Interfaces\CreditResponseInterface;

/**
 * Class RequestResponsePair
 * @package Wearesho\Pvbki
 */
class RequestResponsePair
{
    /** @var GuzzleHttp\Psr7\Request */
    protected $request;

    /** @var CreditResponseInterface */
    protected $response;

    public function __construct(
        GuzzleHttp\Psr7\Request $request,
        CreditResponseInterface $response
    ) {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): GuzzleHttp\Psr7\Request
    {
        return $this->request;
    }

    public function getResponse(): CreditResponseInterface
    {
        return $this->response;
    }
}
