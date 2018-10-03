<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki\Statements\Interfaces;

/**
 * Interface ServiceInterface
 * @package Wearesho\Pvbki
 */
interface ServiceInterface
{
    public function import(Interfaces\CreditRequestInterface $statementRequest): Interfaces\CreditResponseInterface;
}
