<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class CommunicationType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static CommunicationType HOME()
 * @method static CommunicationType OFFICE()
 * @method static CommunicationType MOBILE()
 * @method static CommunicationType FAX()
 * @method static CommunicationType MAIL()
 * @method static CommunicationType WEB()
 */
final class CommunicationType extends Enum implements NullableEnum
{
    public const HOME = 1;
    public const OFFICE = 2;
    public const MOBILE = 3;
    public const FAX = 4;
    public const MAIL = 5;
    public const WEB = 6;
}
