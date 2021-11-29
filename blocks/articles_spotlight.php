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

use XoopsModules\Testmoduleupdate;
use XoopsModules\Testmoduleupdate\Helper;
use XoopsModules\Testmoduleupdate\Constants;

require_once \XOOPS_ROOT_PATH . '/modules/testmoduleupdate/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_testmoduleupdate_articles_spotlight_show($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/testmoduleupdate/class/articles.php';
    $block       = [];
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $helper      = Helper::getInstance();
    $articlesHandler = $helper->getHandler('Articles');
    $crArticles = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    // Criteria for status field
    $crArticles->add(new \Criteria('art_status', Constants::PERM_GLOBAL_VIEW, '>'));

    if (\count($options) > 0 && (int)$options[0] > 0) {
        $crArticles->add(new \Criteria('art_id', '(' . \implode(',', $options) . ')', 'IN'));
        $limit = 0;
    }

    $crArticles->setSort('art_id');
    $crArticles->setOrder('DESC');
    $crArticles->setLimit($limit);
    $articlesAll = $articlesHandler->getAll($crArticles);
    unset($crArticles);
    if (\count($articlesAll) > 0) {
        foreach (\array_keys($articlesAll) as $i) {
            /**
             * If you want to use the parameter for limits you have to adapt the line where it should be applied
             * e.g. change
             *     $block[$i]['title'] = $articlesAll[$i]->getVar('art_title');
             * into
             *     $myTitle = $articlesAll[$i]->getVar('art_title');
             *     if ($limit > 0) {
             *         $myTitle = \substr($myTitle, 0, (int)$limit);
             *     }
             *     $block[$i]['title'] =  $myTitle;
             */
            $block[$i]['id'] = $articlesAll[$i]->getVar('art_id');
            $block[$i]['cat'] = $articlesAll[$i]->getVar('art_cat');
            $block[$i]['title'] = \htmlspecialchars($articlesAll[$i]->getVar('art_title'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['descr'] = \strip_tags($articlesAll[$i]->getVar('art_descr'));
            $block[$i]['img'] = $articlesAll[$i]->getVar('art_img');
            $block[$i]['file'] = $articlesAll[$i]->getVar('art_file');
            $block[$i]['created'] = \formatTimestamp($articlesAll[$i]->getVar('art_created'));
            $block[$i]['submitter'] = \XoopsUser::getUnameFromId($articlesAll[$i]->getVar('art_submitter'));
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_testmoduleupdate_articles_spotlight_edit($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/testmoduleupdate/class/articles.php';
    $helper = Helper::getInstance();
    $articlesHandler = $helper->getHandler('Articles');
    $GLOBALS['xoopsTpl']->assign('testmoduleupdate_upload_url', \TESTMODULEUPDATE_UPLOAD_URL);
    $form = \_MB_TESTMODULEUPDATE_DISPLAY_SPOTLIGHT . ' : ';
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' >&nbsp;<br>";
    $form .= \_MB_TESTMODULEUPDATE_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    $crArticles = new \CriteriaCompo();
    $crArticles->add(new \Criteria('art_id', 0, '!='));
    $crArticles->setSort('art_id');
    $crArticles->setOrder('ASC');
    $articlesAll = $articlesHandler->getAll($crArticles);
    unset($crArticles);
    $form .= \_MB_TESTMODULEUPDATE_ARTICLES_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '>' . \_MB_TESTMODULEUPDATE_ALL_ARTICLES . '</option>';
    foreach (\array_keys($articlesAll) as $i) {
        $art_id = $articlesAll[$i]->getVar('art_id');
        $form .= "<option value='" . $art_id . "' " . (!\in_array($art_id, $options) ? '' : "selected='selected'") . '>' . $articlesAll[$i]->getVar('art_title') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
