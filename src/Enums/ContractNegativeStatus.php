<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class ContractNegativeStatus
 * @package Wearesho\Pvbki\Enums
 *
 * @method static ContractNegativeStatus CNS_0()
 * @method static ContractNegativeStatus CNS_1()
 * @method static ContractNegativeStatus CNS_2()
 * @method static ContractNegativeStatus CNS_3()
 * @method static ContractNegativeStatus CNS_4()
 * @method static ContractNegativeStatus CNS_5()
 * @method static ContractNegativeStatus CNS_6()
 * @method static ContractNegativeStatus CNS_7()
 * @method static ContractNegativeStatus CNS_8()
 * @method static ContractNegativeStatus CNS_10()
 * @method static ContractNegativeStatus CNS_11()
 * @method static ContractNegativeStatus CNS_12()
 * @method static ContractNegativeStatus CNS_13()
 * @method static ContractNegativeStatus CNS_14()
 * @method static ContractNegativeStatus CNS_15()
 * @method static ContractNegativeStatus CNS_16()
 * @method static ContractNegativeStatus CNS_17()
 * @method static ContractNegativeStatus CNS_18()
 */
final class ContractNegativeStatus extends Enum implements NullableEnum
{
    /**
     * None
     */
    public const CNS_0 = 0;

    /**
     * Assignment of Credit to Third Party (with discount)
     */
    public const CNS_1 = 1;

    /**
     * Unauthorized Debit Balance on Current Account
     */
    public const CNS_2 = 2;

    /**
     * Loan Transferred to Losses, 100% nonliquid, on balance sheet account
     */
    public const CNS_3 = 3;

    /**
     * Loan Written Off to Off-Balance Sheet Account
     */
    public const CNS_4 = 4;

    /**
     * Credit Reassigned to a New Borrower
     */
    public const CNS_5 = 5;

    /**
     * Blocked
     */
    public const CNS_6 = 6;

    /**
     * Increased Risk
     */
    public const CNS_7 = 7;

    /**
     * Cancelled Due to Delayed Payements
     */
    public const CNS_8 = 8;

    /**
     * Contract Status Is Not Negative
     */
    public const CNS_10 = 10;

    /**
     * Financial institution ceased to exist
     */
    public const CNS_11 = 11;

    /**
     * Financial institution does not have the technical opportunity to renew information
     */
    public const CNS_12 = 12;

    /**
     * Sale of credit to other creditor in connection with the change of credit politics of creditor
     */
    public const CNS_13 = 13;

    /**
     * (No description)
     * todo: find description for this id
     */
    public const CNS_14 = 14;

    /**
     * Financial institution does not have the technical opportunity to pass historical information, cumulative
     * information is given
     */
    public const CNS_15 = 15;

    /**
     * Credit is restructured
     */
    public const CNS_16 = 16;

    /**
     * Information about the credit is given by mistake
     */
    public const CNS_17 = 17;

    /**
     * Special terms of service in connection with mobilization of client
     */
    public const CNS_18 = 18;
}
