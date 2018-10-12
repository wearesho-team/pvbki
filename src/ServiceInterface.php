<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki\Statements\Interfaces;

/**
 * Interface ServiceInterface
 * @package Wearesho\Pvbki
 * @todo: implement `export()` method
 */
interface ServiceInterface
{
    public function import(Interfaces\CreditRequestInterface $statementRequest): RequestResponsePair;
}
