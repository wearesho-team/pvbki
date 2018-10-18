<?php

namespace Wearesho\Pvbki\Identifications;

/**
 * Interface SubjectInterface
 * @package Wearesho\Pvbki\Identifications
 */
interface SubjectInterface
{
    /**
     * Must return well formatted subject id
     *
     * @return string
     */
    public function getId(): string;
}
