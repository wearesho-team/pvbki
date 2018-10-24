<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class PaymentMethod
 * @package Wearesho\Pvbki\Enums
 *
 * @method static PaymentMethod CURRENT_ACCOUNT_DEBIT()
 * @method static PaymentMethod EXCHANGE_BILL()
 * @method static PaymentMethod BANKING_RECEIPT()
 * @method static PaymentMethod DIRECT_REMITTANCE()
 * @method static PaymentMethod AUTHORIZATION_TO_DIRECT_CURRENT_ACCOUNT_DEBIT()
 * @method static PaymentMethod UNDETERMINED()
 * @method static PaymentMethod METHOD_OF_OVERDUE_CALCULATION_LIFO()
 * @method static PaymentMethod METHOD_OF_OVERDUE_CALCULATION_FIFO()
 */
final class PaymentMethod extends Enum implements NullableEnum
{
    public const CURRENT_ACCOUNT_DEBIT = 1;
    public const EXCHANGE_BILL = 2;
    public const BANKING_RECEIPT = 3;
    public const DIRECT_REMITTANCE = 4;
    public const AUTHORIZATION_TO_DIRECT_CURRENT_ACCOUNT_DEBIT = 5;
    public const UNDETERMINED = 6;
    public const METHOD_OF_OVERDUE_CALCULATION_LIFO = 7;
    public const METHOD_OF_OVERDUE_CALCULATION_FIFO = 8;
}
