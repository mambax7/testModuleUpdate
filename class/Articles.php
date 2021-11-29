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

use XoopsModules\Testmoduleupdate;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Articles
 */
class Articles extends \XoopsObject
{
    /**
     * @var int
     */
    public $start = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('art_id', \XOBJ_DTYPE_INT);
        $this->initVar('art_cat', \XOBJ_DTYPE_INT);
        $this->initVar('art_title', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('art_descr', \XOBJ_DTYPE_OTHER);
        $this->initVar('art_img', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('art_status', \XOBJ_DTYPE_INT);
        $this->initVar('art_file', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('art_ratings', \XOBJ_DTYPE_DECIMAL);
        $this->initVar('art_votes', \XOBJ_DTYPE_INT);
        $this->initVar('art_created', \XOBJ_DTYPE_INT);
        $this->initVar('art_submitter', \XOBJ_DTYPE_INT);
    }

    /**
     * @static function &getInstance
     *
     * @param null
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdArticles()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormArticles($action = false)
    {
        $helper = \XoopsModules\Testmoduleupdate\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Permissions for uploader
        $grouppermHandler = \xoops_getHandler('groupperm');
        $groups = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : \XOOPS_GROUP_ANONYMOUS;
        $permissionUpload = $grouppermHandler->checkRight('upload_groups', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_TESTMODULEUPDATE_ARTICLE_ADD) : \sprintf(\_AM_TESTMODULEUPDATE_ARTICLE_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Use tag module
        $dirTag = \is_dir(\XOOPS_ROOT_PATH . '/modules/tag') ? true : false;
        if (($helper->getConfig('usetag') == 1) && $dirTag) {
            $tagId = $this->isNew() ? 0 : $this->getVar('art_id');
            require_once \XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
            $form->addElement(new \XoopsFormTag('tag', 60, 255, $tagId, 0), true);
        }
        // Form Table categories
        $categoriesHandler = $helper->getHandler('Categories');
        $artCatSelect = new \XoopsFormSelect(\_AM_TESTMODULEUPDATE_ARTICLE_CAT, 'art_cat', $this->getVar('art_cat'));
        $artCatSelect->addOptionArray($categoriesHandler->getList());
        $form->addElement($artCatSelect, true);
        // Form Text artTitle
        $form->addElement(new \XoopsFormText(\_AM_TESTMODULEUPDATE_ARTICLE_TITLE, 'art_title', 50, 255, $this->getVar('art_title')), true);
        // Form Editor DhtmlTextArea artDescr
        $editorConfigs = [];
        if ($isAdmin) {
            $editor = $helper->getConfig('editor_admin');
        } else {
            $editor = $helper->getConfig('editor_user');
        }
        $editorConfigs['name'] = 'art_descr';
        $editorConfigs['value'] = $this->getVar('art_descr', 'e');
        $editorConfigs['rows'] = 5;
        $editorConfigs['cols'] = 40;
        $editorConfigs['width'] = '100%';
        $editorConfigs['height'] = '400px';
        $editorConfigs['editor'] = $editor;
        $form->addElement(new \XoopsFormEditor(\_AM_TESTMODULEUPDATE_ARTICLE_DESCR, 'art_descr', $editorConfigs), true);
        // Form Image artImg
        // Form Image artImg: Select Uploaded Image 
        $getArtImg = $this->getVar('art_img');
        $artImg = $getArtImg ?: 'blank.gif';
        $imageDirectory = '/uploads/testmoduleupdate/images/articles';
        $imageTray = new \XoopsFormElementTray(\_AM_TESTMODULEUPDATE_ARTICLE_IMG, '<br>');
        $imageSelect = new \XoopsFormSelect(\sprintf(\_AM_TESTMODULEUPDATE_ARTICLE_IMG_UPLOADS, ".{$imageDirectory}/"), 'art_img', $artImg, 5);
        $imageArray = \XoopsLists::getImgListAsArray( \XOOPS_ROOT_PATH . $imageDirectory );
        foreach ($imageArray as $image1) {
            $imageSelect->addOption(($image1), $image1);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_art_img\", \"art_img\", \"" . $imageDirectory . '", "", "' . \XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect, false);
        $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . \XOOPS_URL . '/' . $imageDirectory . '/' . $artImg . "' id='imglabel_art_img' alt='' style='max-width:100px' >"));
        // Form Image artImg: Upload new image
        if ($permissionUpload) {
            $maxsize = $helper->getConfig('maxsize_image');
            $imageTray->addElement(new \XoopsFormFile('<br>' . \_AM_TESTMODULEUPDATE_FORM_UPLOAD_NEW, 'art_img', $maxsize));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE_MB));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTMODULEUPDATE_FORM_UPLOAD_IMG_WIDTH, $helper->getConfig('maxwidth_image') . ' px'));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTMODULEUPDATE_FORM_UPLOAD_IMG_HEIGHT, $helper->getConfig('maxheight_image') . ' px'));
        } else {
            $imageTray->addElement(new \XoopsFormHidden('art_img', $artImg));
        }
        $form->addElement($imageTray);
        // Form Select Status artStatus
        $permissionsHandler = $helper->getHandler('Permissions');
        $artStatusSelect = new \XoopsFormSelect(\_AM_TESTMODULEUPDATE_ARTICLE_STATUS, 'art_status', $this->getVar('art_status'));
        $artStatusSelect->addOption(Constants::STATUS_NONE, \_AM_TESTMODULEUPDATE_STATUS_NONE);
        $artStatusSelect->addOption(Constants::STATUS_OFFLINE, \_AM_TESTMODULEUPDATE_STATUS_OFFLINE);
        $artStatusSelect->addOption(Constants::STATUS_SUBMITTED, \_AM_TESTMODULEUPDATE_STATUS_SUBMITTED);
        if ($permissionsHandler->getPermGlobalApprove()) {
            $artStatusSelect->addOption(Constants::STATUS_APPROVED, \_AM_TESTMODULEUPDATE_STATUS_APPROVED);
        }
        $artStatusSelect->addOption(Constants::STATUS_BROKEN, \_AM_TESTMODULEUPDATE_STATUS_BROKEN);
        $form->addElement($artStatusSelect, true);
        // Form File: Upload artFile
        $artFile = $this->isNew() ? '' : $this->getVar('art_file');
        if ($permissionUpload) {
            $fileUploadTray = new \XoopsFormElementTray(\_AM_TESTMODULEUPDATE_ARTICLE_FILE, '<br>');
            $fileDirectory = '/uploads/testmoduleupdate/files/articles';
            if (!$this->isNew()) {
                $fileUploadTray->addElement(new \XoopsFormLabel(\sprintf(\_AM_TESTMODULEUPDATE_ARTICLE_FILE_UPLOADS, ".{$fileDirectory}/"), $artFile));
            }
            $maxsize = $helper->getConfig('maxsize_file');
            $fileUploadTray->addElement(new \XoopsFormFile('', 'art_file', $maxsize));
            $fileUploadTray->addElement(new \XoopsFormLabel(\_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE_MB));
            $form->addElement($fileUploadTray);
        } else {
            $form->addElement(new \XoopsFormHidden('art_file', $artFile));
        }
        // Form Text artRatings
        $artRatings = $this->isNew() ? '0.00' : $this->getVar('art_ratings');
        $form->addElement(new \XoopsFormText(\_AM_TESTMODULEUPDATE_ARTICLE_RATINGS, 'art_ratings', 20, 150, $artRatings));
        // Form Text artVotes
        $artVotes = $this->isNew() ? '0' : $this->getVar('art_votes');
        $form->addElement(new \XoopsFormText(\_AM_TESTMODULEUPDATE_ARTICLE_VOTES, 'art_votes', 20, 150, $artVotes));
        // Form Text Date Select artCreated
        $artCreated = $this->isNew() ? \time() : $this->getVar('art_created');
        $form->addElement(new \XoopsFormTextDateSelect(\_AM_TESTMODULEUPDATE_ARTICLE_CREATED, 'art_created', '', $artCreated));
        // Form Select User artSubmitter
        $artSubmitter = $this->isNew() ? $GLOBALS['xoopsUser']->uid() : $this->getVar('art_submitter');
        $form->addElement(new \XoopsFormSelectUser(\_AM_TESTMODULEUPDATE_ARTICLE_SUBMITTER, 'art_submitter', false, $artSubmitter));
        // Permissions
        $memberHandler = \xoops_getHandler('member');
        $groupList = $memberHandler->getGroupList();
        $grouppermHandler = \xoops_getHandler('groupperm');
        $fullList[] = \array_keys($groupList);
        if ($this->isNew()) {
            $groupsCanApproveCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_APPROVE, 'groups_approve_articles[]', $fullList);
            $groupsCanSubmitCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_SUBMIT, 'groups_submit_articles[]', $fullList);
            $groupsCanViewCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_VIEW, 'groups_view_articles[]', $fullList);
        } else {
            $groupsIdsApprove = $grouppermHandler->getGroupIds('testmoduleupdate_approve_articles', $this->getVar('art_id'), $GLOBALS['xoopsModule']->getVar('mid'));
            $groupsIdsApprove[] = \array_values($groupsIdsApprove);
            $groupsCanApproveCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_APPROVE, 'groups_approve_articles[]', $groupsIdsApprove);
            $groupsIdsSubmit = $grouppermHandler->getGroupIds('testmoduleupdate_submit_articles', $this->getVar('art_id'), $GLOBALS['xoopsModule']->getVar('mid'));
            $groupsIdsSubmit[] = \array_values($groupsIdsSubmit);
            $groupsCanSubmitCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_SUBMIT, 'groups_submit_articles[]', $groupsIdsSubmit);
            $groupsIdsView = $grouppermHandler->getGroupIds('testmoduleupdate_view_articles', $this->getVar('art_id'), $GLOBALS['xoopsModule']->getVar('mid'));
            $groupsIdsView[] = \array_values($groupsIdsView);
            $groupsCanViewCheckbox = new \XoopsFormCheckBox(\_AM_TESTMODULEUPDATE_PERMISSIONS_VIEW, 'groups_view_articles[]', $groupsIdsView);
        }
        // To Approve
        $groupsCanApproveCheckbox->addOptionArray($groupList);
        $form->addElement($groupsCanApproveCheckbox);
        // To Submit
        $groupsCanSubmitCheckbox->addOptionArray($groupList);
        $form->addElement($groupsCanSubmitCheckbox);
        // To View
        $groupsCanViewCheckbox->addOptionArray($groupList);
        $form->addElement($groupsCanViewCheckbox);
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormHidden('start', $this->start));
        $form->addElement(new \XoopsFormHidden('limit', $this->limit));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesArticles($keys = null, $format = null, $maxDepth = null)
    {
        $helper  = \XoopsModules\Testmoduleupdate\Helper::getInstance();
        $utility = new \XoopsModules\Testmoduleupdate\Utility();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id']          = $this->getVar('art_id');
        $categoriesHandler = $helper->getHandler('Categories');
        $categoriesObj = $categoriesHandler->get($this->getVar('art_cat'));
        $ret['cat']         = $categoriesObj->getVar('cat_name');
        $ret['title']       = $this->getVar('art_title');
        $ret['descr']       = $this->getVar('art_descr', 'e');
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $ret['descr_short'] = $utility::truncateHtml($ret['descr'], $editorMaxchar);
        $ret['img']         = $this->getVar('art_img');
        $status             = $this->getVar('art_status');
        $ret['status']      = $status;
        switch ($status) {
            case Constants::STATUS_NONE:
            default:
                $status_text = \_AM_TESTMODULEUPDATE_STATUS_NONE;
                break;
            case Constants::STATUS_OFFLINE:
                $status_text = \_AM_TESTMODULEUPDATE_STATUS_OFFLINE;
                break;
            case Constants::STATUS_SUBMITTED:
                $status_text = \_AM_TESTMODULEUPDATE_STATUS_SUBMITTED;
                break;
            case Constants::STATUS_APPROVED:
                $status_text = \_AM_TESTMODULEUPDATE_STATUS_APPROVED;
                break;
            case Constants::STATUS_BROKEN:
                $status_text = \_AM_TESTMODULEUPDATE_STATUS_BROKEN;
                break;
        }
        $ret['status_text'] = $status_text;
        $ret['file']        = $this->getVar('art_file');
        $ret['ratings']     = $this->getVar('art_ratings');
        $ret['votes']       = $this->getVar('art_votes');
        $ret['created']     = \formatTimestamp($this->getVar('art_created'), 's');
        $ret['submitter']   = \XoopsUser::getUnameFromId($this->getVar('art_submitter'));
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayArticles()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar($var);
        }
        return $ret;
    }
}
