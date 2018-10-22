<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Subject
 * @package Wearesho\Pvbki\Elements
 */
class Subject extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Subject';
    public const REQUEST_ID = 'requestid';
    public const LAST_UPDATE = 'lastUpdate';
    public const ENTITY = 'entity';
    public const GENDER = 'gender';
    public const SURNAME_UA = 'surnameUA';
    public const SURNAME_RU = 'surnameRU';
    public const SURNAME_EN = 'surnameEN';
    public const NAME_UA = 'firstNameUA';
    public const NAME_RU = 'firstNameRU';
    public const NAME_EN = 'firstNameEN';
    public const PATRONYMIC_UA = 'fathersNameUA';
    public const PATRONYMIC_RU = 'fathersNameRU';
    public const PATRONYMIC_EN = 'fathersNameEN';
    public const CLASSIFICATION = 'classification';
    public const BIRTH_SURNAME_UA = 'birthSurnameUA';
    public const BIRTH_SURNAME_RU = 'birthSurnameRU';
    public const BIRTH_SURNAME_EN = 'birthSurnameEN';
    public const BIRTH_DATE = 'dateOfBirth';
    public const BIRTH_PLACE_UA = 'placeOfBirthUA';
    public const BIRTH_PLACE_RU = 'placeOfBirthRU';
    public const BIRTH_PLACE_EN = 'placeOfBirthEN';
    public const RESIDENCY = 'residency';
    public const CITIZENSHIP = 'citizenship';
    public const NEGATIVE_STATUS = 'negativeStatus';
    public const EDUCATION = 'education';
    public const MARITAL_STATUS = 'maritalStatus';
    public const STATUS_ID = 'statusId';
    public const FULL_NAME_UA = 'nameUA';
    public const FULL_NAME_RU = 'nameRU';
    public const FULL_NAME_EN = 'nameEN';
    public const ABBREVIATION_UA = 'abbreviationUA';
    public const ABBREVIATION_RU = 'abbreviationRU';
    public const ABBREVIATION_EN = 'abbreviationEN';
    public const OWNERSHIP = 'ownership';
    public const REGISTRATION_DATE = 'registrationDate';
    public const ECONOMIC_ACTIVITY = 'economicActivity';
    public const EMPLOYEE_COUNT = 'employeeCount';

    /** @var string|null */
    protected $requestId;

    /** @var \DateTimeInterface|null */
    protected $lastUpdate;

    /** @var string|null */
    protected $entity;

    /** @var int|null */
    protected $gender;

    /** @var Pvbki\Sentence\Translation|null */
    protected $surname;

    /** @var Pvbki\Sentence\Translation|null */
    protected $name;

    /** @var Pvbki\Sentence\Translation|null */
    protected $patronymic;

    /** @var Pvbki\Sentence\Translation|null */
    protected $birthSurname;

    /** @var int|null */
    protected $classification;

    /** @var \DateTimeInterface|null */
    protected $birthDate;

    /** @var Pvbki\Sentence\Translation|null */
    protected $birthPlace;

    /** @var int|null */
    protected $residency;

    /** @var int|null */
    protected $citizenShip;

    /** @var int|null */
    protected $negativeStatus;

    /** @var int|null */
    protected $education;

    /** @var int|null */
    protected $maritalStatus;

    /** @var int|null */
    protected $statusId;

    /** @var Pvbki\Sentence\Translation|null */
    protected $fullName;

    /** @var Pvbki\Sentence\Translation|null */
    protected $abbreviation;

    /** @var int|null */
    protected $ownership;

    /** @var \DateTimeInterface|null */
    protected $registrationDate;

    /** @var int|null */
    protected $economicActivity;

    /** @var int|null */
    protected $employeeCount;

    public function __construct(
        ?string $requestId,
        ?\DateTimeInterface $lastUpdate,
        ?string $entity,
        ?int $gender,
        ?Pvbki\Sentence\Translation $surname,
        ?Pvbki\Sentence\Translation $name,
        ?Pvbki\Sentence\Translation $patronymic,
        ?Pvbki\Sentence\Translation $birthSurname,
        ?int $classification,
        ?\DateTimeInterface $birthDate,
        ?Pvbki\Sentence\Translation $birthPlace,
        ?int $residency,
        ?int $citizenShip,
        ?int $negativeStatus,
        ?int $education,
        ?int $maritalStatus,
        ?int $statusId,
        ?Pvbki\Sentence\Translation $fullName,
        ?Pvbki\Sentence\Translation $abbreviation,
        ?int $ownership,
        ?\DateTimeInterface $registrationDate,
        ?int $economicActivity,
        ?int $employeeCount
    ) {
        $this->requestId = $requestId;
        $this->lastUpdate = $lastUpdate;
        $this->entity = $entity;
        $this->gender = $gender;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->birthSurname = $birthSurname;
        $this->classification = $classification;
        $this->birthDate = $birthDate;
        $this->birthPlace = $birthPlace;
        $this->residency = $residency;
        $this->citizenShip = $citizenShip;
        $this->negativeStatus = $negativeStatus;
        $this->education = $education;
        $this->maritalStatus = $maritalStatus;
        $this->statusId = $statusId;
        $this->fullName = $fullName;
        $this->abbreviation = $abbreviation;
        $this->ownership = $ownership;
        $this->registrationDate = $registrationDate;
        $this->economicActivity = $economicActivity;
        $this->employeeCount = $employeeCount;
    }

    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function getEntity(): ?string
    {
        return $this->entity;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function getSurname(): ?Pvbki\Sentence\Translation
    {
        return $this->surname;
    }

    public function getName(): ?Pvbki\Sentence\Translation
    {
        return $this->name;
    }

    public function getPatronymic(): ?Pvbki\Sentence\Translation
    {
        return $this->patronymic;
    }

    public function getBirthSurname(): ?Pvbki\Sentence\Translation
    {
        return $this->birthSurname;
    }

    public function getClassification(): ?int
    {
        return $this->classification;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getBirthPlace(): ?Pvbki\Sentence\Translation
    {
        return $this->birthPlace;
    }

    public function getResidency(): ?int
    {
        return $this->residency;
    }

    public function getCitizenShip(): ?int
    {
        return $this->citizenShip;
    }

    public function getNegativeStatus(): ?int
    {
        return $this->negativeStatus;
    }

    public function getEducation(): ?int
    {
        return $this->education;
    }

    public function getMaritalStatus(): ?int
    {
        return $this->maritalStatus;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function getFullName(): ?Pvbki\Sentence\Translation
    {
        return $this->fullName;
    }

    public function getAbbreviation(): ?Pvbki\Sentence\Translation
    {
        return $this->abbreviation;
    }

    public function getOwnership(): ?int
    {
        return $this->ownership;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function getEconomicActivity(): ?int
    {
        return $this->economicActivity;
    }

    public function getEmployeeCount(): ?int
    {
        return $this->employeeCount;
    }
}
