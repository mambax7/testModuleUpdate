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
use XoopsModules\Testmoduleupdate\Common;

require __DIR__ . '/header.php';
// Get all request values
$op = Request::getCmd('op', 'list');
$artId = Request::getInt('art_id');
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'testmoduleupdate_admin_articles.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('articles.php'));
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_ADD_ARTICLE, 'articles.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $articlesCount = $articlesHandler->getCountArticles();
        $articlesAll = $articlesHandler->getAllArticles($start, $limit);
        $GLOBALS['xoopsTpl']->assign('articles_count', $articlesCount);
        $GLOBALS['xoopsTpl']->assign('testmoduleupdate_url', \TESTMODULEUPDATE_URL);
        $GLOBALS['xoopsTpl']->assign('testmoduleupdate_upload_url', \TESTMODULEUPDATE_UPLOAD_URL);
        // Table view articles
        if ($articlesCount > 0) {
            foreach (\array_keys($articlesAll) as $i) {
                $article = $articlesAll[$i]->getValuesArticles();
                $GLOBALS['xoopsTpl']->append('articles_list', $article);
                unset($article);
            }
            // Display Navigation
            if ($articlesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($articlesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_TESTMODULEUPDATE_THEREARENT_ARTICLES);
        }
        break;
    case 'new':
        $templateMain = 'testmoduleupdate_admin_articles.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('articles.php'));
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_LIST_ARTICLES, 'articles.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $articlesObj = $articlesHandler->create();
        $form = $articlesObj->getFormArticles();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        $templateMain = 'testmoduleupdate_admin_articles.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('articles.php'));
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_LIST_ARTICLES, 'articles.php', 'list');
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_ADD_ARTICLE, 'articles.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $artIdSource = Request::getInt('art_id_source');
        // Get Form
        $articlesObjSource = $articlesHandler->get($artIdSource);
        $articlesObj = $articlesObjSource->xoopsClone();
        $form = $articlesObj->getFormArticles();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('articles.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($artId > 0) {
            $articlesObj = $articlesHandler->get($artId);
        } else {
            $articlesObj = $articlesHandler->create();
        }
        // Set Vars
        $uploaderErrors = '';
        $articlesObj->setVar('art_cat', Request::getInt('art_cat', 0));
        $articlesObj->setVar('art_title', Request::getString('art_title', ''));
        $articlesObj->setVar('art_descr', Request::getText('art_descr', ''));
        // Set Var art_img
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['art_img']['name'];
        $imgMimetype    = $_FILES['art_img']['type'];
        $imgNameDef     = Request::getString('art_title');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/articles/', 
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if ($uploader->upload()) {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Testmoduleupdate\Common\Resizer();
                    $imgHandler->sourceFile    = \TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/articles/' . $savedFilename;
                    $imgHandler->endFile       = \TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/articles/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
                $articlesObj->setVar('art_img', $savedFilename);
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $articlesObj->setVar('art_img', Request::getString('art_img'));
        }
        $articlesObj->setVar('art_status', Request::getInt('art_status', 0));
        // Set Var art_file
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['art_file']['name'];
        $imgNameDef     = Request::getString('art_title');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_FILES_PATH . '/articles/', 
                                                    $helper->getConfig('mimetypes_file'), 
                                                    $helper->getConfig('maxsize_file'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][1])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][1]);
            if ($uploader->upload()) {
                $articlesObj->setVar('art_file', $uploader->getSavedFileName());
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $articlesObj->setVar('art_file', Request::getString('art_file'));
        }
        $articlesObj->setVar('art_ratings', Request::getFloat('art_ratings', 0));
        $articlesObj->setVar('art_votes', Request::getInt('art_votes', 0));
        $articleCreatedObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('art_created'));
        $articlesObj->setVar('art_created', $articleCreatedObj->getTimestamp());
        $articlesObj->setVar('art_submitter', Request::getInt('art_submitter', 0));
        // Insert Data
        if ($articlesHandler->insert($articlesObj)) {
            $newArtId = $articlesObj->getNewInsertedIdArticles();
            $permId = isset($_REQUEST['art_id']) ? $artId : $newArtId;
            $grouppermHandler = \xoops_getHandler('groupperm');
            $mid = $GLOBALS['xoopsModule']->getVar('mid');
            // Permission to view_articles
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_view_articles', $permId);
            if (isset($_POST['groups_view_articles'])) {
                foreach ($_POST['groups_view_articles'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_view_articles', $permId, $onegroupId, $mid);
                }
            }
            // Permission to submit_articles
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_submit_articles', $permId);
            if (isset($_POST['groups_submit_articles'])) {
                foreach ($_POST['groups_submit_articles'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_submit_articles', $permId, $onegroupId, $mid);
                }
            }
            // Permission to approve_articles
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_approve_articles', $permId);
            if (isset($_POST['groups_approve_articles'])) {
                foreach ($_POST['groups_approve_articles'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_approve_articles', $permId, $onegroupId, $mid);
                }
            }
            if ('' !== $uploaderErrors) {
                \redirect_header('articles.php?op=edit&art_id=' . $artId, 5, $uploaderErrors);
            } else {
                \redirect_header('articles.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_TESTMODULEUPDATE_FORM_OK);
            }
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $articlesObj->getHtmlErrors());
        $form = $articlesObj->getFormArticles();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'testmoduleupdate_admin_articles.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('articles.php'));
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_ADD_ARTICLE, 'articles.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_TESTMODULEUPDATE_LIST_ARTICLES, 'articles.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $articlesObj = $articlesHandler->get($artId);
        $articlesObj->start = $start;
        $articlesObj->limit = $limit;
        $form = $articlesObj->getFormArticles();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'testmoduleupdate_admin_articles.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('articles.php'));
        $articlesObj = $articlesHandler->get($artId);
        $artTitle = $articlesObj->getVar('art_title');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('articles.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($articlesHandler->delete($articlesObj)) {
                \redirect_header('articles.php', 3, \_AM_TESTMODULEUPDATE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $articlesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'art_id' => $artId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_TESTMODULEUPDATE_FORM_SURE_DELETE, $articlesObj->getVar('art_title')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
