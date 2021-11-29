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

use Xmf\Request;
use XoopsModules\Testmoduleupdate;
use XoopsModules\Testmoduleupdate\Constants;

require __DIR__ . '/header.php';
require_once \XOOPS_ROOT_PATH . '/header.php';
$artId = Request::getInt('art_id');
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
if (empty($artId)) {
    \redirect_header(\TESTMODULEUPDATE_URL . '/index.php', 2, \_MA_TESTMODULEUPDATE_INVALID_PARAM);
}
// Get Instance of Handler
$articlesHandler = $helper->getHandler('Articles');
$grouppermHandler = \xoops_getHandler('groupperm');
// Verify that the article is published
$articles = $articlesHandler->get($artId);
// Verify permissions
if (!$grouppermHandler->checkRight('testmoduleupdate_view', $artId->getVar('art_id'), $groups, $GLOBALS['xoopsModule']->getVar('mid'))) {
    \redirect_header(\TESTMODULEUPDATE_URL . '/index.php', 3, \_NOPERM);
    exit();
}
$article = $articles->getValuesArticles();
$GLOBALS['xoopsTpl']->append('articles_list', $article);

$GLOBALS['xoopsTpl']->assign('xoops_sitename', $GLOBALS['xoopsConfig']['sitename']);
$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', \strip_tags($articles->getVar('art_title') . ' - ' . \_MA_TESTMODULEUPDATE_PRINT . ' - ' . $GLOBALS['xoopsModule']->getVar('name')));
$GLOBALS['xoopsTpl']->display('db:articles_print.tpl');
