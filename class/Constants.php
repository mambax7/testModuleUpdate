<?php

declare(strict_types=1);


namespace XoopsModules\Testmoduleupdate;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * TestModuleUpdate module for xoops
 *
 * @copyright    2021 XOOPS Project (https://xoops.org)
 * @license      GPL 2.0 or later
 * @package      testmoduleupdate
 * @since        1.0.0
 * @min_xoops    2.5.11 Beta1
 * @author       TDM XOOPS - Email:info@email.com - Website:https://xoops.org
 */

/**
 * Interface  Constants
 */
interface Constants
{
    // Constants for tables
    public const TABLE_CATEGORIES = 0;
    public const TABLE_ARTICLES = 1;
    public const TABLE_TESTFIELDS = 2;

    // Constants for status
    public const STATUS_NONE      = 0;
    public const STATUS_OFFLINE   = 1;
    public const STATUS_SUBMITTED = 2;
    public const STATUS_APPROVED  = 3;
    public const STATUS_BROKEN    = 4;

    // Constants for permissions
    public const PERM_GLOBAL_NONE    = 0;
    public const PERM_GLOBAL_VIEW    = 1;
    public const PERM_GLOBAL_SUBMIT  = 2;
    public const PERM_GLOBAL_APPROVE = 3;

    // Constants for rating
    public const RATING_NONE     = 0;
    public const RATING_5STARS   = 1;
    public const RATING_10STARS  = 2;
    public const RATING_LIKES    = 3;
    public const RATING_10NUM    = 4;

}
