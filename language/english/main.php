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

require_once __DIR__ . '/admin.php';

// ---------------- Main ----------------
\define('_MA_TESTMODULEUPDATE_INDEX', 'Overview TestModuleUpdate');
\define('_MA_TESTMODULEUPDATE_TITLE', 'TestModuleUpdate');
\define('_MA_TESTMODULEUPDATE_DESC', 'This module is for doing following...');
\define('_MA_TESTMODULEUPDATE_INDEX_DESC', 'Welcome to the homepage of your new module TestModuleUpdate!<br>This description is only visible on the homepage of this module.');
\define('_MA_TESTMODULEUPDATE_NO_PDF_LIBRARY', 'Libraries TCPDF not there yet, upload them in root/Frameworks');
\define('_MA_TESTMODULEUPDATE_NO', 'No');
\define('_MA_TESTMODULEUPDATE_DETAILS', 'Show details');
\define('_MA_TESTMODULEUPDATE_BROKEN', 'Notify broken');
// ---------------- Contents ----------------
// Article
\define('_MA_TESTMODULEUPDATE_ARTICLE', 'Article');
\define('_MA_TESTMODULEUPDATE_ARTICLE_ADD', 'Add Article');
\define('_MA_TESTMODULEUPDATE_ARTICLE_EDIT', 'Edit Article');
\define('_MA_TESTMODULEUPDATE_ARTICLE_DELETE', 'Delete Article');
\define('_MA_TESTMODULEUPDATE_ARTICLE_CLONE', 'Clone Article');
\define('_MA_TESTMODULEUPDATE_ARTICLES', 'Articles');
\define('_MA_TESTMODULEUPDATE_ARTICLES_LIST', 'List of Articles');
\define('_MA_TESTMODULEUPDATE_ARTICLES_TITLE', 'Articles title');
\define('_MA_TESTMODULEUPDATE_ARTICLES_DESC', 'Articles description');
// Caption of Article
\define('_MA_TESTMODULEUPDATE_ARTICLE_ID', 'Id');
\define('_MA_TESTMODULEUPDATE_ARTICLE_CAT', 'Cat');
\define('_MA_TESTMODULEUPDATE_ARTICLE_TITLE', 'Title');
\define('_MA_TESTMODULEUPDATE_ARTICLE_DESCR', 'Descr');
\define('_MA_TESTMODULEUPDATE_ARTICLE_IMG', 'Img');
\define('_MA_TESTMODULEUPDATE_ARTICLE_STATUS', 'Status');
\define('_MA_TESTMODULEUPDATE_ARTICLE_FILE', 'File');
\define('_MA_TESTMODULEUPDATE_ARTICLE_RATINGS', 'Ratings');
\define('_MA_TESTMODULEUPDATE_ARTICLE_VOTES', 'Votes');
\define('_MA_TESTMODULEUPDATE_ARTICLE_CREATED', 'Created');
\define('_MA_TESTMODULEUPDATE_ARTICLE_SUBMITTER', 'Submitter');
// Testfield
\define('_MA_TESTMODULEUPDATE_TESTFIELD', 'Testfield');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_ADD', 'Add Testfield');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_EDIT', 'Edit Testfield');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_DELETE', 'Delete Testfield');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_CLONE', 'Clone Testfield');
\define('_MA_TESTMODULEUPDATE_TESTFIELDS', 'Testfields');
\define('_MA_TESTMODULEUPDATE_TESTFIELDS_LIST', 'List of Testfields');
\define('_MA_TESTMODULEUPDATE_TESTFIELDS_TITLE', 'Testfields title');
\define('_MA_TESTMODULEUPDATE_TESTFIELDS_DESC', 'Testfields description');
// Caption of Testfield
\define('_MA_TESTMODULEUPDATE_TESTFIELD_ID', 'Id');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_TEXT', 'Text');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_TEXTAREA', 'Textarea');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_DHTML', 'Dhtml');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_CHECKBOX', 'Checkbox');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_YESNO', 'Yesno');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_SELECTBOX', 'Selectbox');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_USER', 'User');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_COLOR', 'Color');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_IMAGELIST', 'Imagelist');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_URLFILE', 'Urlfile');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_UPLIMAGE', 'Uplimage');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_UPLFILE', 'Uplfile');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_TEXTDATESELECT', 'Textdateselect');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_SELECTFILE', 'Selectfile');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_PASSWORD', 'Password');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_COUNTRY_LIST', 'Country_list');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_LANGUAGE', 'Language');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_RADIO', 'Radio');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_STATUS', 'Status');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_DATETIME', 'Datetime');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_COMBOBOX', 'Combobox');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_COMMENTS', 'Comments');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_RATINGS', 'Ratings');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_VOTES', 'Votes');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_UUID', 'Uuid');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_IP', 'Ip');
\define('_MA_TESTMODULEUPDATE_TESTFIELD_READS', 'Reads');
\define('_MA_TESTMODULEUPDATE_INDEX_THEREARE', 'There are %s Testfields');
\define('_MA_TESTMODULEUPDATE_INDEX_LATEST_LIST', 'Last TestModuleUpdate');
// Submit
\define('_MA_TESTMODULEUPDATE_SUBMIT', 'Submit');
// Form
\define('_MA_TESTMODULEUPDATE_FORM_OK', 'Successfully saved');
\define('_MA_TESTMODULEUPDATE_FORM_DELETE_OK', 'Successfully deleted');
\define('_MA_TESTMODULEUPDATE_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TESTMODULEUPDATE_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TESTMODULEUPDATE_FORM_SURE_BROKEN', "Are you sure to notify as broken: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TESTMODULEUPDATE_INVALID_PARAM', 'Invalid parameter');
// ---------------- Ratings ----------------
\define('_MA_TESTMODULEUPDATE_RATING_CURRENT_1', 'Rating: %c / %m (%t rating totally)');
\define('_MA_TESTMODULEUPDATE_RATING_CURRENT_X', 'Rating: %c / %m (%t ratings totally)');
\define('_MA_TESTMODULEUPDATE_RATING_CURRENT_SHORT_1', '%c (%t rating)');
\define('_MA_TESTMODULEUPDATE_RATING_CURRENT_SHORT_X', '%c (%t ratings)');
\define('_MA_TESTMODULEUPDATE_RATING1', '1 of 5');
\define('_MA_TESTMODULEUPDATE_RATING2', '2 of 5');
\define('_MA_TESTMODULEUPDATE_RATING3', '3 of 5');
\define('_MA_TESTMODULEUPDATE_RATING4', '4 of 5');
\define('_MA_TESTMODULEUPDATE_RATING5', '5 of 5');
\define('_MA_TESTMODULEUPDATE_RATING_10_1', '1 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_2', '2 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_3', '3 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_4', '4 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_5', '5 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_6', '6 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_7', '7 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_8', '8 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_9', '9 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_10_10', '10 of 10');
\define('_MA_TESTMODULEUPDATE_RATING_VOTE_BAD', 'Invalid vote');
\define('_MA_TESTMODULEUPDATE_RATING_VOTE_ALREADY', 'You have already voted');
\define('_MA_TESTMODULEUPDATE_RATING_VOTE_THANKS', 'Thank you for rating');
\define('_MA_TESTMODULEUPDATE_RATING_NOPERM', "Sorry, you don't have permission to rate items");
\define('_MA_TESTMODULEUPDATE_RATING_LIKE', 'Like');
\define('_MA_TESTMODULEUPDATE_RATING_DISLIKE', 'Dislike');
\define('_MA_TESTMODULEUPDATE_RATING_ERROR1', 'Error: update base table failed!');
// ---------------- Print ----------------
\define('_MA_TESTMODULEUPDATE_PRINT', 'Print');
// Admin link
\define('_MA_TESTMODULEUPDATE_ADMIN', 'Admin');
// ---------------- End ----------------
