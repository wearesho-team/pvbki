<?php

namespace Wearesho\Pvbki\Identifications;

/**
 * class SubjectIdentification
 * @package Wearesho\Pvbki\Identifications
 */
abstract class SubjectIdentification implements SubjectIdentificationInterface
{
    /**
     * @inheritdoc
     */
    public function jsonSerialize(): string
    {
        return $this->getId();
    }

    /**
     * @inheritdoc
     */
    abstract public function getId(): string;
}
