<?php

declare(strict_types=1);

namespace Wearesho\Pvbki\Interrelations;

/**
 * Interface SubjectInterface
 * @package Wearesho\Pvbki\Interrelations
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
