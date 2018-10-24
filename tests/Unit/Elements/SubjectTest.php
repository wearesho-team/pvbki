<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class SubjectTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Subject
 * @internal
 */
class SubjectTest extends TestCase
{
    protected const REQUEST_ID = 'request_id';
    protected const LAST_UPDATE = '2018-09-25';
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
    protected const BIRTH_DATE = '1998-03-12';
    protected const BIRTH_PLACE_UA = 'birth_place_ua';
    protected const BIRTH_PLACE_RU = 'birth_place_ru';
    protected const BIRTH_PLACE_EN = 'birth_place_en';
    protected const RESIDENCY = 3;
    protected const CITIZEN_SHIP = 4;
    protected const NEGATIVE_STATUS = 5;
    protected const MARITAL_STATUS = 7;
    protected const STATUS_ID = 8;
    protected const FULL_NAME_UA = 'full_name_ua';
    protected const FULL_NAME_RU = 'full_name_ru';
    protected const FULL_NAME_EN = 'full_name_en';
    protected const ABBREVIATION_UA = 'abbreviation_ua';
    protected const ABBREVIATION_RU = 'abbreviation_ru';
    protected const ABBREVIATION_EN = 'abbreviation_en';
    protected const REGISTRATION_DATE = '2018-04-12';
    protected const EMPLOYEE_COUNT = 11;

    /** @var Pvbki\Elements\Subject */
    protected $fakeSubject;

    protected function setUp(): void
    {
        $this->fakeSubject = new Pvbki\Elements\Subject(
            static::REQUEST_ID,
            Carbon::parse(static::LAST_UPDATE),
            Pvbki\Enums\Entity::SUBJECT(),
            Pvbki\Enums\Gender::MAN(),
            new Pvbki\Sentence\Translation(
                static::SURNAME_UA,
                static::SURNAME_RU,
                static::SURNAME_EN
            ),
            new Pvbki\Sentence\Translation(
                static::NAME_UA,
                static::NAME_RU,
                static::NAME_EN
            ),
            new Pvbki\Sentence\Translation(
                static::PATRONYMIC_UA,
                static::PATRONYMIC_RU,
                static::PATRONYMIC_EN
            ),
            new Pvbki\Sentence\Translation(
                static::BIRTH_SURNAME_UA,
                static::BIRTH_SURNAME_RU,
                static::BIRTH_SURNAME_EN
            ),
            static::CLASSIFICATION,
            Carbon::parse(static::BIRTH_DATE),
            new Pvbki\Sentence\Translation(
                static::BIRTH_PLACE_UA,
                static::BIRTH_PLACE_RU,
                static::BIRTH_PLACE_EN
            ),
            static::RESIDENCY,
            static::CITIZEN_SHIP,
            static::NEGATIVE_STATUS,
            Pvbki\Enums\Education::UNFINISHED(),
            static::MARITAL_STATUS,
            static::STATUS_ID,
            new Pvbki\Sentence\Translation(
                static::FULL_NAME_UA,
                static::FULL_NAME_RU,
                static::FULL_NAME_EN
            ),
            new Pvbki\Sentence\Translation(
                static::ABBREVIATION_UA,
                static::ABBREVIATION_RU,
                static::ABBREVIATION_EN
            ),
            Pvbki\Enums\Ownership::SEPARATED_BRANCHES(),
            Carbon::parse(static::REGISTRATION_DATE),
            Pvbki\Enums\EconomicActivity::TRANSPORT_AND_COMMUNICATION(),
            static::EMPLOYEE_COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'requestId' => static::REQUEST_ID,
                'lastUpdate' => Carbon::parse(static::LAST_UPDATE),
                'entity' => Pvbki\Enums\Entity::SUBJECT(),
                'gender' => Pvbki\Enums\Gender::MAN(),
                'surname' => new Pvbki\Sentence\Translation(
                    static::SURNAME_UA,
                    static::SURNAME_RU,
                    static::SURNAME_EN
                ),
                'name' => new Pvbki\Sentence\Translation(
                    static::NAME_UA,
                    static::NAME_RU,
                    static::NAME_EN
                ),
                'patronymic' => new Pvbki\Sentence\Translation(
                    static::PATRONYMIC_UA,
                    static::PATRONYMIC_RU,
                    static::PATRONYMIC_EN
                ),
                'classification' => static::CLASSIFICATION,
                'birthSurname' => new Pvbki\Sentence\Translation(
                    static::BIRTH_SURNAME_UA,
                    static::BIRTH_SURNAME_RU,
                    static::BIRTH_SURNAME_EN
                ),
                'birthDate' => Carbon::parse(static::BIRTH_DATE),
                'birthPlace' => new Pvbki\Sentence\Translation(
                    static::BIRTH_PLACE_UA,
                    static::BIRTH_PLACE_RU,
                    static::BIRTH_PLACE_EN
                ),
                'residency' => static::RESIDENCY,
                'citizenShip' => static::CITIZEN_SHIP,
                'negativeStatus' => static::NEGATIVE_STATUS,
                'education' => Pvbki\Enums\Education::UNFINISHED(),
                'maritalStatus' => static::MARITAL_STATUS,
                'statusId' => static::STATUS_ID,
                'fullName' => new Pvbki\Sentence\Translation(
                    static::FULL_NAME_UA,
                    static::FULL_NAME_RU,
                    static::FULL_NAME_EN
                ),
                'abbreviation' => new Pvbki\Sentence\Translation(
                    static::ABBREVIATION_UA,
                    static::ABBREVIATION_RU,
                    static::ABBREVIATION_EN
                ),
                'ownership' => Pvbki\Enums\Ownership::SEPARATED_BRANCHES(),
                'registrationDate' => Carbon::parse(static::REGISTRATION_DATE),
                'economicActivity' => Pvbki\Enums\EconomicActivity::TRANSPORT_AND_COMMUNICATION(),
                'employeeCount' => static::EMPLOYEE_COUNT,
            ],
            $this->fakeSubject->jsonSerialize()
        );
    }

    public function testGetOwnership(): void
    {
        $this->assertEquals(Pvbki\Enums\Ownership::SEPARATED_BRANCHES(), $this->fakeSubject->getOwnership());
    }

    public function testGetLastUpdate(): void
    {
        $this->assertEquals(static::LAST_UPDATE, Carbon::make($this->fakeSubject->getLastUpdate())->toDateString());
    }

    public function testGetAbbreviation(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::ABBREVIATION_UA,
                static::ABBREVIATION_RU,
                static::ABBREVIATION_EN
            ),
            $this->fakeSubject->getAbbreviation()
        );
    }

    public function testGetBirthPlace(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::BIRTH_PLACE_UA,
                static::BIRTH_PLACE_RU,
                static::BIRTH_PLACE_EN
            ),
            $this->fakeSubject->getBirthPlace()
        );
    }

    public function testGetBirthSurname(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::BIRTH_SURNAME_UA,
                static::BIRTH_SURNAME_RU,
                static::BIRTH_SURNAME_EN
            ),
            $this->fakeSubject->getBirthSurname()
        );
    }

    public function testGetCitizenShip(): void
    {
        $this->assertEquals(static::CITIZEN_SHIP, $this->fakeSubject->getCitizenShip());
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::PATRONYMIC_UA,
                static::PATRONYMIC_RU,
                static::PATRONYMIC_EN
            ),
            $this->fakeSubject->getPatronymic()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::NAME_UA,
                static::NAME_RU,
                static::NAME_EN
            ),
            $this->fakeSubject->getName()
        );
    }

    public function testGetClassification(): void
    {
        $this->assertEquals(static::CLASSIFICATION, $this->fakeSubject->getClassification());
    }

    public function testGetEmployeeCount(): void
    {
        $this->assertEquals(static::EMPLOYEE_COUNT, $this->fakeSubject->getEmployeeCount());
    }

    public function testGetResidency(): void
    {
        $this->assertEquals(static::RESIDENCY, $this->fakeSubject->getResidency());
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(static::BIRTH_DATE, Carbon::make($this->fakeSubject->getBirthDate())->toDateString());
    }

    public function testGetNegativeStatus(): void
    {
        $this->assertEquals(static::NEGATIVE_STATUS, $this->fakeSubject->getNegativeStatus());
    }

    public function testGetMaritalStatus(): void
    {
        $this->assertEquals(static::MARITAL_STATUS, $this->fakeSubject->getMaritalStatus());
    }

    public function testGetGender(): void
    {
        $this->assertEquals(Pvbki\Enums\Gender::MAN(), $this->fakeSubject->getGender());
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(Pvbki\Enums\Education::UNFINISHED(), $this->fakeSubject->getEducation());
    }

    public function testGetStatusId(): void
    {
        $this->assertEquals(static::STATUS_ID, $this->fakeSubject->getStatusId());
    }

    public function testGetRegistrationDate(): void
    {
        $this->assertEquals(
            static::REGISTRATION_DATE,
            Carbon::make($this->fakeSubject->getRegistrationDate())->toDateString()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::SURNAME_UA,
                static::SURNAME_RU,
                static::SURNAME_EN
            ),
            $this->fakeSubject->getSurname()
        );
    }

    public function testGetRequestId(): void
    {
        $this->assertEquals(static::REQUEST_ID, $this->fakeSubject->getRequestId());
    }

    public function testGetEntity(): void
    {
        $this->assertEquals(Pvbki\Enums\Entity::SUBJECT(), $this->fakeSubject->getEntity());
    }

    public function testGetFullName(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::FULL_NAME_UA,
                static::FULL_NAME_RU,
                static::FULL_NAME_EN
            ),
            $this->fakeSubject->getFullName()
        );
    }

    public function testGetEconomicActivity(): void
    {
        $this->assertEquals(
            Pvbki\Enums\EconomicActivity::TRANSPORT_AND_COMMUNICATION(),
            $this->fakeSubject->getEconomicActivity()
        );
    }
}
