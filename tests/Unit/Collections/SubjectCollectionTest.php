<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\SubjectCollection;
use Wearesho\Pvbki\Elements\Subject;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class SubjectCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass SubjectCollection
 * @internal
 */
class SubjectCollectionTest extends CollectionTestCase
{
    /** @var SubjectCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new SubjectCollection();
    }

    public function expectedType(): string
    {
        return Subject::class;
    }
}
