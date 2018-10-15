<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\CollateralCollection;
use Wearesho\Pvbki\Collections\ContractCollection;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Collections\RecordCollection;
use Wearesho\Pvbki\Elements\Collateral;
use Wearesho\Pvbki\Elements\Contract;
use Wearesho\Pvbki\Elements\Record;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class ContractCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass ContractCollection
 * @internal
 */
class ContractCollectionTest extends CollectionTestCase
{
    /** @var ContractCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new ContractCollection();
    }

    public function expectedType(): string
    {
        return Contract::class;
    }

    public function testAddRelation(): void
    {
        $this->collection->append(new Contract(
            1,
            'provider',
            'contract_id',
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            new CollateralCollection(),
            new RecordCollection()
        ));
        $this->collection->addRelation(new Record(
            'contract_id',
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
        ));
    }
}
