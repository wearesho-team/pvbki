<?php

namespace Wearesho\Pvbki;

use Wearesho\Pvbki;

/**
 * Class StatementRequest
 * @package Wearesho\Pvbki
 */
class StatementRequest implements Pvbki\Interrelations\StatementRequestInterface
{
    use Pvbki\Infrastructure\StatementRequestTrait;

    public function __construct(Pvbki\Interrelations\SubjectInterface $identification, Pvbki\Enums\StatementType $type)
    {
        $this->identification = $identification;
        $this->type = $type;
    }
}
