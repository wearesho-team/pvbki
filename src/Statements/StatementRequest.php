<?php

namespace Wearesho\Pvbki\Statements;

use Wearesho\Pvbki\Identifications\SubjectIdentificationInterface;

/**
 * Class CreditRequest
 * @package Wearesho\Pvbki\Statements
 */
class StatementRequest extends Statement implements Interfaces\CreditRequestInterface
{
    /** @var SubjectIdentificationInterface */
    protected $identification;

    public function __construct(SubjectIdentificationInterface $identification, StatementType $type)
    {
        $this->identification = $identification;

        parent::__construct($type);
    }

    public function getIdentification(): SubjectIdentificationInterface
    {
        return $this->identification;
    }
}
