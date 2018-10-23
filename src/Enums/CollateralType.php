<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class CollateralType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static R_11()
 * @method static static R_12()
 * @method static static R_13()
 * @method static static R_14()
 * @method static static R_15()
 * @method static static R_16()
 * @method static static R_18()
 * @method static static R_19()
 * @method static static R_20()
 * @method static static R_21()
 * @method static static R_22()
 * @method static static R_23()
 * @method static static R_24()
 * @method static static R_25()
 * @method static static R_26()
 * @method static static R_27()
 * @method static static R_28()
 * @method static static R_29()
 * @method static static R_30()
 * @method static static R_31()
 * @method static static R_32()
 * @method static static R_33()
 * @method static static R_34()
 * @method static static R_35()
 * @method static static R_36()
 * @method static static R_37()
 * @method static static R_38()
 * @method static static R_39()
 * @method static static R_40()
 * @method static static R_41()
 * @method static static R_42()
 * @method static static R_43()
 * @method static static R_44()
 * @method static static R_45()
 * @method static static R_50()
 * @method static static R_51()
 * @method static static R_52()
 * @method static static R_53()
 * @method static static R_54()
 * @method static static R_55()
 * @method static static R_56()
 * @method static static R_57()
 * @method static static R_58()
 * @method static static R_59()
 * @method static static R_60()
 * @method static static R_61()
 * @method static static R_62()
 * @method static static R_63()
 * @method static static R_64()
 * @method static static R_65()
 * @method static static R_90()
 * @method static static R_91()
 *
 * @todo: must be implement as separated package with standardized collateral types
 * @todo: refactor constants' names
 */
final class CollateralType extends Enum implements NullableEnum
{
    /**
     * Undefined
     *
     * Same as UNDEFINED()
     */
    public const R_0 = 0;

    /**
     * Guarantees of the Cabinet of Ministers
     */
    public const R_11 = 11;

    /**
     * Guarantees of the National Bank of Ukraine
     */
    public const R_12 = 12;

    /**
     * Guarantees of international banks and "investment class" banks
     */
    public const R_13 = 13;

    /**
     * Guarantees of other banks in Ukraine
     */
    public const R_14 = 14;

    /**
     * Property rights to cash deposits and registered money certificates
     */
    public const R_15 = 15;

    /**
     * Guarantees of the governments of countries and banks rated at least "A"
     */
    public const R_16 = 16;

    /**
     * Property rights to cash placed on a deposit account with a bank with a rating not lower than the "investment
     * class"
     */
    public const R_18 = 18;

    /**
     * Securities issued by the National Bank of Ukraine
     */
    public const R_19 = 19;

    /**
     * Bonds of the state mortgage institution, placement of which was carried out under the guarantee of the Cabinet
     * of Ministers of Ukraine
     */
    public const R_20 = 20;

    /**
     * Bank metals
     */
    public const R_21 = 21;

    /**
     * Precious metals
     */
    public const R_22 = 22;

    /**
     * Government securities
     */
    public const R_23 = 23;

    /**
     * Non-government securities
     */
    public const R_24 = 24;

    /**
     * Real estate
     */
    public const R_25 = 25;

    /**
     * Property rights to the future real estate
     */
    public const R_26 = 26;

    /**
     * Finished products
     */
    public const R_27 = 27;

    /**
     * Stock-in-trade
     */
    public const R_28 = 28;

    /**
     * Motor transport
     */
    public const R_29 = 29;

    /**
     * Other movable state
     */
    public const R_30 = 30;

    /**
     * Other real estate
     */
    public const R_31 = 31;

    /**
     * Property rights to other collateral objects
     */
    public const R_32 = 32;

    /**
     * Other types of collateral
     */
    public const R_33 = 33;

    /**
     * Guarantee
     */
    public const R_34 = 34;

    /**
     * Light vehicles
     */
    public const R_35 = 35;

    /**
     * The money cover, which is placed in the bank for a period not less than the period of using the asset
     */
    public const R_36 = 36;

    /**
     * Real estate (except for housing)
     */
    public const R_37 = 37;

    /**
     * Transport vehicles (except light cars)
     */
    public const R_38 = 38;

    /**
     * Mortgage bonds
     */
    public const R_39 = 39;

    /**
     * Several types of collateral
     */
    public const R_40 = 40;

    /**
     * Several types of security, among which the cost of real estate is the largest
     */
    public const R_41 = 41;

    /**
     * Several types of security, among which the value of property rights for the future real estate of the housing
     * stock - the largest
     */
    public const R_42 = 42;

    /**
     * Several types of collateral, among which the value of other real estate is the largest
     */
    public const R_43 = 43;

    /**
     * Several types of collateral, among which the value of property rights for another future real estate is the
     * largest
     */
    public const R_44 = 44;

    /**
     * Several types of collateral, among which the cost of a mortgage is less than the value of other types of
     * collateral
     */
    public const R_45 = 45;

    /**
     * Objects of integral property complex
     */
    public const R_50 = 50;

    /**
     * Equipment
     */
    public const R_51 = 51;

    /**
     * Securities that are entered in the exchange register
     */
    public const R_52 = 52;

    /**
     * Securities issued by local authorities
     */
    public const R_53 = 53;

    /**
     * Investment certificates
     */
    public const R_54 = 54;

    /**
     * Biological assets
     */
    public const R_55 = 55;

    /**
     * Property rights to property that will belong to a non-housing fund
     */
    public const R_56 = 56;

    /**
     * Government securities on repo transactions
     */
    public const R_57 = 57;

    /**
     * Mortgage bonds issued by a financial institution with more than 50 percent of corporate rights owned by the
     * state and / or state banks
     */
    public const R_58 = 58;

    /**
     * Nominal savings (deposit) certificates issued by the creditor bank, property rights to money placed on a deposit
     * account with a creditor bank for a period not less than the period of using the asset
     */
    public const R_59 = 59;

    /**
     * Guarantees of banks of Ukraine, secured by a cash cover for a period not less than the period of using the asset
     */
    public const R_60 = 60;

    /**
     * The guarantees of the governments of countries that have a credit rating are not lower than the A-
     */
    public const R_61 = 61;

    /**
     * Guarantees of banks and other institutions that have a credit rating are not lower than A-
     */
    public const R_62 = 62;

    /**
     * Guarantees of international multilateral banks
     */
    public const R_63 = 63;

    /**
     * The guarantees of the governments of countries that have a credit rating are not lower than the BBB-
     */
    public const R_64 = 64;

    /**
     * Guarantees of banks that have a credit rating are not lower than BBB-
     */
    public const R_65 = 65;

    /**
     * Without collateral (blank)
     */
    public const R_90 = 90;
}
