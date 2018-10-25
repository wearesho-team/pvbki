<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class SubjectNegativeStatus
 * @package Wearesho\Pvbki\Enums
 *
 * @method static SubjectNegativeStatus WITHOUT_NEGATIVE_STATUS()
 * @method static SubjectNegativeStatus CUSTOMER_UNTRACEABLE_OR_DECEASED()
 * @method static SubjectNegativeStatus ASSETS_FROZEN_OR_SEIZED()
 * @method static SubjectNegativeStatus SUPERVISORY_ADMINISTRATION()
 * @method static SubjectNegativeStatus CASE_OF_BANKRUPTCY_STARTED()
 * @method static SubjectNegativeStatus COURT_ACTION_BY_COMPANY()
 * @method static SubjectNegativeStatus COURT_DECLARED_BANKRUPTCY()
 * @method static SubjectNegativeStatus LIQUIDATION()
 * @method static SubjectNegativeStatus PROVEN_FRAUD()
 * @method static SubjectNegativeStatus UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT()
 * @method static SubjectNegativeStatus RECCURENCE_OF_FRAUD()
 * @method static SubjectNegativeStatus LIMITED_CIVIL_CAPABILITY()
 * @method static SubjectNegativeStatus CRIMINAL_PROCEEDINGS_STARTED()
 */
final class SubjectNegativeStatus extends Enum implements NullableEnum
{
    public const WITHOUT_NEGATIVE_STATUS = 0;
    public const CUSTOMER_UNTRACEABLE_OR_DECEASED = 1;
    public const ASSETS_FROZEN_OR_SEIZED = 2;
    public const SUPERVISORY_ADMINISTRATION = 3;
    public const CASE_OF_BANKRUPTCY_STARTED = 4;
    public const COURT_ACTION_BY_COMPANY = 5;
    public const COURT_DECLARED_BANKRUPTCY = 6;
    public const LIQUIDATION = 7;
    public const PROVEN_FRAUD = 8;
    public const UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT = 9;
    public const RECCURENCE_OF_FRAUD = 10;
    public const LIMITED_CIVIL_CAPABILITY = 11;
    public const CRIMINAL_PROCEEDINGS_STARTED = 12;
}
