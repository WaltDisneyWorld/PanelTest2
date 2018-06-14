<?php

//////////////////////////////////////////////////////////////
//===========================================================
// universal.php
//===========================================================
// SOFTACULOUS 
// Version : 1.1
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Alons
// Date:       10th Jan 2009
// Time:       21:00 hrs
// Site:       http://www.softaculous.com/ (SOFTACULOUS)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
//===========================================================
// (c)Softaculous Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('SOFTACULOUS')){

	die('Hacking Attempt');

}

$globals['path'] = '/path/to/softaculous';
$globals['softscripts'] = '/var/softaculous';
$globals['sn'] = 'Softaculous';
$globals['cookie_name'] = 'SOFTCookies817';
$globals['gzip'] = 1;
$globals['language'] = 'english';
$globals['soft_email'] = 'admin@softaculous.com';
$globals['theme_folder'] = 'default';
$globals['timezone'] = 0;
$globals['mail'] = 1;
$globals['mail_server'] = '';
$globals['mail_port'] = '';
$globals['mail_user'] = '';
$globals['mail_pass'] = '';
$globals['off'] = 0;
$globals['off_subject'] = '';
$globals['off_message'] = '';
$globals['update'] = 1;
$globals['update_softs'] = 1;
$globals['add_softs'] = 1;
$globals['email_update'] = 1;
$globals['email_update_softs'] = 1;
$globals['cron_time'] = '1 8 * * *';
$globals['chmod_files'] = '';
$globals['chmod_dir'] = '';
$globals['is_vps'] = 0;
$globals['logo_url'] = '';
$globals['php_bin'] = '';

$globals['enduser'] = $globals['path'].'/enduser';
$globals['mainfiles'] = $globals['enduser'].'/main';
$globals['adminfiles'] = $globals['mainfiles'].'/admin';
$globals['euthemes'] = $globals['enduser'].'/themes';

?>