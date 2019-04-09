<?php

declare(strict_types=1);

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Records
 * @package Wearesho\Pvbki\Collections
 */
class Records extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Record::class;
    }
}
