<?php

namespace Wearesho\Pvbki\Identifications;

/**
 * Interface SubjectIdentificationInterface
 * @package Wearesho\Pvbki\Identifications
 */
interface SubjectIdentificationInterface extends \JsonSerializable
{
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function jsonSerialize(): string;

    /**
     * Must return well formatted subject id
     *
     * @return string
     */
    public function getId(): string;
}
