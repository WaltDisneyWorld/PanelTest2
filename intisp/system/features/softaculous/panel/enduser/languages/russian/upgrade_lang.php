<?php

//////////////////////////////////////////////////////////////
//===========================================================
// upgrade_lang.php
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

$l['no_info_file'] = 'INFO.XML Файл не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['incompatible'] = 'программное обеспечение требует новой версии '.APP.'! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_upgrade'] = 'UPGRADE.XML Файл не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_functions'] = 'Файл ФУНКЦИИ ОБНОВЛЕНИЯ, не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_field'] = 'Поле <b>&soft-1;</b> является обязательным и должно быть заполнено.';
$l['no_package'] = 'Ппакет обновления не найден!';
$l['no_decompress'] = 'Возникли некоторые ошибки в распаковке файлов пакетов.';
$l['checking_data'] = 'Checking the submitted data';
$l['unzipping_files'] = 'Copying files and folders';
$l['unzipping_datadir'] = 'Unzipping data files';
$l['prop_db'] = 'Updating the database';
$l['finishing_process'] = 'Finishing Upgradation';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. Please do not leave this page until the progress bar reaches 100%';
$l['cver_greater'] = 'The current version is greater than or equal to the version you are upgrading to. This is possible if you manually upgraded the installation. If this is not the case please check the following checkbox';
$l['force_upgrade'] = 'Forcefully Upgrade';
$l['backup_finish'] = 'Backup Finished';
$l['backup_fail_proceed'] = 'Some error occured during the Backup process. Proceed to upgradation ?';
$l['backing_up'] = 'Backing up the installation';
$l['no_space'] = 'You do not have sufficient space to upgrade this installation!';
$l['invalid_insid'] = 'Invalid Installation ID';
$l['invalid_script'] = 'Invalid Script ID';
$l['no_upgrade_support'] = 'Upgrade is not supported for this script';

//Theme Strings
$l['<title>'] = $globals['sn'].' - '.APP.' - ';
$l['upgrade'] = 'Обновление Программного Обеспечения';
$l['softins_url'] = 'URL';
$l['softins_path'] = 'Путь';
$l['softcopy_note'] = '<b>ПРИМЕЧАНИЕ</b>: Это программное обеспечение будет выполнять обновление с помощью собственной утилиты обновления. Для завершения обновления, пожалуйста, посетите URL, который будет показан один раз, файлы были скопированы.';
$l['softsubmit'] = 'Обновить';
$l['congrats'] = 'Поздравляю, программное обеспечение было успешно обновлено';
$l['succesful'] = 'была успешно обновлена ​​до';
$l['admin_url'] = 'Админ URL';
$l['setup_continue'] = 'Однако, обновление будет завершено самим программным обеспеченим, поэтому, пожалуйста, посетите следующий URL';
$l['enjoy'] = 'Мы надеемся, что процесс обновления прошел легко.';
$l['upgrade_notes'] = 'Ниже приводятся некоторые важные примечания. Настоятельно рекомендуется прочитать их ';
$l['please_note'] = '<b>ПРИМЕЧАНИЕ</b>: '.APP.' производит только автоматическую установку и не предоставляет никакой поддержки для программного обеспечения. Пожалуйста, посетите веб-сайт поставщика программного обеспечения для поддержки!';
$l['regards'] = 'С уважением';
$l['softinstaller'] = APP.' Авто Установщик';
$l['return'] = 'Вернуться к Обзору';
$l['note_backup'] = 'Рекомендуем произвести <a href="'.$globals['index'].'act=backup&insid=&soft-1;">Резерное копирование</a> Установки перед обновлением.';
$l['alreadyupdated'] = 'Hmm ... it looks like the actual version of the installation is <b>&soft-1;</b> and not <b>&soft-2;</b>. <br />Click here to update '.APP.' records.';
$l['no_update_required'] = 'It looks like you don\'t need to update your installation as it is already uptodate';
$l['auto_backup'] = 'Would you like to take a Backup before Upgrading ?';
$l['select_version'] = 'Select a version to upgrade to';
$l['upgrading'] = 'Upgrading...';
$l['setup_partial'] = 'You are one more step away from completing the upgrade process';
$l['finish_update'] = 'Please visit below link to complete the upgrade process.';
$l['finish_up_sucess'] = 'After completing the upgrade process, you can access the &soft-1; installation here';
$l['upgrading_to'] = 'You will be Upgrading to : ';
$l['version'] = 'Version ';
$l['create_backup'] = 'Create Backup';
$l['create_backup_exp'] = 'Create a Backup before upgrading';
$l['prog_upgrading'] = 'Upgrading ';// Dont remove the trailing space
$l['prog_upgrade_complete'] = 'Upgrade Completed.';

$l['upgrade_tweet_sub'] = 'Tell your friends';

$l['not_in_free'] = '<b>&soft-1;</b> cannot be upgraded in the Free version of '.APP.'!';
$l['notify_admin'] = 'Please notify your Server Admin to purchase the premium version of '.APP.'!';

$l['backup_type'] = 'Backup Options';
$l['backup_type_exp'] = 'Choose full backup or advanced options';
$l['standard_backup'] = 'Full Backup (Default)';
$l['advanced_backup'] = 'Advanced Options';

$l['backup_dir'] = 'Backup Directory';
$l['backup_db'] = 'Backup Database';
$l['backup_wwwdir'] = 'Backup Web Directory';
$l['backup_datadir'] = 'Backup Data Directory';

