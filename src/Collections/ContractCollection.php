<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\Elements;

/**
 * Class ContractCollection
 * @package Wearesho\Pvbki\Collections
 */
class ContractCollection extends BaseCollection
{
    public function type(): string
    {
        return Elements\Contract::class;
    }

    public function addRelation(ElementInterface $element): void
    {
        $isCollateral = $element instanceof Elements\Collateral;
        $isRecord = $element instanceof Elements\Record;

        /** @var Elements\Collateral $element */
        if (!$isCollateral && !$isRecord) {
            throw new \InvalidArgumentException(
                'Element must be instance of ' . Elements\Collateral::class . ' or ' . Elements\Record::class
            );
        }

        if (is_null($element->getContractId())) {
            throw new \InvalidArgumentException('Contract id not set');
        }

        $id = $element->getContractId();

        /** @var Elements\Contract $contract */
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
