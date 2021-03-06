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


/**
 * Class Object Handler Articles
 */
class ArticlesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'testmoduleupdate_articles', Articles::class, 'art_id', 'art_title');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $i field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Articles in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountArticles($start = 0, $limit = 0, $sort = 'art_id ASC, art_title', $order = 'ASC')
    {
        $crCountArticles = new \CriteriaCompo();
        $crCountArticles = $this->getArticlesCriteria($crCountArticles, $start, $limit, $sort, $order);
        return $this->getCount($crCountArticles);
    }

    /**
     * Get All Articles in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllArticles($start = 0, $limit = 0, $sort = 'art_id ASC, art_title', $order = 'ASC')
    {
        $crAllArticles = new \CriteriaCompo();
        $crAllArticles = $this->getArticlesCriteria($crAllArticles, $start, $limit, $sort, $order);
        return $this->getAll($crAllArticles);
    }

    /**
     * Get Criteria Articles
     * @param        $crArticles
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getArticlesCriteria($crArticles, $start, $limit, $sort, $order)
    {
        $crArticles->setStart($start);
        $crArticles->setLimit($limit);
        $crArticles->setSort($sort);
        $crArticles->setOrder($order);
        return $crArticles;
    }
}
