<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki\Enums\StatementType;
use Wearesho\Pvbki\Interrelations\SubjectInterface;

/**
 * Trait StatementRequestTrait
 * @package Wearesho\Pvbki\Infrastructure
 */
trait StatementRequestTrait
{
    /** @var SubjectInterface */
    protected $identification;

    /** @var StatementType */
    protected $type;

    public function getIdentification(): SubjectInterface
    {
        return $this->identification;
    }

    public function getType(): StatementType
    {
        return $this->type;
    }
}
