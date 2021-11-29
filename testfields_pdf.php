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

require __DIR__ . '/header.php';
require_once \XOOPS_ROOT_PATH . '/header.php';
if (\file_exists($tcpdf = \XOOPS_ROOT_PATH.'/Frameworks/tcpdf/')) {
    require_once $tcpdf . 'tcpdf.php';
} else {
    \redirect_header('testfields.php', 2, \_MA_TESTMODULEUPDATE_NO_PDF_LIBRARY);
}
require_once $tcpdf . 'config/tcpdf_config.php';
// Get new template
require_once \XOOPS_ROOT_PATH . '/class/template.php';
$pdfTpl = new $xoopsTpl();

// Get requests
$tfId = Request::getInt('tf_id');
// Get Instance of Handler
$testfieldsHandler = $helper->getHandler('Testfields');
$testfieldsObj = $testfieldsHandler->get($tfId);

$myts = MyTextSanitizer::getInstance();

// Set defaults
$pdfFilename = 'testfields.pdf';
$title       = 'Pdf Title';
$subject     = 'Pdf Subject';
$content     = '';

// Read data from table and create pdfData
$content = \strip_tags($testfieldsObj->getVar('tf_textarea'));
$content = \strip_tags($testfieldsObj->getVar('tf_dhtml'));
$pdfData['author']   = \XoopsUser::getUnameFromId($testfieldsObj->getVar('tf_user'));
$pdfData['date']     = \formatTimestamp($testfieldsObj->getVar('tf_textdateselect'), 's');
$pdfData['title']    = \strip_tags($myts->undoHtmlSpecialChars($title));
$pdfData['subject']  = \strip_tags($subject);
$pdfData['content']  = $myts->undoHtmlSpecialChars($content);
$pdfData['fontname'] = PDF_FONT_NAME_MAIN;
$pdfData['fontsize'] = PDF_FONT_SIZE_MAIN;

// Get Config
$pdfData['creator']   = $GLOBALS['xoopsConfig']['sitename'];
$pdfData['subject']   = $GLOBALS['xoopsConfig']['slogan'];
$pdfData['keywords']  = $helper->getConfig('keywords');

// Defines
\define('TESTMODULEUPDATE_CREATOR', $pdfData['creator']);
\define('TESTMODULEUPDATE_AUTHOR', $pdfData['author']);
\define('TESTMODULEUPDATE_HEADER_TITLE', $pdfData['title']);
\define('TESTMODULEUPDATE_HEADER_STRING', $pdfData['subject']);
\define('TESTMODULEUPDATE_HEADER_LOGO', 'logo.gif');
\define('TESTMODULEUPDATE_IMAGES_PATH', \XOOPS_ROOT_PATH.'/images/');

// Assign customs tpl fields
$pdfTpl->assign('content_header', 'testfields');
$testfield = $testfieldsObj->getValuesTestfields();
$pdfTpl->assign('testfield', $testfield);

// Create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, _CHARSET, false);
// Remove/add default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
// Set document information
$pdf->SetCreator($pdfData['creator']);
$pdf->SetAuthor($pdfData['author']);
$pdf->SetTitle($title);
$pdf->SetKeywords($pdfData['keywords']);
// Set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, TESTMODULEUPDATE_HEADER_TITLE, TESTMODULEUPDATE_HEADER_STRING);
// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 10, PDF_MARGIN_RIGHT);
// Set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor
// For chinese
if ('cn' == _LANGCODE) {
    $pdf->setHeaderFont(['gbsn00lp', '', $pdfData['fontsize']]);
    $pdf->SetFont('gbsn00lp', '', $pdfData['fontsize']);
    $pdf->setFooterFont('gbsn00lp', '', $pdfData['fontsize']]);
} else {
    $pdf->setHeaderFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->SetFont($pdfData['fontname'], '', $pdfData['fontsize']);
    $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA);
}
// Set some language-dependent strings (optional)
$lang = \XOOPS_ROOT_PATH.'/Frameworks/tcpdf/lang/eng.php';
if (@\file_exists($lang)) {
    require_once $lang;
    $pdf->setLanguageArray($lang);
}
// Add Page document
$pdf->AddPage();
// Output
$template_path = \TESTMODULEUPDATE_PATH . '/templates/testmoduleupdate_testfields_pdf.tpl';
$content = $pdfTpl->fetch($template_path);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $content, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->Output($pdfFilename, 'I');
