<?php

namespace Wearesho\Pvbki\Statements;

use Wearesho\Pvbki\Statements\Interfaces\StatementInterface;

/**
 * Class Statement
 * @package Wearesho\Pvbki\Statements
 */
abstract class Statement implements StatementInterface
{
    public const HEADER = 'soap12:Header';
    public const ERROR = 'BackError';
    public const ROOT = 'Statement';
    public const SUBJECT = 'Subject';

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
