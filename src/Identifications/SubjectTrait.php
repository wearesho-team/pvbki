<?php

namespace Wearesho\Pvbki\Identifications;

/**
 * Class Subject
 * @package Wearesho\Pvbki\Identifications
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
