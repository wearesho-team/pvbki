<?php

declare(strict_types=1);

namespace Wearesho\Pvbki\Infrastructure;

/**
 * Class Subject
 * @package Wearesho\Pvbki\Infrastructure
 */
trait SubjectTrait
{
    /** @var string */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }
}
