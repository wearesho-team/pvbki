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
                'entity',
                1,
                new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                2,
                Carbon::make('2018-02-11'),
                new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                3,
                4,
                5,
                6,
                7,
                8,
                new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                9,
                Carbon::make('2011-05-22'),
                9,
                10
            ),
            new Pvbki\Collections\Identifiers([
                new Pvbki\Elements\Identifier(
                    1,
                    'number',
                    Carbon::make('2017-05-20'),
                    Carbon::make('2020-06-13'),
                    new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                ),
            ]),
            new Pvbki\Collections\Communications([
                new Pvbki\Elements\Communication('first', 1),
                new Pvbki\Elements\Communication('second', 2),
            ]),
            new Pvbki\Collections\Addresses([
                new Pvbki\Elements\Address(
                    1,
                    2,
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
                new Pvbki\Elements\Summary('category_1', 1, 'code', 1, 345.67),
                new Pvbki\Elements\Summary('category_2', 2, 'code', 3, 345.67),
                new Pvbki\Elements\Summary('category_3', 3, 'code', 4, 345.67),
                new Pvbki\Elements\Summary('category_4', 4, 'code', 5, 345.67),
                new Pvbki\Elements\Summary('category_5', 5, 'code', 6, 345.67),
            ]),
            new Pvbki\Collections\Contracts([
                new Pvbki\Elements\Contract(
                    1,
                    'provider',
                    'contractId',
                    Carbon::make('2018-03-12'),
                    2,
                    'currency',
                    Carbon::make('2019-03-15'),
                    3,
                    4,
                    Carbon::make('2018-03-15'),
                    Carbon::make('2017-01-01'),
                    Carbon::make('2020-01-01'),
                    Carbon::make('2020-02-01'),
                    'type',
                    5,
                    6,
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
                            1,
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
                            1,
                            234.56,
                            'currency',
                            2,
                            3,
                            new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                            'postal_code',
                            6,
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
                    'entity',
                    1,
                    new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                    new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                    new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                    new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                    2,
                    Carbon::make('2018-02-11'),
                    new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                    new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                    9,
                    Carbon::make('2011-05-22'),
                    9,
                    10
                ),
                'identifications' => new Pvbki\Collections\Identifiers([
                    new Pvbki\Elements\Identifier(
                        1,
                        'number',
                        Carbon::make('2017-05-20'),
                        Carbon::make('2020-06-13'),
                        new Pvbki\Sentence\Translation('authority_ua', 'authority_ru', 'authority_en')
                    ),
                ]),
                'communications' => new Pvbki\Collections\Communications([
                    new Pvbki\Elements\Communication('first', 1),
                    new Pvbki\Elements\Communication('second', 2),
                ]),
                'addresses' => new Pvbki\Collections\Addresses([
                    new Pvbki\Elements\Address(
                        1,
                        2,
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
                    new Pvbki\Elements\Summary('category_1', 1, 'code', 1, 345.67),
                    new Pvbki\Elements\Summary('category_2', 2, 'code', 3, 345.67),
                    new Pvbki\Elements\Summary('category_3', 3, 'code', 4, 345.67),
                    new Pvbki\Elements\Summary('category_4', 4, 'code', 5, 345.67),
                    new Pvbki\Elements\Summary('category_5', 5, 'code', 6, 345.67),
                ]),
                'contracts' => new Pvbki\Collections\Contracts([
                    new Pvbki\Elements\Contract(
                        1,
                        'provider',
                        'contractId',
                        Carbon::make('2018-03-12'),
                        2,
                        'currency',
                        Carbon::make('2019-03-15'),
                        3,
                        4,
                        Carbon::make('2018-03-15'),
                        Carbon::make('2017-01-01'),
                        Carbon::make('2020-01-01'),
                        Carbon::make('2020-02-01'),
                        'type',
                        5,
                        6,
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
                                1,
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
                                1,
                                234.56,
                                'currency',
                                2,
                                3,
                                new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                                'postal_code',
                                6,
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

    public function testGetContracts(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Contracts([
                new Pvbki\Elements\Contract(
                    1,
                    'provider',
                    'contractId',
                    Carbon::make('2018-03-12'),
                    2,
                    'currency',
                    Carbon::make('2019-03-15'),
                    3,
                    4,
                    Carbon::make('2018-03-15'),
                    Carbon::make('2017-01-01'),
                    Carbon::make('2020-01-01'),
                    Carbon::make('2020-02-01'),
                    'type',
                    5,
                    6,
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
                            1,
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
                            1,
                            234.56,
                            'currency',
                            2,
                            3,
                            new Pvbki\Sentence\Translation('street_ua', 'street_ru', 'street_en'),
                            'postal_code',
                            6,
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
                'entity',
                1,
                new Pvbki\Sentence\Translation('surname_ua', 'surname_ru', 'surname_en'),
                new Pvbki\Sentence\Translation('name_ua', 'name_ru', 'name_en'),
                new Pvbki\Sentence\Translation('patronymic_ua', 'patronymic_ru', 'patronymic_en'),
                new Pvbki\Sentence\Translation('birth_surname_ua', 'birth_surname_ru', 'birth_surname_en'),
                2,
                Carbon::make('2018-02-11'),
                new Pvbki\Sentence\Translation('birth_place_ua', 'birth_place_ru', 'birth_place_en'),
                3,
                4,
                5,
                6,
                7,
                8,
                new Pvbki\Sentence\Translation('full_name_ua', 'full_name_ru', 'full_name_en'),
                new Pvbki\Sentence\Translation('abbreviation_ua', 'abbreviation_ru', 'abbreviation_en'),
                9,
                Carbon::make('2011-05-22'),
                9,
                10
            ),
            $this->fakeStatementReport->getSubject()
        );
    }

    public function testGetCommunications(): void
    {
        $this->assertEquals(
            new Pvbki\Collections\Communications([
                new Pvbki\Elements\Communication('first', 1),
                new Pvbki\Elements\Communication('second', 2),
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
                    2,
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
                new Pvbki\Elements\Summary('category_1', 1, 'code', 1, 345.67),
                new Pvbki\Elements\Summary('category_2', 2, 'code', 3, 345.67),
                new Pvbki\Elements\Summary('category_3', 3, 'code', 4, 345.67),
                new Pvbki\Elements\Summary('category_4', 4, 'code', 5, 345.67),
                new Pvbki\Elements\Summary('category_5', 5, 'code', 6, 345.67),
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
                    1,
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
