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

/**
 * comment callback functions
 *
 * @param  $category
 * @param  $item_id
 * @return array item|null
 */
function testmoduleupdate_notify_iteminfo($category, $item_id)
{
    global $xoopsDB;

    if (!\defined('TESTMODULEUPDATE_URL')) {
        \define('TESTMODULEUPDATE_URL', \XOOPS_URL . '/modules/testmoduleupdate');
    }

    switch ($category) {
        case 'global':
            $item['name'] = '';
            $item['url']  = '';
            return $item;
            break;
        case 'articles':
            $sql          = 'SELECT art_title FROM ' . $xoopsDB->prefix('testmoduleupdate_articles') . ' WHERE art_id = '. $item_id;
            $result       = $xoopsDB->query($sql);
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['art_title'];
            $item['url']  = \TESTMODULEUPDATE_URL . '/articles.php?art_id=' . $item_id;
            return $item;
            break;
        case 'testfields':
            $sql          = 'SELECT tf_text FROM ' . $xoopsDB->prefix('testmoduleupdate_testfields') . ' WHERE tf_id = '. $item_id;
            $result       = $xoopsDB->query($sql);
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['tf_text'];
            $item['url']  = \TESTMODULEUPDATE_URL . '/testfields.php?tf_id=' . $item_id;
            return $item;
            break;
    }
    return null;
}
