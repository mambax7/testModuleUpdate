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
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', \XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', \XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}
\define('TESTMODULEUPDATE_DIRNAME', 'testmoduleupdate');
\define('TESTMODULEUPDATE_PATH', \XOOPS_ROOT_PATH . '/modules/' . \TESTMODULEUPDATE_DIRNAME);
\define('TESTMODULEUPDATE_URL', \XOOPS_URL . '/modules/' . \TESTMODULEUPDATE_DIRNAME);
\define('TESTMODULEUPDATE_ICONS_PATH', \TESTMODULEUPDATE_PATH . '/assets/icons');
\define('TESTMODULEUPDATE_ICONS_URL', \TESTMODULEUPDATE_URL . '/assets/icons');
\define('TESTMODULEUPDATE_IMAGE_PATH', \TESTMODULEUPDATE_PATH . '/assets/images');
\define('TESTMODULEUPDATE_IMAGE_URL', \TESTMODULEUPDATE_URL . '/assets/images');
\define('TESTMODULEUPDATE_UPLOAD_PATH', \XOOPS_UPLOAD_PATH . '/' . \TESTMODULEUPDATE_DIRNAME);
\define('TESTMODULEUPDATE_UPLOAD_URL', \XOOPS_UPLOAD_URL . '/' . \TESTMODULEUPDATE_DIRNAME);
\define('TESTMODULEUPDATE_UPLOAD_FILES_PATH', \TESTMODULEUPDATE_UPLOAD_PATH . '/files');
\define('TESTMODULEUPDATE_UPLOAD_FILES_URL', \TESTMODULEUPDATE_UPLOAD_URL . '/files');
\define('TESTMODULEUPDATE_UPLOAD_IMAGE_PATH', \TESTMODULEUPDATE_UPLOAD_PATH . '/images');
\define('TESTMODULEUPDATE_UPLOAD_IMAGE_URL', \TESTMODULEUPDATE_UPLOAD_URL . '/images');
\define('TESTMODULEUPDATE_UPLOAD_SHOTS_PATH', \TESTMODULEUPDATE_UPLOAD_PATH . '/images/shots');
\define('TESTMODULEUPDATE_UPLOAD_SHOTS_URL', \TESTMODULEUPDATE_UPLOAD_URL . '/images/shots');
\define('TESTMODULEUPDATE_ADMIN', \TESTMODULEUPDATE_URL . '/admin/index.php');
$localLogo = \TESTMODULEUPDATE_IMAGE_URL . '/tdmxoops_logo.png';
// Module Information
$copyright = "<a href='https://xoops.org' title='XOOPS Project' target='_blank'><img src='" . $localLogo . "' alt='XOOPS Project' ></a>";
require_once \XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
require_once \TESTMODULEUPDATE_PATH . '/include/functions.php';
