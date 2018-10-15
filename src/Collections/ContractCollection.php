<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\Elements\Collateral;
use Wearesho\Pvbki\Elements\Contract;
use Wearesho\Pvbki\Elements\Record;

/**
 * Class ContractCollection
 * @package Wearesho\Pvbki\Collections
 */
class ContractCollection extends BaseCollection
{
    public function type(): string
    {
        return Contract::class;
    }

    public function addRelation(ElementInterface $element): void
    {
        $isCollateral = $element instanceof Collateral;
        $isRecord = $element instanceof Record;

        /** @var Collateral $element */
        if (!$isCollateral && !$isRecord) {
            throw new \InvalidArgumentException(
                'Element must be instance of ' . Collateral::class . ' or ' . Record::class
            );
        }

        if (!$element->getContractId()) {
            throw new \InvalidArgumentException('Contract id not set');
        }

        $id = $element->getContractId();

        /** @var Contract $contract */
        foreach ($this as $contract) {
            if ($contract->getContractId() === $id) {
                if ($isCollateral) {
                    $contract->getCollaterals()->append($element);
                } elseif ($isRecord) {
                    $contract->getRecords()->append($element);
                }
            }
        }
    }
}
