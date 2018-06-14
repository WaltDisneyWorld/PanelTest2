<?php

//////////////////////////////////////////////////////////////
//===========================================================
// cron2.php
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

if(version_compare(PHP_VERSION, '7.1.0', '>=') && file_exists(dirname(__FILE__).'/crons/cron2_71.php')){
	include_once(dirname(__FILE__).'/crons/cron2_71.php');
}elseif(version_compare(PHP_VERSION, '5.6.0', '>=') && file_exists(dirname(__FILE__).'/crons/cron2_56.php')){
	include_once(dirname(__FILE__).'/crons/cron2_56.php');
}elseif(version_compare(PHP_VERSION, '5.3.0', '>=') && file_exists(dirname(__FILE__).'/crons/cron2_53.php')){
	include_once(dirname(__FILE__).'/crons/cron2_53.php');
}elseif(file_exists(dirname(__FILE__).'/crons/cron2_52.php')){
	include_once(dirname(__FILE__).'/crons/cron2_52.php');
}else{
	include_once(dirname(__FILE__).'/crons/cron2.php');
}