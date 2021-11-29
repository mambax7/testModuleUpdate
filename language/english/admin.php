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

require_once __DIR__ . '/common.php';
require_once __DIR__ . '/main.php';

// ---------------- Admin Index ----------------
\define('_AM_TESTMODULEUPDATE_STATISTICS', 'Statistics');
// There are
\define('_AM_TESTMODULEUPDATE_THEREARE_CATEGORIES', "There are <span class='bold'>%s</span> categories in the database");
\define('_AM_TESTMODULEUPDATE_THEREARE_ARTICLES', "There are <span class='bold'>%s</span> articles in the database");
\define('_AM_TESTMODULEUPDATE_THEREARE_TESTFIELDS', "There are <span class='bold'>%s</span> testfields in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_TESTMODULEUPDATE_THEREARENT_CATEGORIES', "There aren't categories");
\define('_AM_TESTMODULEUPDATE_THEREARENT_ARTICLES', "There aren't articles");
\define('_AM_TESTMODULEUPDATE_THEREARENT_TESTFIELDS', "There aren't testfields");
// Save/Delete
\define('_AM_TESTMODULEUPDATE_FORM_OK', 'Successfully saved');
\define('_AM_TESTMODULEUPDATE_FORM_DELETE_OK', 'Successfully deleted');
\define('_AM_TESTMODULEUPDATE_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_TESTMODULEUPDATE_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Buttons
\define('_AM_TESTMODULEUPDATE_ADD_CATEGORY', 'Add New Category');
\define('_AM_TESTMODULEUPDATE_ADD_ARTICLE', 'Add New Article');
\define('_AM_TESTMODULEUPDATE_ADD_TESTFIELD', 'Add New Testfield');
// Lists
\define('_AM_TESTMODULEUPDATE_LIST_CATEGORIES', 'List of Categories');
\define('_AM_TESTMODULEUPDATE_LIST_ARTICLES', 'List of Articles');
\define('_AM_TESTMODULEUPDATE_LIST_TESTFIELDS', 'List of Testfields');
// ---------------- Admin Classes ----------------
// Category add/edit
\define('_AM_TESTMODULEUPDATE_CATEGORY_ADD', 'Add Category');
\define('_AM_TESTMODULEUPDATE_CATEGORY_EDIT', 'Edit Category');
// Elements of Category
\define('_AM_TESTMODULEUPDATE_CATEGORY_ID', 'Id');
\define('_AM_TESTMODULEUPDATE_CATEGORY_NAME', 'Name');
\define('_AM_TESTMODULEUPDATE_CATEGORY_LOGO', 'Logo');
\define('_AM_TESTMODULEUPDATE_CATEGORY_LOGO_UPLOADS', 'Logo in %s :');
\define('_AM_TESTMODULEUPDATE_CATEGORY_CREATED', 'Created');
\define('_AM_TESTMODULEUPDATE_CATEGORY_SUBMITTER', 'Submitter');
// Article add/edit
\define('_AM_TESTMODULEUPDATE_ARTICLE_ADD', 'Add Article');
\define('_AM_TESTMODULEUPDATE_ARTICLE_EDIT', 'Edit Article');
// Elements of Article
\define('_AM_TESTMODULEUPDATE_ARTICLE_ID', 'Id');
\define('_AM_TESTMODULEUPDATE_ARTICLE_CAT', 'Categories');
\define('_AM_TESTMODULEUPDATE_ARTICLE_TITLE', 'Title');
\define('_AM_TESTMODULEUPDATE_ARTICLE_DESCR', 'Descr');
\define('_AM_TESTMODULEUPDATE_ARTICLE_IMG', 'Img');
\define('_AM_TESTMODULEUPDATE_ARTICLE_IMG_UPLOADS', 'Img in %s :');
\define('_AM_TESTMODULEUPDATE_ARTICLE_STATUS', 'Status');
\define('_AM_TESTMODULEUPDATE_ARTICLE_FILE', 'File');
\define('_AM_TESTMODULEUPDATE_ARTICLE_FILE_UPLOADS', 'File in %s :');
\define('_AM_TESTMODULEUPDATE_ARTICLE_RATINGS', 'Ratings');
\define('_AM_TESTMODULEUPDATE_ARTICLE_VOTES', 'Votes');
\define('_AM_TESTMODULEUPDATE_ARTICLE_CREATED', 'Created');
\define('_AM_TESTMODULEUPDATE_ARTICLE_SUBMITTER', 'Submitter');
// Testfield add/edit
\define('_AM_TESTMODULEUPDATE_TESTFIELD_ADD', 'Add Testfield');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_EDIT', 'Edit Testfield');
// Elements of Testfield
\define('_AM_TESTMODULEUPDATE_TESTFIELD_ID', 'Id');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_TEXT', 'Text');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_TEXTAREA', 'Textarea');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_DHTML', 'Dhtml');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_CHECKBOX', 'Checkbox');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_YESNO', 'Yesno');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_SELECTBOX', 'Selectbox');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_USER', 'User');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_COLOR', 'Color');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_IMAGELIST', 'Imagelist');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_IMAGELIST_UPLOADS', 'Imagelist in frameworks images: %s');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_URLFILE', 'Urlfile');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_URLFILE_UPLOADS', 'Urlfile in uploads');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_UPLIMAGE', 'Uplimage');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_UPLIMAGE_UPLOADS', 'Uplimage in %s :');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_UPLFILE', 'Uplfile');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_UPLFILE_UPLOADS', 'Uplfile in %s :');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_TEXTDATESELECT', 'Textdateselect');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_SELECTFILE', 'Selectfile');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_SELECTFILE_UPLOADS', 'Selectfile in %s :');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_PASSWORD', 'Password');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_COUNTRY_LIST', 'Country list');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_LANGUAGE', 'Language');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_RADIO', 'Radio');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_STATUS', 'Status');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_DATETIME', 'Datetime');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_COMBOBOX', 'Combobox');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_COMMENTS', 'Comments');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_RATINGS', 'Ratings');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_VOTES', 'Votes');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_UUID', 'Uuid');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_IP', 'Ip');
\define('_AM_TESTMODULEUPDATE_TESTFIELD_READS', 'Reads');
// General
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD', 'Upload file');
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD_NEW', 'Upload new file: ');
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE', 'Max file size: ');
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
\define('_AM_TESTMODULEUPDATE_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
\define('_AM_TESTMODULEUPDATE_FORM_IMAGE_PATH', 'Files in %s :');
\define('_AM_TESTMODULEUPDATE_FORM_ACTION', 'Action');
\define('_AM_TESTMODULEUPDATE_FORM_EDIT', 'Modification');
\define('_AM_TESTMODULEUPDATE_FORM_DELETE', 'Clear');
// Status
\define('_AM_TESTMODULEUPDATE_STATUS_NONE', 'No status');
\define('_AM_TESTMODULEUPDATE_STATUS_OFFLINE', 'Offline');
\define('_AM_TESTMODULEUPDATE_STATUS_SUBMITTED', 'Submitted');
\define('_AM_TESTMODULEUPDATE_STATUS_APPROVED', 'Approved');
\define('_AM_TESTMODULEUPDATE_STATUS_BROKEN', 'Broken');
// Broken
\define('_AM_TESTMODULEUPDATE_BROKEN_RESULT', 'Broken items in table %s');
\define('_AM_TESTMODULEUPDATE_BROKEN_NODATA', 'No broken items in table %s');
\define('_AM_TESTMODULEUPDATE_BROKEN_TABLE', 'Table');
\define('_AM_TESTMODULEUPDATE_BROKEN_KEY', 'Key field');
\define('_AM_TESTMODULEUPDATE_BROKEN_KEYVAL', 'Key value');
\define('_AM_TESTMODULEUPDATE_BROKEN_MAIN', 'Info main');
// Sample List Values
\define('_AM_TESTMODULEUPDATE_LIST_1', 'Sample List Value 1');
\define('_AM_TESTMODULEUPDATE_LIST_2', 'Sample List Value 2');
\define('_AM_TESTMODULEUPDATE_LIST_3', 'Sample List Value 3');
// Clone feature
\define('_AM_TESTMODULEUPDATE_CLONE', 'Clone');
\define('_AM_TESTMODULEUPDATE_CLONE_DSC', 'Cloning a module has never been this easy! Just type in the name you want for it and hit submit button!');
\define('_AM_TESTMODULEUPDATE_CLONE_TITLE', 'Clone %s');
\define('_AM_TESTMODULEUPDATE_CLONE_NAME', 'Choose a name for the new module');
\define('_AM_TESTMODULEUPDATE_CLONE_NAME_DSC', 'Do not use special characters! <br>Do not choose an existing module dirname or database table name!');
\define('_AM_TESTMODULEUPDATE_CLONE_INVALIDNAME', 'ERROR: Invalid module name, please try another one!');
\define('_AM_TESTMODULEUPDATE_CLONE_EXISTS', 'ERROR: Module name already taken, please try another one!');
\define('_AM_TESTMODULEUPDATE_CLONE_CONGRAT', 'Congratulations! %s was sucessfully created!<br>You may want to make changes in language files.');
\define('_AM_TESTMODULEUPDATE_CLONE_IMAGEFAIL', 'Attention, we failed creating the new module logo. Please consider modifying assets/images/logo_module.png manually!');
\define('_AM_TESTMODULEUPDATE_CLONE_FAIL', 'Sorry, we failed in creating the new clone. Maybe you need to temporally set write permissions (CHMOD 777) to modules folder and try again.');
// ---------------- Admin Permissions ----------------
// Permissions
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_GLOBAL', 'Permissions global');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_GLOBAL_DESC', 'Permissions global to check type of.');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_GLOBAL_4', 'Permissions global to approve');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_GLOBAL_8', 'Permissions global to submit');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_GLOBAL_16', 'Permissions global to view');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_APPROVE', 'Permissions to approve');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_APPROVE_DESC', 'Permissions to approve');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_SUBMIT', 'Permissions to submit');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_SUBMIT_DESC', 'Permissions to submit');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_VIEW', 'Permissions to view');
\define('_AM_TESTMODULEUPDATE_PERMISSIONS_VIEW_DESC', 'Permissions to view');
\define('_AM_TESTMODULEUPDATE_NO_PERMISSIONS_SET', 'No permission set');
// ---------------- Admin Others ----------------
\define('_AM_TESTMODULEUPDATE_ABOUT_MAKE_DONATION', 'Submit');
\define('_AM_TESTMODULEUPDATE_SUPPORT_FORUM', 'Support Forum');
\define('_AM_TESTMODULEUPDATE_DONATION_AMOUNT', 'Donation Amount');
\define('_AM_TESTMODULEUPDATE_MAINTAINEDBY', ' is maintained by ');
// ---------------- End ----------------
