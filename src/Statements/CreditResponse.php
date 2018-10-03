<?php

namespace Wearesho\Pvbki\Statements;

use Wearesho\Pvbki\Statements\Interfaces\CreditResponseInterface;

/**
 * Class CreditResponse
 * @package Wearesho\Pvbki\Statements
 */
class CreditResponse extends Statement implements CreditResponseInterface
{
    /** @var string */
    protected $body;

    public function __construct(string $body, StatementType $type)
    {
        $this->body = $body;

        parent::__construct($type);
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
