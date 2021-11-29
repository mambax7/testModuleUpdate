<?php

declare(strict_types=1);

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

$dirname       = \basename(\dirname(__DIR__));
$moduleHandler = \xoops_getHandler('module');
$xoopsModule   = XoopsModule::getByDirname($dirname);
$moduleInfo    = $moduleHandler->get($xoopsModule->getVar('mid'));
$sysPathIcon32 = $moduleInfo->getInfo('sysicons32');

$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU1,
    'link' => 'admin/index.php',
    'icon' => $sysPathIcon32.'/dashboard.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU2,
    'link' => 'admin/categories.php',
    'icon' => 'assets/icons/32/category.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU3,
    'link' => 'admin/articles.php',
    'icon' => 'assets/icons/32/penguin.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU4,
    'link' => 'admin/testfields.php',
    'icon' => 'assets/icons/32/alert.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU5,
    'link' => 'admin/broken.php',
    'icon' => $sysPathIcon32.'/brokenlink.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU6,
    'link' => 'admin/permissions.php',
    'icon' => $sysPathIcon32.'/permissions.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU7,
    'link' => 'admin/clone.php',
    'icon' => $sysPathIcon32.'/page_copy.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ADMENU8,
    'link' => 'admin/feedback.php',
    'icon' => $sysPathIcon32.'/mail_foward.png',
];
$adminmenu[] = [
    'title' => \_MI_TESTMODULEUPDATE_ABOUT,
    'link' => 'admin/about.php',
    'icon' => $sysPathIcon32.'/about.png',
];
