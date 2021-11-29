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
 * CommentsUpdate
 *
 * @param mixed  $itemId
 * @param mixed  $itemNumb
 * @return bool
 */
function testmoduleupdateCommentsUpdate($itemId, $itemNumb)
{
    // Get instance of module
    $helper = \XoopsModules\Testmoduleupdate\Helper::getInstance();
    $testfieldsHandler = $helper->getHandler('Testfields');
    $tfId = (int)$itemId;
    $testfieldsObj = $testfieldsHandler->get($tfId);
    $testfieldsObj->setVar('tf_comments', (int)$itemNumb);
    if ($testfieldsHandler->insert($testfieldsObj)) {
        return true;
    }
    return false;
}

/**
 * CommentsApprove
 *
 * @param mixed $comment
 * @return bool
 */
function testmoduleupdateCommentsApprove($comment)
{
    // Notification event
    // Get instance of module
    $helper = \XoopsModules\Testmoduleupdate\Helper::getInstance();
    $testfieldsHandler = $helper->getHandler('Testfields');
    $tfId = $comment->getVar('com_itemid');
    $testfieldsObj = $testfieldsHandler->get($tfId);
    $tfText = $testfieldsObj->getVar('tf_text');

    $tags = [];
    $tags['ITEM_NAME'] = $tfText;
    $tags['ITEM_URL']  = \XOOPS_URL . '/modules/testmoduleupdate/testfields.php?op=show&tf_id=' . $tfId;
    $notificationHandler = \xoops_getHandler('notification');
    // Event modify notification
    $notificationHandler->triggerEvent('global', 0, 'global_comment', $tags);
    $notificationHandler->triggerEvent('testfields', $tfId, 'testfield_comment', $tags);
    return true;

}
