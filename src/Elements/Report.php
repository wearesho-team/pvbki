<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Colelctions\SubjectCollection;

/**
 * Class Report
 * @package Wearesho\Pvbki\Elements
 */
class Report implements \JsonSerializable
{
    /** @var SubjectCollection|null */
    protected $subjects;

    /** @var Scoring|null */
    protected $scoring;

    public function __construct(
        SubjectCollection $subjects = null,
        Scoring $scoring = null
    ) {
        $this->subjects = $subjects;
        $this->scoring = $scoring;
    }

    public function jsonSerialize(): array
    {
        return [
            'subjects' => $this->subjects->jsonSerialize(),
            'scoring' => $this->scoring->jsonSerialize(),
        ];
    }

    public function getSubjects(): ?SubjectCollection
    {
        return $this->subjects;
    }

    public function getScoring(): ?Scoring
    {
        return $this->scoring;
    }
}
