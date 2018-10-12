<?php

namespace Wearesho\Pvbki\Statements\Interfaces;

use Wearesho\Pvbki\Statements\StatementType;

/**
 * Interface StatementInterface
 * @package Wearesho\Pvbki\Statements\Interfaces
 */
interface StatementInterface
{
    public function getType(): StatementType;
}
