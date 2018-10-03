<?php

namespace Wearesho\Pvbki\Statements;

use Wearesho\Pvbki\Statements\Interfaces\StatementInterface;

/**
 * Class Statement
 * @package Wearesho\Pvbki\Statements
 */
abstract class Statement implements StatementInterface
{
    /** @var StatementType */
    protected $type;

    public function __construct(StatementType $type)
    {
        $this->type = $type;
    }

    public function getType(): StatementType
    {
        return $this->type;
    }
}
