<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Collections;

/**
 * Class Report
 * @package Wearesho\Pvbki\Elements
 */
class Report implements \JsonSerializable
{
    /** @var Collections\ErrorCollection|null */
    protected $errors;

    /** @var Collections\SubjectCollection|null */
    protected $subjects;

    /** @var Collections\IdentificationCollection|null */
    protected $identifications;

    /** @var Collections\CommunicationCollection */
    protected $communications;

    /** @var Collections\AddressCollection */
    protected $addresses;

    /** @var Collections\DependantCollection */
    protected $dependants;

    /** @var Scoring|null */
    protected $scoring;

    public function __construct(
        Collections\ErrorCollection $errors = null,
        Collections\SubjectCollection $subjects = null,
        Collections\IdentificationCollection $identifications = null,
        Collections\CommunicationCollection $communications = null,
        Collections\AddressCollection $addresses = null,
        Collections\DependantCollection $dependants = null,
        Scoring $scoring = null
    ) {
        $this->errors = $errors;
        $this->subjects = $subjects;
        $this->identifications = $identifications;
        $this->communications = $communications;
        $this->addresses = $addresses;
        $this->dependants = $dependants;
        $this->scoring = $scoring;
    }

    public function jsonSerialize(): array
    {
        if (!empty($this->errors)) {
            return [
                'errors' => $this->errors->jsonSerialize(),
            ];
        }

        return [
            'subjects' => $this->subjects,
            'identifications' => $this->identifications,
            'communications' => $this->communications,
            'addresses' => $this->addresses,
            'dependants' => $this->dependants,
            'scoring' => $this->scoring,
        ];
    }

    public function getErrors(): ?Collections\ErrorCollection
    {
        return $this->errors;
    }

    public function getSubjects(): ?Collections\SubjectCollection
    {
        return $this->subjects;
    }

    public function getIdentifications(): ?Collections\IdentificationCollection
    {
        return $this->identifications;
    }

    public function getCommunications(): Collections\CommunicationCollection
    {
        return $this->communications;
    }

    public function getAddresses(): Collections\AddressCollection
    {
        return $this->addresses;
    }

    public function getDependants(): Collections\DependantCollection
    {
        return $this->dependants;
    }

    public function getScoring(): ?Scoring
    {
        return $this->scoring;
    }
}
