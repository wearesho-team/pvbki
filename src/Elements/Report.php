<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Colelctions\ErrorCollection;
use Wearesho\Pvbki\Colelctions\SubjectCollection;

/**
 * Class Report
 * @package Wearesho\Pvbki\Elements
 */
class Report implements \JsonSerializable
{
    /** @var ErrorCollection|null */
    protected $errors;

    /** @var SubjectCollection|null */
    protected $subjects;

    /** @var Scoring|null */
    protected $scoring;

    public function __construct(
        ErrorCollection $errors = null,
        SubjectCollection $subjects = null,
        Scoring $scoring = null
    ) {
        $this->subjects = $subjects;
        $this->scoring = $scoring;
    }

    public function jsonSerialize(): array
    {
        if (!empty($this->errors)) {
            return [
                'errors' => [$this->errors->jsonSerialize(),],
            ];
        }

        return [
            'subjects' => $this->subjects->jsonSerialize(),
            'scoring' => $this->scoring->jsonSerialize(),
        ];
    }

    public function getErrors(): ?ErrorCollection
    {
        return $this->errors;
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
