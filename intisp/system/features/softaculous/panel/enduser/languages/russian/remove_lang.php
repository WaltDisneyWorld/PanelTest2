<?php

//////////////////////////////////////////////////////////////
//===========================================================
// remove_lang.php
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

$l['no_ins'] = 'Установки не указаны';
$l['wrong_ins_title'] = 'Ошибочный ID Установки';
$l['wrong_ins'] = 'Указанный код установки не существует';
$l['cant_remove_dir'] = 'Каталог не может быть удален, так как это домашний каталог. Пожалуйста снимите отметку <b>Удалить каталог</b> для возможности продолжить удаление, без удаления каталога.';
$l['cant_remove_wwwdir'] = 'The WEB directory cannot be removed as it is the home directory. Please uncheck the <b>Remove Web Directory</b> option to continue without removing the web directory.';
$l['mail_rem_ins'] = 'Установка &soft-1; была удалена. Были следйющие детали установки : ';
$l['mail_path'] = 'Путь';
$l['mail_url'] = 'URL';
$l['mail_db'] = 'MySQL База Данных';
$l['mail_dbuser'] = 'MySQL БД: Пользователь';
$l['mail_dbhost'] = 'MySQL БД: Хост';
$l['mail_dbpass'] = 'MySQL БД: Пароль';
$l['mail_time'] = 'Установлено';
$l['mail_rem_time'] = 'Удалено';
$l['mail_subject'] = 'Удаление Установки &soft-1;';
$l['mail_cron_command'] = 'CRON Задания';
$l['mail_datadir'] = 'Каталог данных';
$l['mail_wwwdir'] = 'Web Directory';
$l['checking_data'] = 'Checking the submitted data';
$l['rem_db'] = 'Removing the Database/Database User';
$l['rem_dir'] = 'Removing the Directory';
$l['rem_datadir'] = 'Removing the Data Directory';
$l['rem_cron'] = 'Removing the Cron Jobs';
$l['finishing_process'] = 'Removed Successfully';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. Please do not leave this page until the progress bar reaches 100%';


//Theme Strings
$l['<title>'] = APP.' - Удаление';
$l['info'] = 'Информация';
$l['ins_softname'] = 'Программное обеспечение';
$l['ins_num'] = 'Номер Установки';
$l['ins_ver'] = 'Версия';
$l['ins_time'] = 'Установлено';
$l['ins_path'] = 'Путь';
$l['ins_url'] = 'URL';
$l['ins_db'] = 'База Данных: Название';
$l['ins_dbuser'] = 'База Данных: Пользователь';
$l['ins_dbpass'] = 'База Данных: Пароль';
$l['ins_dbhost'] = 'База Данных: Хост';
$l['remove_ins'] = 'Удаление Установки';
$l['remove_dir'] = 'Удалить Директорию';
$l['remove_dir_exp'] = 'Если вы отметите это, все папки, будут удалены';
$l['remove_db'] = 'Удалить Базу Данных';
$l['remove_db_exp'] = 'При выборе, базы данных будут удалены';
$l['remove_dbuser'] = 'Удаление базы данных пользователя';
$l['remove_dbuser_exp'] = 'При выборе, базы данных пользователя будут также удалены';
$l['remove_conf'] = 'Эти действия являются необратимыми!\n Вы уверены, что хотите удалить эту установку?';
$l['uninstalled'] = 'Установка удалена успешно';
$l['removeins'] = 'Удалить Установку';
$l['ins_cron_command'] = 'Cron Команды';
$l['remove_datadir'] = 'Удалить данные каталога';
$l['remove_datadir_exp'] = 'Если выбрано, данные каталога будут удалены.';
$l['ins_datadir'] = 'Каталог данных';
$l['remove_wwwdir'] = 'Remove Web Directory';
$l['remove_wwwdir_exp'] = 'If checked the web directory will be removed.';
$l['ins_wwwdir'] = 'Web Directory';
$l['return'] = 'Вернуться к Обзору';
$l['prog_removing'] = 'Removing ';// Dont remove the trailing space
$l['prog_remove_complete'] = 'Installation Removed.';
$l['disabled_script_info'] = 'No information available as this script has been disabled.';

