<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class ContractNegativeStatus
 * @package Wearesho\Pvbki\Enums
 *
 * @method static ContractNegativeStatus NONE()
 * @method static ContractNegativeStatus CREDIT_ASSIGNMENT_TO_THIRD_PARTY()
 * @method static ContractNegativeStatus UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT()
 * @method static ContractNegativeStatus LOAN_TRANSFERRED_TO_LOSSES()
 * @method static ContractNegativeStatus LOAN_WRITTEN_OFF()
 * @method static ContractNegativeStatus CREDIT_REASSIGNED_TO_NEW_BORROWER()
 * @method static ContractNegativeStatus BLOCKED()
 * @method static ContractNegativeStatus INCREASED_RISK()
 * @method static ContractNegativeStatus CANCELLED_DUE_TO_DELAYED_PAYMENTS()
 * @method static ContractNegativeStatus CONTRACT_STATUS_IS_NOT_NEGATIVE()
 * @method static ContractNegativeStatus FINANCIAL_INSTITUTION_CEASED_TO_EXIST()
 * @method static ContractNegativeStatus DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_RENEW_INFORMATION()
 * @method static ContractNegativeStatus SALE_OF_CREDIT()
 * @method static ContractNegativeStatus CNS_14()
 * @method static ContractNegativeStatus DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_PASS_HISTORICAL_INFORMATION()
 * @method static ContractNegativeStatus CREDIT_IS_RESTRUCTURED()
 * @method static ContractNegativeStatus INFORMATION_ABOUT_THE_CREDIT_IS_GIVEN_BY_MISTAKE()
 * @method static ContractNegativeStatus SPECIAL_TERMS()
 */
final class ContractNegativeStatus extends Enum implements NullableEnum
{
    public const NONE = 0;

    public const CREDIT_ASSIGNMENT_TO_THIRD_PARTY = 1;

    public const UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT = 2;

    /**
     * Loan Transferred to Losses, 100% nonliquid, on balance sheet account
     */
    public const LOAN_TRANSFERRED_TO_LOSSES = 3;

    /**
     * Loan Written Off to Off-Balance Sheet Account
     */
    public const LOAN_WRITTEN_OFF = 4;

    /**
     * Credit Reassigned to a New Borrower
     */
    public const CREDIT_REASSIGNED_TO_NEW_BORROWER = 5;

    public const BLOCKED = 6;

    public const INCREASED_RISK = 7;

    public const CANCELLED_DUE_TO_DELAYED_PAYMENTS = 8;

    public const CONTRACT_STATUS_IS_NOT_NEGATIVE = 10;

    public const FINANCIAL_INSTITUTION_CEASED_TO_EXIST = 11;

    /**
     * Financial institution does not have the technical opportunity to renew information
     */
    public const DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_RENEW_INFORMATION = 12;

    /**
     * Sale of credit to other creditor in connection with the change of credit politics of creditor
     */
    public const SALE_OF_CREDIT = 13;

    /**
     * (No description)
     * todo: find description for this id
     */
    public const CNS_14 = 14;

    /**
     * Financial institution does not have the technical opportunity to pass historical information, cumulative
     * information is given
     */
    public const DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_PASS_HISTORICAL_INFORMATION = 15;

    public const CREDIT_IS_RESTRUCTURED = 16;

    public const INFORMATION_ABOUT_THE_CREDIT_IS_GIVEN_BY_MISTAKE = 17;

    /**
     * Special terms of service in connection with mobilization of client
     */
    public const SPECIAL_TERMS = 18;
}
