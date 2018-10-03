<?php

namespace Wearesho\Pvbki\Statements\Interfaces;

use Wearesho\Pvbki\Identifications\SubjectIdentificationInterface;

/**
 * Interface CreditRequestInterface
 * @package Wearesho\Pvbki\Statements\Interfaces
 */
interface CreditRequestInterface extends StatementInterface
{
    /**
     * Unique identification id subject
     *
     * @return SubjectIdentificationInterface
     */
    public function getIdentification(): SubjectIdentificationInterface;
}
