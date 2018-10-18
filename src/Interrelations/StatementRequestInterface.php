<?php

namespace Wearesho\Pvbki\Interrelations;

use Wearesho\Pvbki\Enums\StatementType;

/**
 * Interface StatementRequestInterface
 * @package Wearesho\Pvbki\Interrelations
 */
interface StatementRequestInterface
{
    /**
     * Unique identification subject id
     *
     * @return SubjectInterface
     */
    public function getIdentification(): SubjectInterface;

    /**
     * Type of need statement report
     *
     * @return StatementType
     */
    public function getType(): StatementType;
}
