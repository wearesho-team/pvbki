<?php

namespace Wearesho\Pvbki\Colelctions;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Subject;

/**
 * Class SubjectCollection
 * @package Wearesho\Pvbki\Colelctions
 */
class SubjectCollection extends BaseCollection
{
    public function type(): string
    {
        return Subject::class;
    }
}
