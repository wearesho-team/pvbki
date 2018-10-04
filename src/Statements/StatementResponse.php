<?php

namespace Wearesho\Pvbki\Statements;

use Wearesho\Pvbki\Statements\Interfaces\CreditResponseInterface;

/**
 * Class CreditResponse
 * @package Wearesho\Pvbki\Statements
 */
class StatementResponse extends Statement implements CreditResponseInterface
{
    /** @var \DOMDocument */
    protected $body;

    public function __construct(\DOMDocument $body, StatementType $type)
    {
        $this->body = $body;

        parent::__construct($type);
    }

    public function getBody(): \DOMDocument
    {
        return $this->body;
    }
}
