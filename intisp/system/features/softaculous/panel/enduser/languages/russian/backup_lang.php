<?php

//////////////////////////////////////////////////////////////
//===========================================================
// backup_lang.php
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

$l['no_ins'] = 'Не указаны установки';
$l['wrong_ins_title'] = 'Неправильный ID установки';
$l['wrong_ins'] = 'Указанный код установки не существует';
$l['backup_ftp_error'] = 'Could not create Backup Directory <b>&soft-1;</b>. Please create manually and try again.';
$l['err_backup'] = 'Could not create Backup.';
$l['no_space_backup'] = 'You do not have sufficient space to backup this installation!';
$l['err_notelength'] = 'Backup note must be less than 255 characters';
$l['off_backup_restore'] = 'Backup/Restore feature has been disabled by admin';

$l['cant_backup_dir'] = 'Утилита резервного копирования не может создать резервную копию файлов.';
$l['could_not_read'] = 'Oops Softaculous could not read the following file/directory <b>&soft-1;</b> Please make it readable to continue using the backup utility.';
$l['cant_datadir_dir'] = 'Возникли ошибки при добавлении данных каталога.';
$l['cant_wwwdir'] = 'There were errors while adding the Web directory.';
$l['cant_backup_db'] = 'Возникли ошибки при добавлении базы данных для резервного копирования.';
$l['err_perm_file'] = 'Возникли ошибки при попытке сделать файл разрешений';
$l['err_dataperm_file'] = 'Возникли ошибки при попытке сделать файл разрешения данных каталога';
$l['err_wwwperm_file'] = 'There were errors while trying to make a file of permissions of the WEB directory';
$l['save_dir_perms'] = 'Не удалось сохранить права доступа к файлам';
$l['save_datadir_perms'] = 'Не удалось сохранить права доступа к каталогам';
$l['save_www_perms'] = 'Could not save the permissions of the Web directory';
$l['cant_connect_mysql'] = 'Could not connect to database, please check the Username/Password of your database. If changed, please update the details in Softaculous installations using Edit Details.';

//Theme Strings
$l['<title>'] = ''.APP.' - Резервное копирование';
$l['info'] = 'Информация';
$l['ins_softname'] = 'Программное обеспечение';
$l['ins_num'] = 'Количество Установок';
$l['ins_ver'] = 'Версия';
$l['ins_time'] = 'Инсталляционное Время';
$l['ins_path'] = 'Путь';
$l['ins_wwwdir'] = 'Web Directory Path';
$l['ins_url'] = 'URL';
$l['ins_db'] = 'База Данных: Имя';
$l['ins_dbuser'] = 'База Данных: Пользователь';
$l['ins_dbpass'] = 'База Данных: Пароль';
$l['ins_dbhost'] = 'База Данных: Хост';
$l['backup_ins'] = 'Сделайть копию Установок';
$l['backup_dir'] = 'Резервное копирование Директорий';
$l['backup_dir_exp'] = 'Если вы отметите это вся папка будут подключена';
$l['backup_db'] = 'Резервное копирование Базы данных';
$l['backup_db_exp'] = 'При выборе базы данных, она также будет подкреплена';
$l['backup_conf'] = 'Резервное копирование может занять некоторое время в зависимости от данных. Пожалуйста, не закрывайте страницу, и не переходите на другую страницу.';
$l['backedup'] = 'Резервная копия была создана успешно. Вы можете скачать его со страницы <a href="'.$globals['index'].'act=backups">Резерные копии</a>.';
$l['backup_ins'] = 'Резервное копирование Установок';
$l['backup_datadir'] = 'Директоря Резервных копий';
$l['backup_datadir_exp'] = 'Если выбран каталог Данные будут сохранены.';
$l['ins_datadir'] = 'Каталог данных';
$l['return'] = 'Вернуться к обзору';
$l['ins_cron_command'] = 'Cron Command';
$l['backup_wwwdir'] = 'Backup Web Directory';
$l['backup_wwwdir_exp'] = 'If checked the Web directory will be saved.';
$l['checking_data'] = 'Checking the submitted data';
$l['backingup_db'] = 'Backing up the Database';
$l['backingup_dir'] = 'Backing up the Directory';
$l['backingup_datadir'] = 'Backing up the Data Directory';
$l['finishing_process'] = 'Finishing Backup';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. You can leave this page if you wish !';
$l['backingup'] = 'The backup is being created in the background. You will be notified by email once its completed. After the backup is completed, You can access it from the <a href="'.$globals['index'].'act=backups">Backups</a> page.';
$l['check_email'] = 'Please check your email for the status of the backup';
$l['prog_backingup'] = 'Backing Up '; // Dont remove the trailing space
$l['prog_backup_complete'] = 'Backup Completed.';
$l['backup_note'] = 'Backup Note';
$l['backup_note_exp'] = 'You can save a note for your reference';
$l['backup_operation'] = 'Select Backup Operation(s)';
$l['backups_expire'] = 'Your backups will be automatically purged after <b>&soft-1;</b> days of the backup creation.';
$l['err_max_backups'] = 'You have reached the maximum number of (<b>&soft-1;</b>) backups allowed. Please delete unwanted backups to be able to take a new backup.';
$l['backup_notes'] = 'Backup created by '.APP.' auto backup';
$l['max_backups'] = 'You currently have <b>&soft-1;</b> backups in your account. Your maximum backups limit is <b>&soft-2;</b>.';

$l['no_backup_functions'] = 'The BACKUP FUNCTIONS file could not be found! Please report this to the server administrator.';
$l['no_dir_exists'] = 'The Installation Directory does not exist.';
$l['backup_location_name'] = 'Backup Location';
$l['backup_file_empty'] = 'Incorrect backup file size : 0';
$l['err_mysql_db'] = 'The MySQL database name is incorrect as the database could not be selected.';
$l['backup_loc'] = 'Backup Location'; 
$l['exp_backup_loc'] = 'Choose the backup location where you would like to store the backup'; 
$l['default'] = 'Default'; 
$l['invalid_backup_location'] = 'Backup location submitted does not exist'; 
$l['local_folder'] = 'Local Folder'; 

$l['invalid_access_token'] = 'Invalid Access Token. Please Re-Authorize '.APP.' Dropbox APP from the Edit Backup location page in '.APP.' enduser panel';
$l['insufficient_space'] = 'Your Dropbox account is full. Please free some space and attempt the backup after sometime';

$l['gdrive_err_init'] = 'There were some errors while initiating the backup on Google Drive!!';
$l['gdrive_err_end'] = 'There were some errors while committing backup to your Google Drive account!!';