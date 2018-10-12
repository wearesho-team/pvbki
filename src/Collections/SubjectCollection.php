<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Subject;

/**
 * Class SubjectCollection
 * @package Wearesho\Pvbki\Collections
 */
class SubjectCollection extends BaseCollection
{
    public function type(): string
    {
        return Subject::class;
    }
}
