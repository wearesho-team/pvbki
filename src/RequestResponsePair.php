<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki\Statements\Interfaces;

/**
 * Class RequestResponsePair
 * @package Wearesho\Pvbki
 */
class RequestResponsePair
{
    /** @var Interfaces\CreditRequestInterface */
    protected $request;

    /** @var Interfaces\CreditResponseInterface */
    protected $response;

    /**
     * RequestResponsePair constructor.
     *
     * @param Interfaces\CreditRequestInterface  $request
     * @param Interfaces\CreditResponseInterface $response
     */
    public function __construct(
        Interfaces\CreditRequestInterface $request,
        Interfaces\CreditResponseInterface $response
    ) {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): Interfaces\CreditRequestInterface
    {
        return $this->request;
    }

    public function getResponse(): Interfaces\CreditResponseInterface
    {
        return $this->response;
    }
}
