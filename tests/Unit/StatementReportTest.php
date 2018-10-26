<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class StatementReportTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass \Wearesho\Pvbki\StatementReport
 * @internal
 */
class StatementReportTest extends TestCase
{
    /** @var Pvbki\StatementReport */
    protected $fakeStatementReport;

    protected function setUp(): void
    {
        $this->fakeStatementReport = new Pvbki\StatementReport(
            true,
            Carbon::make('2018-12-12'),
            'powered',
            new Pvbki\Collections\Errors([
                new Pvbki\Elements\Error(
                    'code',
                    'message',
                    'type'
                ),
            ]),
            new Pvbki\Elements\Subject(
                'requestId',
                Carbon::make('2018-03-12'),
                Pvbki\Enums\Entity::INDIVIDUAL(),
                Pvbki\Enums\Gender::FEMALE(),
                new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                Pvbki\Enums\Classification::INDIVIDUAL(),
                Carbon::make('2018-02-11'),
                new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                Pvbki\Enums\Residency::RESIDENT(),
                'UA',
                Pvbki\Enums\SubjectNegativeStatus::ASSETS_FROZEN_OR_SEIZED(),
                Pvbki\Enums\Education::UNFINISHED(),
                Pvbki\Enums\MaritalStatus::DIVORCED(),
                Pvbki\Enums\Status::CLOSED(),
                new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                Pvbki\Enums\Ownership::SEPARATED_BRANCHES(),
                Carbon::make('2011-05-22'),
                Pvbki\Enums\EconomicActivity::OTHER(),
                Pvbki\Enums\EmployeeCount::FROM_1_TO_5()
            ),
            new Pvbki\Collections\Identifiers([
                new Pvbki\Elements\Identifier(
                    Pvbki\Enums\IdentificationType::PASSPORT(),
                    'number',
                    Carbon::make('2017-05-20'),
                    Carbon::make('2020-06-13'),
                    new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                ),
            ]),
            new Pvbki\Collections\Communications([
                new Pvbki\Elements\Communication('first', Pvbki\Enums\CommunicationType::MAIL()),
                new Pvbki\Elements\Communication('second', Pvbki\Enums\CommunicationType::WEB()),
            ]),
            new Pvbki\Collections\Addresses([
                new Pvbki\Elements\Address(
                    1,
                    Pvbki\Enums\AddressType::COLLATERAL(),
                    new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                    'postal_code'
                ),
            ]),
            new Pvbki\Collections\Dependants([
                new Pvbki\Elements\Dependant(1, 2),
                new Pvbki\Elements\Dependant(2, 3),
                new Pvbki\Elements\Dependant(3, 4),
            ]),
            new Pvbki\Collections\MonthlyIncomes([
                new Pvbki\Elements\MonthlyIncome(2000.34, 'UAH')
            ]),
            new Pvbki\Collections\Summaries([
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::COLLATERAL(), 1, 'code', 1, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::CURRENCY(), 2, 'code', 3, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::OVERDUE_AMOUNT(), 3, 'code', 4, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::REST_AMOUNT(), 4, 'code', 5, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::TYPE(), 5, 'code', 6, 345.67),
            ]),
            new Pvbki\Collections\Contracts([
                new Pvbki\Elements\Contract(
                    Pvbki\Enums\Role::PARTNER(),
                    'provider',
                    'contractId',
                    Carbon::make('2018-03-12'),
                    Pvbki\Enums\Phase::EXISTING(),
                    'currency',
                    Carbon::make('2019-03-15'),
                    Pvbki\Enums\CreditPurpose::GUARANTEE(),
                    Pvbki\Enums\ContractNegativeStatus::BLOCKED(),
                    Carbon::make('2018-03-15'),
                    Carbon::make('2017-01-01'),
                    Carbon::make('2020-01-01'),
                    Carbon::make('2020-02-01'),
                    Pvbki\Enums\ContractType::INSTALMENT(),
                    Pvbki\Enums\PaymentMethod::UNDETERMINED(),
                    Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(),
                    'actual_currency',
                    789.12,
                    345.67,
                    8,
                    'instalment_amount_currency',
                    123.45,
                    9,
                    345.67,
                    15,
                    567.89,
                    new Pvbki\Collections\Records([
                        new Pvbki\Elements\Record(
                            Carbon::make('2018-03-12'),
                            100.23,
                            'contractId',
                            Pvbki\Enums\CreditUsage::IN(),
                            'rest_currency',
                            10,
                            200.40,
                            'overdue_currency',
                            10
                        ),
                    ]),
                    new Pvbki\Collections\Collaterals([
                        new Pvbki\Elements\Collateral(
                            'contractId',
                            Pvbki\Enums\CollateralType::GUARANTEE(),
                            234.56,
                            'currency',
                            Pvbki\Enums\AddressType::COLLATERAL(),
                            3,
                            new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                            'postal_code',
                            Pvbki\Enums\IdentificationType::PASSPORT(),
                            'number',
                            Carbon::make('2010-05-12'),
                            Carbon::make('2015-06-23'),
                            Carbon::make('2020-01-01'),
                            new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                        )
                    ])
                )
            ]),
            new Pvbki\Collections\Events([
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 1),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 2),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 3),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 4),
            ]),
            new Pvbki\Elements\Scoring('degree', 1000, 12.34, 'adverse')
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'protection' => true,
                'generated' => Carbon::make('2018-12-12'),
                'powered' => 'powered',
                'errors' => new Pvbki\Collections\Errors([
                    new Pvbki\Elements\Error(
                        'code',
                        'message',
                        'type'
                    ),
                ]),
                'subject' => new Pvbki\Elements\Subject(
                    'requestId',
                    Carbon::make('2018-03-12'),
                    Pvbki\Enums\Entity::INDIVIDUAL(),
                    Pvbki\Enums\Gender::FEMALE(),
                    new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                    new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                    new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                    new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                    Pvbki\Enums\Classification::INDIVIDUAL(),
                    Carbon::make('2018-02-11'),
                    new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                    Pvbki\Enums\Residency::RESIDENT(),
                    'UA',
                    Pvbki\Enums\SubjectNegativeStatus::ASSETS_FROZEN_OR_SEIZED(),
                    Pvbki\Enums\Education::UNFINISHED(),
                    Pvbki\Enums\MaritalStatus::DIVORCED(),
                    Pvbki\Enums\Status::CLOSED(),
                    new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                    new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                    Pvbki\Enums\Ownership::SEPARATED_BRANCHES(),
                    Carbon::make('2011-05-22'),
                    Pvbki\Enums\EconomicActivity::OTHER(),
                    Pvbki\Enums\EmployeeCount::FROM_1_TO_5()
                ),
                'identifications' => new Pvbki\Collections\Identifiers([
                    new Pvbki\Elements\Identifier(
                        Pvbki\Enums\IdentificationType::PASSPORT(),
                        'number',
                        Carbon::make('2017-05-20'),
                        Carbon::make('2020-06-13'),
                        new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                    ),
                ]),
                'communications' => new Pvbki\Collections\Communications([
                    new Pvbki\Elements\Communication('first', Pvbki\Enums\CommunicationType::MAIL()),
                    new Pvbki\Elements\Communication('second', Pvbki\Enums\CommunicationType::WEB()),
                ]),
                'addresses' => new Pvbki\Collections\Addresses([
                    new Pvbki\Elements\Address(
                        1,
                        Pvbki\Enums\AddressType::COLLATERAL(),
                        new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                        'postal_code'
                    ),
                ]),
                'dependants' => new Pvbki\Collections\Dependants([
                    new Pvbki\Elements\Dependant(1, 2),
                    new Pvbki\Elements\Dependant(2, 3),
                    new Pvbki\Elements\Dependant(3, 4),
                ]),
                'monthlyIncomes' => new Pvbki\Collections\MonthlyIncomes([
                    new Pvbki\Elements\MonthlyIncome(2000.34, 'UAH')
                ]),
                'summaries' => new Pvbki\Collections\Summaries([
                    new Pvbki\Elements\Summary(Pvbki\Enums\Category::COLLATERAL(), 1, 'code', 1, 345.67),
                    new Pvbki\Elements\Summary(Pvbki\Enums\Category::CURRENCY(), 2, 'code', 3, 345.67),
                    new Pvbki\Elements\Summary(Pvbki\Enums\Category::OVERDUE_AMOUNT(), 3, 'code', 4, 345.67),
                    new Pvbki\Elements\Summary(Pvbki\Enums\Category::REST_AMOUNT(), 4, 'code', 5, 345.67),
                    new Pvbki\Elements\Summary(Pvbki\Enums\Category::TYPE(), 5, 'code', 6, 345.67),
                ]),
                'contracts' => new Pvbki\Collections\Contracts([
                    new Pvbki\Elements\Contract(
                        Pvbki\Enums\Role::PARTNER(),
                        'provider',
                        'contractId',
                        Carbon::make('2018-03-12'),
                        Pvbki\Enums\Phase::EXISTING(),
                        'currency',
                        Carbon::make('2019-03-15'),
                        Pvbki\Enums\CreditPurpose::GUARANTEE(),
                        Pvbki\Enums\ContractNegativeStatus::BLOCKED(),
                        Carbon::make('2018-03-15'),
                        Carbon::make('2017-01-01'),
                        Carbon::make('2020-01-01'),
                        Carbon::make('2020-02-01'),
                        Pvbki\Enums\ContractType::INSTALMENT(),
                        Pvbki\Enums\PaymentMethod::UNDETERMINED(),
                        Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(),
                        'actual_currency',
                        789.12,
                        345.67,
                        8,
                        'instalment_amount_currency',
                        123.45,
                        9,
                        345.67,
                        15,
                        567.89,
                        new Pvbki\Collections\Records([
                            new Pvbki\Elements\Record(
                                Carbon::make('2018-03-12'),
                                100.23,
                                'contractId',
                                Pvbki\Enums\CreditUsage::IN(),
                                'rest_currency',
                                10,
                                200.40,
                                'overdue_currency',
                                10
                            ),
                        ]),
                        new Pvbki\Collections\Collaterals([
                            new Pvbki\Elements\Collateral(
                                'contractId',
                                Pvbki\Enums\CollateralType::GUARANTEE(),
                                234.56,
                                'currency',
                                Pvbki\Enums\AddressType::COLLATERAL(),
                                3,
                                new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                                'postal_code',
                                Pvbki\Enums\IdentificationType::PASSPORT(),
                                'number',
                                Carbon::make('2010-05-12'),
                                Carbon::make('2015-06-23'),
                                Carbon::make('2020-01-01'),
                                new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                            )
                        ])
                    )
                ]),
                'events' => new Pvbki\Collections\Events([
                    new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 1),
                    new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 2),
                    new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 3),
                    new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 4),
                ]),
                'scoring' => new Pvbki\Elements\Scoring('degree', 1000, 12.34, 'adverse')
            ],
            $this->fakeStatementReport->jsonSerialize()
        );
    }

    public function testIsProtection(): void
    {
        $this->assertEquals(true, $this->fakeStatementReport->isProtection());
    }

    public function testGetGenerated(): void
    {
        $this->assertEquals('2018-12-12', Carbon::make($this->fakeStatementReport->getGenerated())->toDateString());
    }

    public function testGetPowered(): void
    {
        $this->assertEquals('powered', $this->fakeStatementReport->getPowered());
    }

    public function testGetContracts(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Contracts([
                new Pvbki\Elements\Contract(
                    Pvbki\Enums\Role::PARTNER(),
                    'provider',
                    'contractId',
                    Carbon::make('2018-03-12'),
                    Pvbki\Enums\Phase::EXISTING(),
                    'currency',
                    Carbon::make('2019-03-15'),
                    Pvbki\Enums\CreditPurpose::GUARANTEE(),
                    Pvbki\Enums\ContractNegativeStatus::BLOCKED(),
                    Carbon::make('2018-03-15'),
                    Carbon::make('2017-01-01'),
                    Carbon::make('2020-01-01'),
                    Carbon::make('2020-02-01'),
                    Pvbki\Enums\ContractType::INSTALMENT(),
                    Pvbki\Enums\PaymentMethod::UNDETERMINED(),
                    Pvbki\Enums\PaymentPeriod::EVERY_30_DAYS(),
                    'actual_currency',
                    789.12,
                    345.67,
                    8,
                    'instalment_amount_currency',
                    123.45,
                    9,
                    345.67,
                    15,
                    567.89,
                    new Pvbki\Collections\Records([
                        new Pvbki\Elements\Record(
                            Carbon::make('2018-03-12'),
                            100.23,
                            'contractId',
                            Pvbki\Enums\CreditUsage::IN(),
                            'rest_currency',
                            10,
                            200.40,
                            'overdue_currency',
                            10
                        ),
                    ]),
                    new Pvbki\Collections\Collaterals([
                        new Pvbki\Elements\Collateral(
                            'contractId',
                            Pvbki\Enums\CollateralType::GUARANTEE(),
                            234.56,
                            'currency',
                            Pvbki\Enums\AddressType::COLLATERAL(),
                            3,
                            new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                            'postal_code',
                            Pvbki\Enums\IdentificationType::PASSPORT(),
                            'number',
                            Carbon::make('2010-05-12'),
                            Carbon::make('2015-06-23'),
                            Carbon::make('2020-01-01'),
                            new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                        )
                    ])
                )
            ]),
            $this->fakeStatementReport->getContracts()
        );
    }

    public function testGetSubject(): void
    {
        $this->assertEquals(
            new Pvbki\Elements\Subject(
                'requestId',
                Carbon::make('2018-03-12'),
                Pvbki\Enums\Entity::INDIVIDUAL(),
                Pvbki\Enums\Gender::FEMALE(),
                new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                Pvbki\Enums\Classification::INDIVIDUAL(),
                Carbon::make('2018-02-11'),
                new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                Pvbki\Enums\Residency::RESIDENT(),
                'UA',
                Pvbki\Enums\SubjectNegativeStatus::ASSETS_FROZEN_OR_SEIZED(),
                Pvbki\Enums\Education::UNFINISHED(),
                Pvbki\Enums\MaritalStatus::DIVORCED(),
                Pvbki\Enums\Status::CLOSED(),
                new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                Pvbki\Enums\Ownership::SEPARATED_BRANCHES(),
                Carbon::make('2011-05-22'),
                Pvbki\Enums\EconomicActivity::OTHER(),
                Pvbki\Enums\EmployeeCount::FROM_1_TO_5()
            ),
            $this->fakeStatementReport->getSubject()
        );
    }

    public function testGetCommunications(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Communications([
                new Pvbki\Elements\Communication('first', Pvbki\Enums\CommunicationType::MAIL()),
                new Pvbki\Elements\Communication('second', Pvbki\Enums\CommunicationType::WEB()),
            ]),
            $this->fakeStatementReport->getCommunications()
        );
    }

    public function testGetEvents(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Events([
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 1),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 2),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 3),
                new Pvbki\Elements\Event('name', Carbon::make('2018-03-12'), 4),
            ]),
            $this->fakeStatementReport->getEvents()
        );
    }

    public function testGetAddresses(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Addresses([
                new Pvbki\Elements\Address(
                    1,
                    Pvbki\Enums\AddressType::COLLATERAL(),
                    new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                    'postal_code'
                ),
            ]),
            $this->fakeStatementReport->getAddresses()
        );
    }

    public function testGetErrors(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Errors([
                new Pvbki\Elements\Error(
                    'code',
                    'message',
                    'type'
                ),
            ]),
            $this->fakeStatementReport->getErrors()
        );
    }

    public function testGetScoring(): void
    {
        $this->assertEquals(
            new Pvbki\Elements\Scoring('degree', 1000, 12.34, 'adverse'),
            $this->fakeStatementReport->getScoring()
        );
    }

    public function testGetSummaries(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Summaries([
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::COLLATERAL(), 1, 'code', 1, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::CURRENCY(), 2, 'code', 3, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::OVERDUE_AMOUNT(), 3, 'code', 4, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::REST_AMOUNT(), 4, 'code', 5, 345.67),
                new Pvbki\Elements\Summary(Pvbki\Enums\Category::TYPE(), 5, 'code', 6, 345.67),
            ]),
            $this->fakeStatementReport->getSummaries()
        );
    }

    public function testGetMonthlyIncomes(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\MonthlyIncomes([
                new Pvbki\Elements\MonthlyIncome(2000.34, 'UAH')
            ]),
            $this->fakeStatementReport->getMonthlyIncomes()
        );
    }

    public function testGetIdentifications(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Identifiers([
                new Pvbki\Elements\Identifier(
                    Pvbki\Enums\IdentificationType::PASSPORT(),
                    'number',
                    Carbon::make('2017-05-20'),
                    Carbon::make('2020-06-13'),
                    new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                ),
            ]),
            $this->fakeStatementReport->getIdentifications()
        );
    }

    public function testGetDependants(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Dependants([
                new Pvbki\Elements\Dependant(1, 2),
                new Pvbki\Elements\Dependant(2, 3),
                new Pvbki\Elements\Dependant(3, 4),
            ]),
            $this->fakeStatementReport->getDependants()
        );
    }
}
