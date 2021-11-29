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
$GLOBALS['xoopsOption']['template_main'] = 'testmoduleupdate_testfields.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';

$op    = Request::getCmd('op', 'list');
$tfId = Request::getInt('tf_id', 0);
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('userpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
// Paths
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', \XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('testmoduleupdate_url', \TESTMODULEUPDATE_URL);
// Keywords
$keywords = [];
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_INDEX, 'link' => 'index.php'];
// Permissions
$permEdit = $permissionsHandler->getPermGlobalSubmit();
$GLOBALS['xoopsTpl']->assign('permEdit', $permEdit);
$GLOBALS['xoopsTpl']->assign('showItem', $tfId > 0);

switch ($op) {
    case 'show':
    case 'list':
    default:
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_TESTFIELDS_LIST];
        $ratingbars = (int)$helper->getConfig('ratingbars');
        if ($ratingbars > 0) {
            $GLOBALS['xoTheme']->addStylesheet(\TESTMODULEUPDATE_URL . '/assets/css/rating.css', null);
            $GLOBALS['xoopsTpl']->assign('rating', $ratingbars);
            $GLOBALS['xoopsTpl']->assign('rating_5stars', (Constants::RATING_5STARS === $ratingbars));
            $GLOBALS['xoopsTpl']->assign('rating_10stars', (Constants::RATING_10STARS === $ratingbars));
            $GLOBALS['xoopsTpl']->assign('rating_10num', (Constants::RATING_10NUM === $ratingbars));
            $GLOBALS['xoopsTpl']->assign('rating_likes', (Constants::RATING_LIKES === $ratingbars));
            $GLOBALS['xoopsTpl']->assign('itemid', 'tf_id');
            $GLOBALS['xoopsTpl']->assign('testmoduleupdate_icon_url_16', \TESTMODULEUPDATE_URL . '/' . $modPathIcon16);
        }
        $crTestfields = new \CriteriaCompo();
        if ($tfId > 0) {
            $crTestfields->add(new \Criteria('tf_id', $tfId));
        }
        $testfieldsCount = $testfieldsHandler->getCount($crTestfields);
        $GLOBALS['xoopsTpl']->assign('testfieldsCount', $testfieldsCount);
        if (0 === $tfId) {
            $crTestfields->setStart($start);
            $crTestfields->setLimit($limit);
        }
        $testfieldsAll = $testfieldsHandler->getAll($crTestfields);
        if ($testfieldsCount > 0) {
            $testfields = [];
            $tfText = '';
            // Get All Testfields
            foreach (\array_keys($testfieldsAll) as $i) {
                $testfields[$i] = $testfieldsAll[$i]->getValuesTestfields();
                $tfText = $testfieldsAll[$i]->getVar('tf_text');
                $keywords[$i] = $tfText;
                $testfields[$i]['rating'] = $ratingsHandler->getItemRating($testfieldsAll[$i]->getVar('tf_id'), Constants::TABLE_TESTFIELDS);
            }
            $GLOBALS['xoopsTpl']->assign('testfields', $testfields);
            unset($testfields);
            // Display Navigation
            if ($testfieldsCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($testfieldsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
            $GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
            $GLOBALS['xoopsTpl']->assign('panel_type', $helper->getConfig('panel_type'));
            $GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
            $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            if ('show' == $op && '' != $tfText) {
                $GLOBALS['xoopsTpl']->assign('xoops_pagetitle', \strip_tags($tfText . ' - ' . $GLOBALS['xoopsModule']->getVar('name')));
            }
            if ('show' == $op) {
                $testfieldsObj = $testfieldsHandler->get($tfId);
                $tfReads = (int)$testfieldsObj->getVar('tf_reads') + 1;
                $testfieldsObj->setVar('tf_reads', $tfReads);
                // Insert Data
                $testfieldsHandler->insert($testfieldsObj);
            }
        }
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('testfields.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        // Check permissions
        if (!$permissionsHandler->getPermGlobalSubmit()) {
            \redirect_header('testfields.php?op=list', 3, \_NOPERM);
        }
        if ($tfId > 0) {
            $testfieldsObj = $testfieldsHandler->get($tfId);
        } else {
            $testfieldsObj = $testfieldsHandler->create();
        }
        $uploaderErrors = '';
        $testfieldsObj->setVar('tf_text', Request::getString('tf_text', ''));
        $testfieldsObj->setVar('tf_textarea', Request::getString('tf_textarea', ''));
        $testfieldsObj->setVar('tf_dhtml', Request::getText('tf_dhtml', ''));
        $testfieldsObj->setVar('tf_checkbox', Request::getInt('tf_checkbox', 0));
        $testfieldsObj->setVar('tf_yesno', Request::getInt('tf_yesno', 0));
        $testfieldsObj->setVar('tf_selectbox', Request::getInt('tf_selectbox', 0));
        $testfieldsObj->setVar('tf_user', Request::getInt('tf_user', 0));
        $testfieldsObj->setVar('tf_color', Request::getString('tf_color', ''));
        // Set Var tf_imagelist
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploader = new \XoopsMediaUploader(\XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32', 
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            //$uploader->setPrefix(tf_imagelist_);
            //$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if ($uploader->upload()) {
                $testfieldsObj->setVar('tf_imagelist', $uploader->getSavedFileName());
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            $testfieldsObj->setVar('tf_imagelist', Request::getString('tf_imagelist'));
        }
        $testfieldsObj->setVar('tf_urlfile', formatURL($_REQUEST['tf_urlfile']));
        // Set Var tf_urlfile
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['tf_urlfile']['name'];
        $imgNameDef     = Request::getString('tf_text');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_FILES_PATH . '/testfields/', 
                                                    $helper->getConfig('mimetypes_file'), 
                                                    $helper->getConfig('maxsize_file'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][1])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][1]);
            if ($uploader->upload()) {
                $testfieldsObj->setVar('tf_urlfile', $uploader->getSavedFileName());
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $testfieldsObj->setVar('tf_urlfile', Request::getString('tf_urlfile'));
        }
        // Set Var tf_uplimage
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['tf_uplimage']['name'];
        $imgMimetype    = $_FILES['tf_uplimage']['type'];
        $imgNameDef     = Request::getString('tf_text');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/testfields/', 
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][2])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][2]);
            if ($uploader->upload()) {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Testmoduleupdate\Common\Resizer();
                    $imgHandler->sourceFile    = \TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/testfields/' . $savedFilename;
                    $imgHandler->endFile       = \TESTMODULEUPDATE_UPLOAD_IMAGE_PATH . '/testfields/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
                $testfieldsObj->setVar('tf_uplimage', $savedFilename);
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $testfieldsObj->setVar('tf_uplimage', Request::getString('tf_uplimage'));
        }
        // Set Var tf_uplfile
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['tf_uplfile']['name'];
        $imgNameDef     = Request::getString('tf_text');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_FILES_PATH . '/testfields/', 
                                                    $helper->getConfig('mimetypes_file'), 
                                                    $helper->getConfig('maxsize_file'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][3])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][3]);
            if ($uploader->upload()) {
                $testfieldsObj->setVar('tf_uplfile', $uploader->getSavedFileName());
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $testfieldsObj->setVar('tf_uplfile', Request::getString('tf_uplfile'));
        }
        $testfieldTextdateselectObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('tf_textdateselect'));
        $testfieldsObj->setVar('tf_textdateselect', $testfieldTextdateselectObj->getTimestamp());
        // Set Var tf_selectfile
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['tf_selectfile']['name'];
        $imgNameDef     = Request::getString('tf_text');
        $uploader = new \XoopsMediaUploader(\TESTMODULEUPDATE_UPLOAD_FILES_PATH . '/testfields/', 
                                                    $helper->getConfig('mimetypes_file'), 
                                                    $helper->getConfig('maxsize_file'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][4])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][4]);
            if ($uploader->upload()) {
                $testfieldsObj->setVar('tf_selectfile', $uploader->getSavedFileName());
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $testfieldsObj->setVar('tf_selectfile', Request::getString('tf_selectfile'));
        }
        $tfPassword = Request::getString('tf_password', '');
        if ('' !== $tfPassword) {
            $testfieldsObj->setVar('tf_password', password_hash($tfPassword, PASSWORD_DEFAULT));
        }
        $testfieldsObj->setVar('tf_country_list', Request::getString('tf_country_list', ''));
        $testfieldsObj->setVar('tf_language', Request::getString('tf_language', ''));
        $testfieldsObj->setVar('tf_radio', Request::getInt('tf_radio', 0));
        $testfieldsObj->setVar('tf_status', Request::getInt('tf_status', 0));
        $testfieldDatetimeArr = Request::getArray('tf_datetime');
        $testfieldDatetimeObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $testfieldDatetimeArr['date']);
        $testfieldDatetimeObj->setTime(0, 0, 0);
        $testfieldDatetime = $testfieldDatetimeObj->getTimestamp() + (int)$testfieldDatetimeArr['time'];
        $testfieldsObj->setVar('tf_datetime', $testfieldDatetime);
        $testfieldsObj->setVar('tf_combobox', Request::getInt('tf_combobox', 0));
        $testfieldsObj->setVar('tf_comments', Request::getInt('tf_comments', 0));
        $testfieldsObj->setVar('tf_ratings', Request::getFloat('tf_ratings', 0));
        $testfieldsObj->setVar('tf_votes', Request::getInt('tf_votes', 0));
        $testfieldsObj->setVar('tf_uuid', Request::getString('tf_uuid', ''));
        $testfieldsObj->setVar('tf_ip', Request::getString('tf_ip', ''));
        $testfieldsObj->setVar('tf_reads', Request::getInt('tf_reads', 0));
        // Insert Data
        if ($testfieldsHandler->insert($testfieldsObj)) {
            $newTfId = $tfId > 0 ? $tfId : $testfieldsObj->getNewInsertedIdTestfields();
            $grouppermHandler = \xoops_getHandler('groupperm');
            $mid = $GLOBALS['xoopsModule']->getVar('mid');
            // Permission to view_testfields
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_view_testfields', $newTfId);
            if (isset($_POST['groups_view_testfields'])) {
                foreach ($_POST['groups_view_testfields'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_view_testfields', $newTfId, $onegroupId, $mid);
                }
            }
            // Permission to submit_testfields
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_submit_testfields', $newTfId);
            if (isset($_POST['groups_submit_testfields'])) {
                foreach ($_POST['groups_submit_testfields'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_submit_testfields', $newTfId, $onegroupId, $mid);
                }
            }
            // Permission to approve_testfields
            $grouppermHandler->deleteByModule($mid, 'testmoduleupdate_approve_testfields', $newTfId);
            if (isset($_POST['groups_approve_testfields'])) {
                foreach ($_POST['groups_approve_testfields'] as $onegroupId) {
                    $grouppermHandler->addRight('testmoduleupdate_approve_testfields', $newTfId, $onegroupId, $mid);
                }
            }
            // Handle notification
            $tfText = $testfieldsObj->getVar('tf_text');
            $tfStatus = $testfieldsObj->getVar('tf_status');
            $tags = [];
            $tags['ITEM_NAME'] = $tfText;
            $tags['ITEM_URL']  = \XOOPS_URL . '/modules/testmoduleupdate/testfields.php?op=show&tf_id=' . $tfId;
            $notificationHandler = \xoops_getHandler('notification');
            if (Constants::STATUS_SUBMITTED == $tfStatus) {
                // Event approve notification
                $notificationHandler->triggerEvent('global', 0, 'global_approve', $tags);
                $notificationHandler->triggerEvent('testfields', $newTfId, 'testfield_approve', $tags);
            } else {
                if ($tfId > 0) {
                    // Event modify notification
                    $notificationHandler->triggerEvent('global', 0, 'global_modify', $tags);
                    $notificationHandler->triggerEvent('testfields', $newTfId, 'testfield_modify', $tags);
                } else {
                    // Event new notification
                    $notificationHandler->triggerEvent('global', 0, 'global_new', $tags);
                }
            }
            // redirect after insert
            if ('' !== $uploaderErrors) {
                \redirect_header('testfields.php?op=edit&tf_id=' . $newTfId, 5, $uploaderErrors);
            } else {
                \redirect_header('testfields.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_MA_TESTMODULEUPDATE_FORM_OK);
            }
        }
        // Get Form Error
        $GLOBALS['xoopsTpl']->assign('error', $testfieldsObj->getHtmlErrors());
        $form = $testfieldsObj->getFormTestfields();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'new':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_TESTFIELD_ADD];
        // Check permissions
        if (!$permissionsHandler->getPermGlobalSubmit()) {
            \redirect_header('testfields.php?op=list', 3, \_NOPERM);
        }
        // Form Create
        $testfieldsObj = $testfieldsHandler->create();
        $form = $testfieldsObj->getFormTestfields();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_TESTFIELD_EDIT];
        // Check permissions
        if (!$permissionsHandler->getPermGlobalSubmit()) {
            \redirect_header('testfields.php?op=list', 3, \_NOPERM);
        }
        // Check params
        if (0 == $tfId) {
            \redirect_header('testfields.php?op=list', 3, \_MA_TESTMODULEUPDATE_INVALID_PARAM);
        }
        // Get Form
        $testfieldsObj = $testfieldsHandler->get($tfId);
        $testfieldsObj->start = $start;
        $testfieldsObj->limit = $limit;
        $form = $testfieldsObj->getFormTestfields();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_TESTFIELD_CLONE];
        // Check permissions
        if (!$permissionsHandler->getPermGlobalSubmit()) {
            \redirect_header('testfields.php?op=list', 3, \_NOPERM);
        }
        // Request source
        $tfIdSource = Request::getInt('tf_id_source');
        // Check params
        if (0 == $tfIdSource) {
            \redirect_header('testfields.php?op=list', 3, \_MA_TESTMODULEUPDATE_INVALID_PARAM);
        }
        // Get Form
        $testfieldsObjSource = $testfieldsHandler->get($tfIdSource);
        $testfieldsObj = $testfieldsObjSource->xoopsClone();
        $form = $testfieldsObj->getFormTestfields();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_TESTFIELD_DELETE];
        // Check permissions
        if (!$permissionsHandler->getPermGlobalSubmit()) {
            \redirect_header('testfields.php?op=list', 3, \_NOPERM);
        }
        // Check params
        if (0 == $tfId) {
            \redirect_header('testfields.php?op=list', 3, \_MA_TESTMODULEUPDATE_INVALID_PARAM);
        }
        $testfieldsObj = $testfieldsHandler->get($tfId);
        $tfText = $testfieldsObj->getVar('tf_text');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('testfields.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($testfieldsHandler->delete($testfieldsObj)) {
                // Event delete notification
                $tags = [];
                $tags['ITEM_NAME'] = $tfText;
                $notificationHandler = \xoops_getHandler('notification');
                $notificationHandler->triggerEvent('global', 0, 'global_delete', $tags);
                $notificationHandler->triggerEvent('testfields', $tfId, 'testfield_delete', $tags);
                \redirect_header('testfields.php', 3, \_MA_TESTMODULEUPDATE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $testfieldsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'tf_id' => $tfId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_MA_TESTMODULEUPDATE_FORM_SURE_DELETE, $testfieldsObj->getVar('tf_text')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
    case 'broken':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TESTMODULEUPDATE_BROKEN];
        // Check params
        if (0 == $tfId) {
            \redirect_header('testfields.php?op=list', 3, \_MA_TESTMODULEUPDATE_INVALID_PARAM);
        }
        $testfieldsObj = $testfieldsHandler->get($tfId);
        $tfText = $testfieldsObj->getVar('tf_text');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('testfields.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            $testfieldsObj->setVar('tf_status', Constants::STATUS_BROKEN);
            if ($testfieldsHandler->insert($testfieldsObj)) {
                // Event broken notification
                $tags = [];
                $tags['ITEM_NAME'] = $tfText;
                $tags['ITEM_URL']  = \XOOPS_URL . '/modules/testmoduleupdate/testfields.php?op=show&tf_id=' . $tfId;
                $notificationHandler = \xoops_getHandler('notification');
                $notificationHandler->triggerEvent('global', 0, 'global_broken', $tags);
                $notificationHandler->triggerEvent('testfields', $tfId, 'testfield_broken', $tags);
                \redirect_header('testfields.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_MA_TESTMODULEUPDATE_FORM_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $testfieldsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'tf_id' => $tfId, 'start' => $start, 'limit' => $limit, 'op' => 'broken'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_MA_TESTMODULEUPDATE_FORM_SURE_BROKEN, $testfieldsObj->getVar('tf_text')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}

// Keywords
testmoduleupdateMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);

// Description
testmoduleupdateMetaDescription(\_MA_TESTMODULEUPDATE_TESTFIELDS_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', \TESTMODULEUPDATE_URL.'/testfields.php');
$GLOBALS['xoopsTpl']->assign('testmoduleupdate_upload_url', \TESTMODULEUPDATE_UPLOAD_URL);

// View comments
require_once \XOOPS_ROOT_PATH . '/include/comment_view.php';

require __DIR__ . '/footer.php';
