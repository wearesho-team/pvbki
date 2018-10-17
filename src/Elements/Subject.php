<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Subject
 * @package Wearesho\Pvbki\Elements
 */
class Subject extends Element
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
    public const ABBREVIATION_NAME_UA = 'abbreviationUA';
    public const ABBREVIATION_NAME_RU = 'abbreviationRU';
    public const ABBREVIATION_NAME_EN = 'abbreviationEN';
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

    /** @var string|null */
    protected $surnameUa;

    /** @var string|null */
    protected $surnameRu;

    /** @var string|null */
    protected $surnameEn;

    /** @var string|null */
    protected $nameUa;

    /** @var string|null */
    protected $nameRu;

    /** @var string|null */
    protected $nameEn;

    /** @var string|null */
    protected $patronymicUa;

    /** @var string|null */
    protected $patronymicRu;

    /** @var string|null */
    protected $patronymicEn;

    /** @var string|null */
    protected $birthSurnameUa;

    /** @var string|null */
    protected $birthSurnameRu;

    /** @var string|null */
    protected $birthSurnameEn;

    /** @var int|null */
    protected $classification;

    /** @var \DateTimeInterface|null */
    protected $birthDate;

    /** @var string|null */
    protected $birthPlaceUa;

    /** @var string|null */
    protected $birthPlaceRu;

    /** @var string|null */
    protected $birthPlaceEn;

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

    /** @var string|null */
    protected $fullNameUa;

    /** @var string|null */
    protected $fullNameRu;

    /** @var string|null */
    protected $fullNameEn;

    /** @var string|null */
    protected $abbreviationUa;

    /** @var string|null */
    protected $abbreviationRu;

    /** @var string|null */
    protected $abbreviationEn;

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
        ?string $surnameUa,
        ?string $surnameRu,
        ?string $surnameEn,
        ?string $nameUa,
        ?string $nameRu,
        ?string $nameEn,
        ?string $patronymicUa,
        ?string $patronymicRu,
        ?string $patronymicEn,
        ?string $birthSurnameUa,
        ?string $birthSurnameRu,
        ?string $birthSurnameEn,
        ?int $classification,
        ?\DateTimeInterface $birthDate,
        ?string $birthPlaceUa,
        ?string $birthPlaceRu,
        ?string $birthPlaceEn,
        ?int $residency,
        ?int $citizenShip,
        ?int $negativeStatus,
        ?int $education,
        ?int $maritalStatus,
        ?int $statusId,
        ?string $fullNameUa,
        ?string $fullNameRu,
        ?string $fullNameEn,
        ?string $abbreviationUa,
        ?string $abbreviationRu,
        ?string $abbreviationEn,
        ?int $ownership,
        ?\DateTimeInterface $registrationDate,
        ?int $economicActivity,
        ?int $employeeCount
    ) {
        $this->requestId = $requestId;
        $this->lastUpdate = $lastUpdate;
        $this->entity = $entity;
        $this->gender = $gender;
        $this->surnameUa = $surnameUa;
        $this->surnameRu = $surnameRu;
        $this->surnameEn = $surnameEn;
        $this->nameUa = $nameUa;
        $this->nameRu = $nameRu;
        $this->nameEn = $nameEn;
        $this->patronymicUa = $patronymicUa;
        $this->patronymicRu = $patronymicRu;
        $this->patronymicEn = $patronymicEn;
        $this->birthSurnameUa = $birthSurnameUa;
        $this->birthSurnameRu = $birthSurnameRu;
        $this->birthSurnameEn = $birthSurnameEn;
        $this->classification = $classification;
        $this->birthDate = $birthDate;
        $this->birthPlaceUa = $birthPlaceUa;
        $this->birthPlaceRu = $birthPlaceRu;
        $this->birthPlaceEn = $birthPlaceEn;
        $this->residency = $residency;
        $this->citizenShip = $citizenShip;
        $this->negativeStatus = $negativeStatus;
        $this->education = $education;
        $this->maritalStatus = $maritalStatus;
        $this->statusId = $statusId;
        $this->fullNameUa = $fullNameUa;
        $this->fullNameRu = $fullNameRu;
        $this->fullNameEn = $fullNameEn;
        $this->abbreviationUa = $abbreviationUa;
        $this->abbreviationRu = $abbreviationRu;
        $this->abbreviationEn = $abbreviationEn;
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

    public function getSurnameUa(): ?string
    {
        return $this->surnameUa;
    }

    public function getSurnameRu(): ?string
    {
        return $this->surnameRu;
    }

    public function getSurnameEn(): ?string
    {
        return $this->surnameEn;
    }

    public function getNameUa(): ?string
    {
        return $this->nameUa;
    }

    public function getNameRu(): ?string
    {
        return $this->nameRu;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function getPatronymicUa(): ?string
    {
        return $this->patronymicUa;
    }

    public function getPatronymicRu(): ?string
    {
        return $this->patronymicRu;
    }

    public function getPatronymicEn(): ?string
    {
        return $this->patronymicEn;
    }

    public function getBirthSurnameUa(): ?string
    {
        return $this->birthSurnameUa;
    }

    public function getBirthSurnameRu(): ?string
    {
        return $this->birthSurnameRu;
    }

    public function getBirthSurnameEn(): ?string
    {
        return $this->birthSurnameEn;
    }

    public function getClassification(): ?int
    {
        return $this->classification;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getBirthPlaceUa(): ?string
    {
        return $this->birthPlaceUa;
    }

    public function getBirthPlaceRu(): ?string
    {
        return $this->birthPlaceRu;
    }

    public function getBirthPlaceEn(): ?string
    {
        return $this->birthPlaceEn;
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

    public function getFullNameUa(): ?string
    {
        return $this->fullNameUa;
    }

    public function getFullNameRu(): ?string
    {
        return $this->fullNameRu;
    }

    public function getFullNameEn(): ?string
    {
        return $this->fullNameEn;
    }

    public function getAbbreviationUa(): ?string
    {
        return $this->abbreviationUa;
    }

    public function getAbbreviationRu(): ?string
    {
        return $this->abbreviationRu;
    }

    public function getAbbreviationEn(): ?string
    {
        return $this->abbreviationEn;
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
