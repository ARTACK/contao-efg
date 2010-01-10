<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 *
 * The TYPOlight webCMS is an accessible web content management system that
 * specializes in accessibility and generates W3C-compliant HTML code. It
 * provides a wide range of functionality to develop professional websites
 * including a built-in search engine, form generator, file and user manager,
 * CSS engine, multi-language support and many more. For more information and
 * additional TYPOlight applications like the TYPOlight MVC Framework please
 * visit the project website http://www.typolight.org.
 *
 * Language file for table tl_formdata (en).
 *
 * PHP version 5
 * @copyright  Thomas Kuhn 2007
 * @author     Thomas Kuhn <th_kuhn@gmx.net>
 * @package    efg
 * @version    1.11.0
 * @license    LGPL
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_formdata']['form']      = array('Form', 'Data from Form');
$GLOBALS['TL_LANG']['tl_formdata']['date']      = array('Date', 'Date of entry');
$GLOBALS['TL_LANG']['tl_formdata']['ip']        = array('IP address', 'IP address of sender');
$GLOBALS['TL_LANG']['tl_formdata']['be_notes']  = array('Notes', 'Notes, todos etc.');
$GLOBALS['TL_LANG']['tl_formdata']['published'] = array('Published', 'You can use this option as display condition when using a list module.');
$GLOBALS['TL_LANG']['tl_formdata']['fd_member'] = array('Member', 'Member as owner of this record');
$GLOBALS['TL_LANG']['tl_formdata']['fd_user']   = array('User', 'User as owner of this record');
$GLOBALS['TL_LANG']['tl_formdata']['fd_member_group'] = array('Member group', 'Member group as owner of this record');
$GLOBALS['TL_LANG']['tl_formdata']['fd_user_group']   = array('User group', 'User group as owner of this record');
$GLOBALS['TL_LANG']['tl_formdata']['alias']     = array('Alias', 'An alias is a unique reference to the record which can be called instead of the record ID.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_formdata']['new']    = array('New record', 'Create a new record');
$GLOBALS['TL_LANG']['tl_formdata']['edit']   = array('Edit record', 'Edit record ID %s');
$GLOBALS['TL_LANG']['tl_formdata']['copy']   = array('Duplicate record', 'Duplicate record ID %s');
$GLOBALS['TL_LANG']['tl_formdata']['delete'] = array('Delete record', 'Delete record ID %s');
$GLOBALS['TL_LANG']['tl_formdata']['show']   = array('Record details', 'Show details of record ID %s');
$GLOBALS['TL_LANG']['tl_formdata']['mail']   = array('Send confirmation mail', 'Send confirmation mail for record ID %s');
$GLOBALS['TL_LANG']['tl_formdata']['mail_sent'] = "Mail has been sent to %s";
$GLOBALS['TL_LANG']['tl_formdata']['export'] = array('CSV export', 'Export records to a CSV file');
$GLOBALS['TL_LANG']['tl_formdata']['exportxls'] = array('Excel export', 'Export records to a MS Excel file');
$GLOBALS['TL_LANG']['tl_formdata']['mail_sender'] = array('Sender', 'Email address of sender');
$GLOBALS['TL_LANG']['tl_formdata']['mail_recipient'] = array('Recipient', 'Email address of recipient');
$GLOBALS['TL_LANG']['tl_formdata']['mail_subject'] = array('Subject', 'Subject of confirmation mail');
$GLOBALS['TL_LANG']['tl_formdata']['mail_body_plaintext'] = array('Message (plain text)', 'Text of mail as plain text');
$GLOBALS['TL_LANG']['tl_formdata']['mail_body_html'] = array('Message (HTML)', 'Text of mail as HTML');
$GLOBALS['TL_LANG']['tl_formdata']['attachments'] = 'Attachements';

/**
 * Text links in frontend listing formdata
 */
$GLOBALS['TL_LANG']['tl_formdata']['fe_link_details'] = array('Details', 'Show details');
$GLOBALS['TL_LANG']['tl_formdata']['fe_link_edit']    = array('Edit', 'Edit record');
$GLOBALS['TL_LANG']['tl_formdata']['fe_link_delete']  = array('Delete', 'Delete record');
$GLOBALS['TL_LANG']['tl_formdata']['fe_link_export']  = array('CSV Export', 'Export record as CSV file');

$GLOBALS['TL_LANG']['tl_formdata']['fe_deleteConfirm'] = 'Do you really want to delete entry?';

/**
 * legends
 */
$GLOBALS['TL_LANG']['tl_formdata']['fdNotes_legend'] = "Notes";
$GLOBALS['TL_LANG']['tl_formdata']['fdOwner_legend'] = "Owner";
$GLOBALS['TL_LANG']['tl_formdata']['fdDetails_legend'] = "Details";

?>