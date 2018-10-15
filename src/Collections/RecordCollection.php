<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Record;

/**
 * Class RecordCollection
 * @package Wearesho\Pvbki\Collections
 */
class RecordCollection extends BaseCollection
{
    public function type(): string
    {
        return Record::class;
    }
}
