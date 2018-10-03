<?php

namespace Wearesho\Pvbki\Statements\Interfaces;

/**
 * Interface CreditResponseInterface
 * @package Wearesho\Pvbki\Statements\Interfaces
 */
interface CreditResponseInterface extends StatementInterface
{
    public function getBody(): string;
}
