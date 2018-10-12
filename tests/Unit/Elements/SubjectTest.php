<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Subject;
use Wearesho\Pvbki\ParameterType;

/**
 * Class SubjectTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Subject
 * @internal
 */
class SubjectTest extends TestCase
{
    protected const REQUEST_ID = '1234567890';
    protected const LAST_UPDATE = '2018-03-12 00:00:00';
    protected const ENTITY = 'entity';
    protected const GENDER = 1;
    protected const SURNAME_UA = 'surname_ua';
    protected const SURNAME_RU = 'surname_ru';
    protected const SURNAME_EN = 'surname_en';
    protected const NAME_UA = 'name_ua';
    protected const NAME_RU = 'name_ru';
    protected const NAME_EN = 'name_en';
    protected const PATRONYMIC_UA = 'patronymic_ua';
    protected const PATRONYMIC_RU = 'patronymic_ru';
    protected const PATRONYMIC_EN = 'patronymic_en';
    protected const BIRTH_SURNAME_UA = 'birth_surname_ua';
    protected const BIRTH_SURNAME_RU = 'birth_surname_ru';
    protected const BIRTH_SURNAME_EN = 'birth_surname_en';
    protected const CLASSIFICATION = 2;
    protected const BIRTH_DATE = '2018-03-10 00:00:00';
    protected const BIRTH_PLACE_UA = 'birth_place_ua';
    protected const BIRTH_PLACE_RU = 'birth_place_ru';
    protected const BIRTH_PLACE_EN = 'birth_place_en';
    protected const RESIDENCY = 1;
    protected const CITIZEN_SHIP = 3;
    protected const NEGATIVE_STATUS = 2;
    protected const EDUCATION = 1;
    protected const MARITAL_STATUS = 2;
    protected const STATUS_ID = 1;
    protected const FULL_NAME_UA = 'full_name_ua';
    protected const FULL_NAME_RU = 'full_name_ru';
    protected const FULL_NAME_EN = 'full_name_en';
    protected const ABBREVIATION_UA = 'abbreviation_ua';
    protected const ABBREVIATION_RU = 'abbreviation_ru';
    protected const ABBREVIATION_EN = 'abbreviation_en';
    protected const OWNERSHIP = 2;
    protected const REGISTRATION_DATE = '2017-02-20 00:00:00';
    protected const ECONOMIC_ACTIVITY = 3;
    protected const EMPLOYEE_COUNT = 5;

    /** @var Subject */
    protected $fakeSubject;

    protected function setUp(): void
    {
        $this->fakeSubject = new Subject(
            static::REQUEST_ID,
            Carbon::parse(static::LAST_UPDATE),
            static::ENTITY,
            static::GENDER,
            static::SURNAME_UA,
            static::SURNAME_RU,
            static::SURNAME_EN,
            static::NAME_UA,
            static::NAME_RU,
            static::NAME_EN,
            static::PATRONYMIC_UA,
            static::PATRONYMIC_RU,
            static::PATRONYMIC_EN,
            static::BIRTH_SURNAME_UA,
            static::BIRTH_SURNAME_RU,
            static::BIRTH_SURNAME_EN,
            static::CLASSIFICATION,
            Carbon::make(static::BIRTH_DATE),
            static::BIRTH_PLACE_UA,
            static::BIRTH_PLACE_RU,
            static::BIRTH_PLACE_EN,
            static::RESIDENCY,
            static::CITIZEN_SHIP,
            static::NEGATIVE_STATUS,
            static::EDUCATION,
            static::MARITAL_STATUS,
            static::STATUS_ID,
            static::FULL_NAME_UA,
            static::FULL_NAME_RU,
            static::FULL_NAME_EN,
            static::ABBREVIATION_UA,
            static::ABBREVIATION_RU,
            static::ABBREVIATION_EN,
            static::OWNERSHIP,
            Carbon::make(static::REGISTRATION_DATE),
            static::ECONOMIC_ACTIVITY,
            static::EMPLOYEE_COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'id' => static::REQUEST_ID,
                'lastUpdate' => static::LAST_UPDATE,
                'entity' => static::ENTITY,
                'gender' => static::GENDER,
                'surname' => [
                    'ua' => static::SURNAME_UA,
                    'ru' => static::SURNAME_RU,
                    'en' => static::SURNAME_EN,
                ],
                'name' => [
                    'ua' => static::NAME_UA,
                    'ru' => static::NAME_RU,
                    'en' => static::NAME_EN,
                ],
                'patronymic' => [
                    'ua' => static::PATRONYMIC_UA,
                    'ru' => static::PATRONYMIC_RU,
                    'en' => static::PATRONYMIC_EN,
                ],
                'classification' => static::CLASSIFICATION,
                'birthSurname' => [
                    'ua' => static::BIRTH_SURNAME_UA,
                    'ru' => static::BIRTH_SURNAME_RU,
                    'en' => static::BIRTH_SURNAME_EN,
                ],
                'birthDate' => static::BIRTH_DATE,
                'birthPlace' => [
                    'ua' => static::BIRTH_PLACE_UA,
                    'ru' => static::BIRTH_PLACE_RU,
                    'en' => static::BIRTH_PLACE_EN,
                ],
                'residency' => static::RESIDENCY,
                'citizenShip' => static::CITIZEN_SHIP,
                'negativeStatus' => static::NEGATIVE_STATUS,
                'education' => static::EDUCATION,
                'maritalStatus' => static::MARITAL_STATUS,
                'statusId' => static::STATUS_ID,
                'fullName' => [
                    'ua' => static::FULL_NAME_UA,
                    'ru' => static::FULL_NAME_RU,
                    'en' => static::FULL_NAME_EN,
                ],
                'abbreviationName' => [
                    'ua' => static::ABBREVIATION_UA,
                    'ru' => static::ABBREVIATION_RU,
                    'en' => static::ABBREVIATION_EN,
                ],
                'ownership' => static::OWNERSHIP,
                'registrationDate' => static::REGISTRATION_DATE,
                'economicActivity' => static::ECONOMIC_ACTIVITY,
                'employeeCount' => static::EMPLOYEE_COUNT,
            ],
            $this->fakeSubject->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Subject::REQUEST_ID => ParameterType::STRING,
                Subject::LAST_UPDATE => ParameterType::DATE,
                Subject::ENTITY => ParameterType::STRING,
                Subject::GENDER => ParameterType::INTEGER,
                Subject::SURNAME_UA => ParameterType::STRING,
                Subject::SURNAME_RU => ParameterType::STRING,
                Subject::SURNAME_EN => ParameterType::STRING,
                Subject::NAME_UA => ParameterType::STRING,
                Subject::NAME_RU => ParameterType::STRING,
                Subject::NAME_EN => ParameterType::STRING,
                Subject::PATRONYMIC_UA => ParameterType::STRING,
                Subject::PATRONYMIC_RU => ParameterType::STRING,
                Subject::PATRONYMIC_EN => ParameterType::STRING,
                Subject::CLASSIFICATION => ParameterType::INTEGER,
                Subject::BIRTH_SURNAME_UA => ParameterType::STRING,
                Subject::BIRTH_SURNAME_RU => ParameterType::STRING,
                Subject::BIRTH_SURNAME_EN => ParameterType::STRING,
                Subject::BIRTH_DATE => ParameterType::DATE,
                Subject::BIRTH_PLACE_UA => ParameterType::STRING,
                Subject::BIRTH_PLACE_RU => ParameterType::STRING,
                Subject::BIRTH_PLACE_EN => ParameterType::STRING,
                Subject::RESIDENCY => ParameterType::INTEGER,
                Subject::CITIZENSHIP => ParameterType::STRING,
                Subject::NEGATIVE_STATUS => ParameterType::INTEGER,
                Subject::EDUCATION => ParameterType::INTEGER,
                Subject::MARITAL_STATUS => ParameterType::INTEGER,
                Subject::STATUS_ID => ParameterType::INTEGER,
                Subject::FULL_NAME_UA => ParameterType::STRING,
                Subject::FULL_NAME_RU => ParameterType::STRING,
                Subject::FULL_NAME_EN => ParameterType::STRING,
                Subject::ABBREVIATION_NAME_UA => ParameterType::STRING,
                Subject::ABBREVIATION_NAME_RU => ParameterType::STRING,
                Subject::ABBREVIATION_NAME_EN => ParameterType::STRING,
                Subject::OWNERSHIP => ParameterType::INTEGER,
                Subject::REGISTRATION_DATE => ParameterType::DATE,
                Subject::ECONOMIC_ACTIVITY => ParameterType::INTEGER,
                Subject::EMPLOYEE_COUNT => ParameterType::INTEGER,
            ],
            Subject::parameters()
        );
    }

    public function testGetResidency(): void
    {
        $this->assertEquals(static::RESIDENCY, $this->fakeSubject->getResidency());
    }

    public function testGetFullNameUa(): void
    {
        $this->assertEquals(static::FULL_NAME_UA, $this->fakeSubject->getFullNameUa());
    }

    public function testGetPatronymicUa(): void
    {
        $this->assertEquals(static::PATRONYMIC_UA, $this->fakeSubject->getPatronymicUa());
    }

    public function testGetNameRu(): void
    {
        $this->assertEquals(static::NAME_RU, $this->fakeSubject->getNameRu());
    }

    public function testGetFullNameEn(): void
    {
        $this->assertEquals(static::FULL_NAME_EN, $this->fakeSubject->getFullNameEn());
    }

    public function testGetStatusId(): void
    {
        $this->assertEquals(static::STATUS_ID, $this->fakeSubject->getStatusId());
    }

    public function testGetAbbreviationRu(): void
    {
        $this->assertEquals(static::ABBREVIATION_RU, $this->fakeSubject->getAbbreviationRu());
    }

    public function testGetMaritalStatus(): void
    {
        $this->assertEquals(static::MARITAL_STATUS, $this->fakeSubject->getMaritalStatus());
    }

    public function testGetPatronymicEn(): void
    {
        $this->assertEquals(static::PATRONYMIC_EN, $this->fakeSubject->getPatronymicEn());
    }

    public function testGetBirthSurnameEn(): void
    {
        $this->assertEquals(static::BIRTH_SURNAME_EN, $this->fakeSubject->getBirthSurnameEn());
    }

    public function testGetNameEn(): void
    {
        $this->assertEquals(static::NAME_EN, $this->fakeSubject->getNameEn());
    }

    public function testGetEconomicActivity(): void
    {
        $this->assertEquals(static::ECONOMIC_ACTIVITY, $this->fakeSubject->getEconomicActivity());
    }

    public function testGetLastUpdate(): void
    {
        $this->assertEquals(Carbon::make(static::LAST_UPDATE), $this->fakeSubject->getLastUpdate());
    }

    public function testGetEmployeeCount(): void
    {
        $this->assertEquals(static::EMPLOYEE_COUNT, $this->fakeSubject->getEmployeeCount());
    }

    public function testGetGender(): void
    {
        $this->assertEquals(static::GENDER, $this->fakeSubject->getGender());
    }

    public function testGetSurnameUa(): void
    {
        $this->assertEquals(static::SURNAME_UA, $this->fakeSubject->getSurnameUa());
    }

    public function testGetCitizenShip(): void
    {
        $this->assertEquals(static::CITIZEN_SHIP, $this->fakeSubject->getCitizenShip());
    }

    public function testGetBirthPlaceEn(): void
    {
        $this->assertEquals(static::BIRTH_PLACE_EN, $this->fakeSubject->getBirthPlaceEn());
    }

    public function testGetBirthPlaceRu(): void
    {
        $this->assertEquals(static::BIRTH_PLACE_RU, $this->fakeSubject->getBirthPlaceRu());
    }

    public function testGetNegativeStatus(): void
    {
        $this->assertEquals(static::NEGATIVE_STATUS, $this->fakeSubject->getNegativeStatus());
    }

    public function testGetOwnership(): void
    {
        $this->assertEquals(static::OWNERSHIP, $this->fakeSubject->getOwnership());
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(Carbon::make(static::BIRTH_DATE), $this->fakeSubject->getBirthDate());
    }

    public function testGetClassification(): void
    {
        $this->assertEquals(static::CLASSIFICATION, $this->fakeSubject->getClassification());
    }

    public function testGetEntity(): void
    {
        $this->assertEquals(static::ENTITY, $this->fakeSubject->getEntity());
    }

    public function testGetSurnameEn(): void
    {
        $this->assertEquals(static::SURNAME_EN, $this->fakeSubject->getSurnameEn());
    }

    public function testGetAbbreviationEn(): void
    {
        $this->assertEquals(static::ABBREVIATION_EN, $this->fakeSubject->getAbbreviationEn());
    }

    public function testGetPatronymicRu(): void
    {
        $this->assertEquals(static::PATRONYMIC_RU, $this->fakeSubject->getPatronymicRu());
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(static::EDUCATION, $this->fakeSubject->getEducation());
    }

    public function testGetBirthSurnameUa(): void
    {
        $this->assertEquals(static::BIRTH_SURNAME_UA, $this->fakeSubject->getBirthSurnameUa());
    }

    public function testGetNameUa(): void
    {
        $this->assertEquals(static::NAME_UA, $this->fakeSubject->getNameUa());
    }

    public function testGetFullNameRu(): void
    {
        $this->assertEquals(static::FULL_NAME_RU, $this->fakeSubject->getFullNameRu());
    }

    public function testGetRequestId(): void
    {
        $this->assertEquals(static::REQUEST_ID, $this->fakeSubject->getRequestId());
    }

    public function testGetRegistrationDate(): void
    {
        $this->assertEquals(Carbon::make(static::REGISTRATION_DATE), $this->fakeSubject->getRegistrationDate());
    }

    public function testGetSurnameRu(): void
    {
        $this->assertEquals(static::SURNAME_RU, $this->fakeSubject->getSurnameRu());
    }

    public function testGetBirthSurnameRu(): void
    {
        $this->assertEquals(static::BIRTH_SURNAME_RU, $this->fakeSubject->getBirthSurnameRu());
    }

    public function testGetAbbreviationUa(): void
    {
        $this->assertEquals(static::ABBREVIATION_UA, $this->fakeSubject->getAbbreviationUa());
    }

    public function testGetBirthPlaceUa(): void
    {
        $this->assertEquals(static::BIRTH_PLACE_UA, $this->fakeSubject->getBirthPlaceUa());
    }
}
