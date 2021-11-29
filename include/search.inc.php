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


/**
 * search callback functions
 *
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array $itemIds
 */
function testmoduleupdate_search($queryarray, $andor, $limit, $offset, $userid)
{
    $ret = [];
    $helper = \XoopsModules\Testmoduleupdate\Helper::getInstance();

    // search in table articles
    // search keywords
    $elementCount = 0;
    $articlesHandler = $helper->getHandler('Articles');
    if (\is_array($queryarray)) {
        $elementCount = \count($queryarray);
    }
    if ($elementCount > 0) {
        $crKeywords = new \CriteriaCompo();
        for ($i = 0; $i  <  $elementCount; $i++) {
            $crKeyword = new \CriteriaCompo();
            $crKeyword->add(new \Criteria('art_cat', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeyword->add(new \Criteria('art_title', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeyword->add(new \Criteria('art_descr', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeywords->add($crKeyword, $andor);
            unset($crKeyword);
        }
    }
    // search user(s)
    if ($userid && \is_array($userid)) {
        $userid = array_map('\intval', $userid);
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('art_submitter', '(' . \implode(',', $userid) . ')', 'IN'), 'OR');
    } elseif (is_numeric($userid) && $userid > 0) {
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('art_submitter', $userid), 'OR');
    }
    $crSearch = new \CriteriaCompo();
    if (isset($crKeywords)) {
        $crSearch->add($crKeywords, 'AND');
    }
    if (isset($crUser)) {
        $crSearch->add($crUser, 'AND');
    }
    $crSearch->setStart($offset);
    $crSearch->setLimit($limit);
    $crSearch->setSort('art_created');
    $crSearch->setOrder('DESC');
    $articlesAll = $articlesHandler->getAll($crSearch);
    foreach (\array_keys($articlesAll) as $i) {
        $ret[] = [
            'image'  => 'assets/icons/16/articles.png',
            'link'   => 'articles.php?op=show&amp;art_id=' . $articlesAll[$i]->getVar('art_id'),
            'title'  => $articlesAll[$i]->getVar('art_title'),
            'time'   => $articlesAll[$i]->getVar('art_created')
        ];
    }
    unset($crKeywords);
    unset($crKeyword);
    unset($crUser);
    unset($crSearch);

    // search in table testfields
    // search keywords
    $elementCount = 0;
    $testfieldsHandler = $helper->getHandler('Testfields');
    if (\is_array($queryarray)) {
        $elementCount = \count($queryarray);
    }
    if ($elementCount > 0) {
        $crKeywords = new \CriteriaCompo();
        for ($i = 0; $i  <  $elementCount; $i++) {
            $crKeyword = new \CriteriaCompo();
            $crKeyword->add(new \Criteria('tf_text', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeyword->add(new \Criteria('tf_textarea', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeywords->add($crKeyword, $andor);
            unset($crKeyword);
        }
    }
    // search user(s)
    if ($userid && \is_array($userid)) {
        $userid = array_map('\intval', $userid);
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('tf_submitter', '(' . \implode(',', $userid) . ')', 'IN'), 'OR');
    } elseif (is_numeric($userid) && $userid > 0) {
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('tf_submitter', $userid), 'OR');
    }
    $crSearch = new \CriteriaCompo();
    if (isset($crKeywords)) {
        $crSearch->add($crKeywords, 'AND');
    }
    if (isset($crUser)) {
        $crSearch->add($crUser, 'AND');
    }
    $crSearch->setStart($offset);
    $crSearch->setLimit($limit);
    $crSearch->setSort('tf_datetime');
    $crSearch->setOrder('DESC');
    $testfieldsAll = $testfieldsHandler->getAll($crSearch);
    foreach (\array_keys($testfieldsAll) as $i) {
        $ret[] = [
            'image'  => 'assets/icons/16/testfields.png',
            'link'   => 'testfields.php?op=show&amp;tf_id=' . $testfieldsAll[$i]->getVar('tf_id'),
            'title'  => $testfieldsAll[$i]->getVar('tf_text'),
            'time'   => $testfieldsAll[$i]->getVar('tf_datetime')
        ];
    }
    unset($crKeywords);
    unset($crKeyword);
    unset($crUser);
    unset($crSearch);

    return $ret;

}
