<?php

namespace Wearesho\Pvbki\Interrelations;

use Wearesho\Pvbki\RequestResponsePair;

/**
 * Interface ServiceInterface
 * @package Wearesho\Pvbki\Interrelations
 */
interface ServiceInterface
{
    public function import(StatementRequestInterface $request): RequestResponsePair;
}
