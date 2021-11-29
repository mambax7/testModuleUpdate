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
function b_testmoduleupdate_testfields_spotlight_show($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/testmoduleupdate/class/testfields.php';
    $block       = [];
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $helper      = Helper::getInstance();
    $testfieldsHandler = $helper->getHandler('Testfields');
    $crTestfields = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    // Criteria for status field
    $crTestfields->add(new \Criteria('tf_status', Constants::PERM_GLOBAL_VIEW, '>'));

    if (\count($options) > 0 && (int)$options[0] > 0) {
        $crTestfields->add(new \Criteria('tf_id', '(' . \implode(',', $options) . ')', 'IN'));
        $limit = 0;
    }

    $crTestfields->setSort('tf_id');
    $crTestfields->setOrder('DESC');
    $crTestfields->setLimit($limit);
    $testfieldsAll = $testfieldsHandler->getAll($crTestfields);
    unset($crTestfields);
    if (\count($testfieldsAll) > 0) {
        foreach (\array_keys($testfieldsAll) as $i) {
            /**
             * If you want to use the parameter for limits you have to adapt the line where it should be applied
             * e.g. change
             *     $block[$i]['title'] = $testfieldsAll[$i]->getVar('art_title');
             * into
             *     $myTitle = $testfieldsAll[$i]->getVar('art_title');
             *     if ($limit > 0) {
             *         $myTitle = \substr($myTitle, 0, (int)$limit);
             *     }
             *     $block[$i]['title'] =  $myTitle;
             */
            $block[$i]['id'] = $testfieldsAll[$i]->getVar('tf_id');
            $block[$i]['text'] = \htmlspecialchars($testfieldsAll[$i]->getVar('tf_text'), ENT_QUOTES | ENT_HTML5);
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_testmoduleupdate_testfields_spotlight_edit($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/testmoduleupdate/class/testfields.php';
    $helper = Helper::getInstance();
    $testfieldsHandler = $helper->getHandler('Testfields');
    $GLOBALS['xoopsTpl']->assign('testmoduleupdate_upload_url', \TESTMODULEUPDATE_UPLOAD_URL);
    $form = \_MB_TESTMODULEUPDATE_DISPLAY_SPOTLIGHT . ' : ';
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' >&nbsp;<br>";
    $form .= \_MB_TESTMODULEUPDATE_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    $crTestfields = new \CriteriaCompo();
    $crTestfields->add(new \Criteria('tf_id', 0, '!='));
    $crTestfields->setSort('tf_id');
    $crTestfields->setOrder('ASC');
    $testfieldsAll = $testfieldsHandler->getAll($crTestfields);
    unset($crTestfields);
    $form .= \_MB_TESTMODULEUPDATE_TESTFIELDS_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '>' . \_MB_TESTMODULEUPDATE_ALL_TESTFIELDS . '</option>';
    foreach (\array_keys($testfieldsAll) as $i) {
        $tf_id = $testfieldsAll[$i]->getVar('tf_id');
        $form .= "<option value='" . $tf_id . "' " . (!\in_array($tf_id, $options) ? '' : "selected='selected'") . '>' . $testfieldsAll[$i]->getVar('tf_text') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
