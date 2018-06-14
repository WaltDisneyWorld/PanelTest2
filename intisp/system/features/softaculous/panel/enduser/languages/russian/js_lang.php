<?php

//////////////////////////////////////////////////////////////
//===========================================================
// js_lang.php
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
$l['no_install'] = 'INSTALL.XML Файл не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_functions'] = 'Установочный файл функций, не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_softdomain'] = 'Вы не выбрали домен для установки программного обеспечения.';
$l['wrong_softdomain'] = 'Указанный домен не найден.';
$l['no_space'] = 'У вас нет достаточного места для установки этого программного обеспечения!';
$l['no_field'] = 'Поле <b>&soft-1;</b> является обязательным и должно быть заполнено.';
$l['no_package'] = 'Инсталляционный пакет не найден!';
$l['no_decompress'] = 'Возникли некоторые ошибки в распаковке файлов пакетов.';
$l['mail_new_ins'] = 'Новая установка &soft-1 была завершена. Подробная информация об установке приведены ниже:';
$l['mail_path'] = 'Путь';
$l['mail_url'] = 'URL';
$l['mail_time'] = 'Установлено';
$l['mail_subject'] = 'Установка &soft-1;';
$l['some_files_exist'] = 'Установка не может продолжаться, потому что следующие файлы уже существуют в указанной папке : ';
$l['delete_files'] = 'Пожалуйста удалите эти файлы или выберите другую папку.';
$l['checking_data'] = 'Checking the submitted data';
$l['unzipping_files'] = 'Copying files and folders';
$l['unzipping_datadir'] = 'Unzipping data files';
$l['prop_db'] = 'Propagating the database';
$l['finishing_process'] = 'Finishing Installation';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. Please do not leave this page until the progress bar reaches 100%';
$l['softdirectory_invalid'] = 'The directory you typed is invalid.';
$l['err_domain'] = 'No Domain';
$l['err_domain_admin'] = 'This User does not have any Domain. Please contact Administrator.';
$l['no_sel_inst'] = 'No selected installations';
$l['del_insid'] = 'Are you sure you want to delete selected installations ?';
$l['ins_emailto'] = 'Email installation details to';
$l['no_https'] = 'A trusted SSL Certificate was not found';
$l['err_dbprefix'] = 'Table Prefix is invalid. Valid values are a-z or A-Z or 0-9 or _';
$l['auto_backup_not_allowed'] = 'The auto backup frequency you chose is invalid';
$l['invalid_script'] = 'Invalid Script ID';
$l['not_js_script'] = 'This script is not JavaScript';
$l['no_domain_found'] = 'No domain found. Please add a domain to install the script';

//Theme Strings
$l['<title>'] = $globals['sn'].' - '.APP.' - ';
$l['install'] = 'Установка';
$l['overview'] = 'Обзор';
$l['features'] = 'Особенности';
$l['demo'] = 'Демо';
$l['ratings'] = 'Рейтинг';
$l['import'] = 'Импорт';
$l['software_ver'] = 'Версия';
$l['space_req'] = 'Место, необходимое для';
$l['available_space'] = 'Доступное место';
$l['req_space'] = 'Требуемое место';
$l['mb'] = 'МБ';
$l['software_support'] = 'Поддержка программного обеспечения';
$l['support_link'] = 'Визит на сайт поддержки';
$l['support_note'] = 'Примечание: Softaculous не предоставляет поддержку для любого программного обеспечения.';
$l['setup'] = 'Установка программного обеспечения';
$l['choose_domain'] = 'Выберите домен';
$l['choose_domain_exp'] = 'Пожалуйста, выберите домен для установки программного обеспечения.';
$l['in_directory'] = 'В Директории';
$l['in_directory_exp'] = 'Директория относительно вашего домена и будет <b> создана если она не существует</b>. Например Для установки на http://mydomain/dir/ просто введите <b>dir</b>. Для установки в корень http://mydomain/ оставите поле пустым.';
$l['softsubmit'] = 'Установить';
$l['congrats'] = 'Поздравляем, Программное обеспечение установлено успешно!';
$l['succesful'] = 'был успешно установлен в';
$l['enjoy'] = 'Мы надеемся, что процесс установки прошел легко.';
$l['install_notes'] = 'Ниже приводятся некоторые важные примечания. Настоятельно рекомендуется прочитать их ';
$l['please_note'] = '<b>ПРИМЕЧАНИЕ</b>: '.APP.' производит только автоматическую установку программного обеспечения и не предоставляет никакой поддержки для отдельных пакетов программного обеспечения. Пожалуйста, посетите веб-сайт поставщика программного обеспечения для поддержки!';
$l['regards'] = 'С уважением';
$l['softinstaller'] = APP.' Авто Установщик';
$l['return'] = 'Вернуться в Обзор';
$l['current_ins'] = 'Имеющиеся Установки';
$l['link'] = 'Ссылка';
$l['ins_time'] = 'Установлено';
$l['version'] = 'Версия';
$l['upd_to'] = 'Обновление до версии';
$l['remove'] = 'Удалить';
$l['no_info'] = 'Нет информации';
$l['ratesoft'] = 'Рейтинг Скрипта';
$l['reviews'] = 'Отзывы';
$l['reviewsoft'] = 'Написать Отзыв';
$l['readreviews'] = 'Читать Отзывы';
$l['reviews_exp'] = 'Прочитайте отзывы других пользователей и';
$l['ins_type'] = 'Тип Установки';
$l['ins_type_exp'] = '<b>Оригинальный пакет</b> - Пакет, доступный на сайте Скрипта. <br/> <b>Только файлы библиотеки</b> - Просто Javascript библиотека файлов.';
$l['ori_pack'] = 'Оригинальный пакет';
$l['just_lib'] = 'Только файлы библиотеки';
$l['overwrite_exist'] = '<b>ИЛИ</b> <br /><input type="checkbox" name="overwrite_existing" id="overwrite_existing" />&nbsp;&nbsp;<b><span style="color:#000;">Установите флажок, чтобы переписать все файлы и продолжать</span></b>';
$l['overwrite'] = 'Переписать файлы';
$l['choose_protocol'] = 'Выберите Протокол';
$l['choose_protocol_exp'] = 'Если ваш сайт имеет SSL, то, пожалуйста, выберите протокол HTTPS.';
$l['clone'] = 'Clone';
$l['options'] = 'Options';
$l['downloading'] = 'Downloading Package';
$l['installing'] = 'Installing Script';
$l['go'] = 'Go';
$l['rem_inst_id'] = 'Removing Installation - ';
$l['inst_remvd'] = 'The selected installation(s) have been removed. The page will now be reloaded !';
$l['release_date'] = 'Release Date';
$l['adv_option'] = 'Advanced Options';
$l['disable_notify_update'] = 'Disable Update Notification Emails';
$l['exp_disable_notify_update'] = 'If checked you will not receive an email notification for updates available for this installation.';
$l['prog_installing'] = 'Installing '; // Dont remove trailing space
$l['prog_install_complete'] = 'Installation Completed.';

$l['auto_backup'] = 'Automated backups';
$l['exp_auto_backup'] = APP.' will take automated backups via CRON as per the frequency you select';
$l['auto_backup_rotation'] = 'Backup Rotation';
$l['exp_auto_backup_rotation'] = 'If the backup rotation limit is reached '.APP.' will delete the oldest backup for this installation and create a new backup. The backups will utilize your space so choose the backup rotation as per the space available on your server';
$l['no_backup'] = 'Don\'t backup';
$l['daily'] = 'Once a day';
$l['weekly'] = 'Once a week';
$l['monthly'] = 'Once a month';
$l['unlimited'] = 'Unlimited';
$l['changelog'] = 'Changelog';
$l['act_upgrade'] = 'Recently Upgraded';
$l['act_clone'] = 'Recently Cloned';
$l['act_backup'] = 'Recently Backed up';
$l['act_install'] = 'Recently Installed';
$l['act_edit'] = 'Recently Edited';
$l['act_import'] = 'Recently Imported';
$l['act_restore'] = 'Recently Restored';
$l['ampps_download'] = 'You can develop <b>&soft-1;</b> on your <b>desktop</b> using our Free developer tool Softaculous AMPPS. Click <a href="http://www.ampps.com/download?give=latest" target="_blank"><b>here</b></a> to download <a href="http://www.ampps.com/download?give=latest" target="_blank"><img src="https://images.softaculous.com/ampps.gif" height="25" /></a>';

$l['install_tweet_sub'] = 'Tell your friends about your new site';
$l['err_auto_backup_limit'] = 'The auto backup rotation cannot be more than <b>&soft-1;</b>';
$l['select_domain'] = 'Select Domain';
$l['with_selected'] = 'With Selected';
$l['not_in_free'] = '<b>&soft-1;</b> cannot be installed in the Free version of '.APP.'!';
$l['notify_admin'] = 'Please notify your Server Admin to purchase the premium version of '.APP.'!';
$l['related_scripts'] = 'Related Scripts';
$l['backup'] = 'Backup';
$l['editdetail'] = 'Edit Details';
$l['install_now'] = 'Install Now';
$l['my_apps'] = 'My Apps';

$l['bad'] = 'Bad';
$l['good'] = 'Good';
$l['strong'] = 'Strong';
$l['short'] = 'Short';
$l['strength_indicator'] = 'Strength Indicator';

$l['backup_location'] = 'Backup Location';
$l['backup_location_exp'] = 'Choose the backup location to be used while backing up this installation';
$l['default'] = 'Default';
$l['invalid_backup_location'] = 'Backup location submitted does not exist';
$l['local_folder'] = 'Local Folder';

$l['no_cron_min'] = 'No Cron minute was specified';
$l['no_cron_hour'] = 'No Cron hour was specified';
$l['no_cron_day'] = 'No Cron day was specified';
$l['no_cron_month'] = 'No Cron month was specified';
$l['no_cron_weekday'] = 'No Cron weekday was specified';

$l['custom_autobackup'] = 'Custom';
$l['custom_autobackup_cron'] = 'Automated Backups Cron time';
$l['custom_autobackup_cron_exp'] = 'Please specify the CRON timings for automated backups';

//Errors for autobcakup cron settings
$l['wrong_autobackup_cron_min'] = 'Automated Backup cron minute is wrong. Valid values are 0-59 or a *';
$l['wrong_autobackup_cron_hour'] = 'Automated Backup cron hour is wrong. Valid values are 0-23 or a *';
$l['wrong_autobackup_cron_day'] = 'Automated Backup cron day is wrong. Valid values are 1-31 or a *';
$l['wrong_autobackup_cron_month'] = 'Automated Backup cron month is wrong. Valid values are 1-12 or a *';
$l['wrong_autobackup_cron_weekday'] = 'Automated Backup cron weekday is wrong. Valid values are 0-7 or a *';

$l['quick_install'] = 'Quick Install';
$l['custom_install'] = 'Custom Install';

$l['outdated_script'] = '<b>&soft-1;</b> has not been updated for more than two years and may no longer be maintained or supported by the script vendor';