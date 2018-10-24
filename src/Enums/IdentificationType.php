<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class IdentificationType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static IdentificationType UNIQUE_NUMBER()
 * @method static IdentificationType TAX_ID()
 * @method static IdentificationType COMPOSITE_KEY()
 * @method static IdentificationType PASSPORT()
 * @method static IdentificationType I_5()
 * @method static IdentificationType PERMIT_FOR_PERMANENT_RESIDENCE()
 * @method static IdentificationType TRAVELING_PASSPORT()
 * @method static IdentificationType CERTIFICATE_OBLIGATORY_INSURANCE_NUMBER()
 * @method static IdentificationType MARRIAGE_CERTIFICATE()
 * @method static IdentificationType BIRTH_CERTIFICATE()
 * @method static IdentificationType DOCUMENTS_LACK()
 * @method static IdentificationType STATE_NUMBER_REGISTRATION_RECORD()
 * @method static IdentificationType REGISTRATION_COMPANY_NUMBER()
 * @method static IdentificationType INTERNATIONAL_PASSPORT()
 * @method static IdentificationType TEMPORARY_IDENTITY_CARD_OF_UKRAINE()
 */
final class IdentificationType extends Enum implements NullableEnum
{
    public const UNIQUE_NUMBER = 1;
    public const TAX_ID = 2;
    public const COMPOSITE_KEY = 3;
    public const PASSPORT = 4;
    public const I_5 = 5;
    public const PERMIT_FOR_PERMANENT_RESIDENCE = 6;
    public const TRAVELING_PASSPORT = 7;
    public const CERTIFICATE_OBLIGATORY_INSURANCE_NUMBER = 8;
    public const MARRIAGE_CERTIFICATE = 9;
    public const BIRTH_CERTIFICATE = 10;
    public const DOCUMENTS_LACK = 11;
    public const STATE_NUMBER_REGISTRATION_RECORD = 12;
    public const REGISTRATION_COMPANY_NUMBER = 13;
    public const INTERNATIONAL_PASSPORT = 14;
    public const TEMPORARY_IDENTITY_CARD_OF_UKRAINE = 15;
}
