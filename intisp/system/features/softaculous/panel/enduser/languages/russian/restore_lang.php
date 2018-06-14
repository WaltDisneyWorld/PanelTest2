<?php

//////////////////////////////////////////////////////////////
//===========================================================
// restore_lang.php
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

$l['restoreerror'] = 'Возникли некоторые ошибки при распаковке файлов резервных копий';
$l['restoredatadir'] = 'Не удается восстановить данные каталога';
$l['restorewww'] = 'Unable to restore Web directory';
$l['res_err_selectmy'] = 'Не удалось выбрать базу данных для восстановления';
$l['err_myconn'] = 'Не удалось подключиться к базе данных';
$l['err_db_create'] = 'Error occured while creating Database';
$l['off_backup_restore'] = 'Backup/Restore feature has been disabled by admin';
$l['no_backupinfo_file'] = 'Backup info file not found';
$l['no_backup_time'] = 'Backup time not found';
$l['instime_higher_than_btime'] = 'Installation time is higher than the Backup time';

//Theme Strings
$l['<title>'] = ''.APP.' - Восстановление';
$l['restorefile'] = 'Восстановление из Резервной копии';
$l['restore_dir'] = 'Восстановить Директорию';
$l['restore_dir_exp'] = 'Если вы отметите, вся папка будет восстановлена';
$l['restore_datadir'] = 'Восстановление данных Директории';
$l['restore_datadir_exp'] = 'При выборе каталога данных он будет восстановлен';
$l['restore_db'] = 'Восстановить Базу Данных';
$l['restore_db_exp'] = 'При выборе базы данных она будет восстановлена';
$l['restore_ins'] = 'Восстановить Установку';
$l['restore'] = 'Резервная копия успешно восстановлена';
$l['confirm_restore'] = 'Вы уверены, что хотите восстановить установку?';
$l['return'] = 'Вернуться к Обзору';
$l['restore_wwwdir'] = 'Restore Web Directory';
$l['restore_wwwdir_exp'] = 'If checked the Web directory will be restored';
$l['checking_data'] = 'Checking the submitted data';
$l['res_db'] = 'Restoring the Database';
$l['res_dir'] = 'Restoring the Directory';
$l['res_datadir'] = 'Restoring the Data Directory';
$l['finishing_process'] = 'Backup Restored';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. Please do not leave this page until the progress bar reaches 100%';
$l['restoring'] = 'Your backup is being restored in background. You will be notified by email once its completed.';
$l['prog_restoring'] = 'Restoring '; // Dont remove the trailing space
$l['prog_restore_complete'] = 'Restore Completed.';
$l['no_restore_functions'] = 'The RESTORE FUNCTIONS file could not be found! Please report this to the server administrator.';
$l['backup_file_empty'] = 'Backup file is empty';
$l['db_not_exist'] = 'Database file does not exist';
$l['db_empty'] = 'The database file is empty';
