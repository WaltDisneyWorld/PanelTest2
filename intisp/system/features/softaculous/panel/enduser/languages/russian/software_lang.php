<?php

//////////////////////////////////////////////////////////////
//===========================================================
// software_lang.php
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
$l['incompatible'] = 'Программное обеспечение требует новой версии '.APP.'! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_install'] = 'INSTALL.XML файл не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_functions'] = 'Установочный файл функций, не найден! Пожалуйста, сообщите об этом администратору сервера.';
$l['no_remove_functions'] = 'The REMOVE FUNCTIONS file could not be found! Please report this to the server administrator.';
$l['no_softdomain'] = 'Вы не выбрали домен для установки программного обеспечения.';
$l['wrong_softdomain'] = 'Указанный домен не может быть найден.';
$l['softdirectory_exists'] = 'Указанный каталог уже существует! Пожалуйста, укажите другой каталог.';
$l['no_space'] = 'У вас нет достаточно места для установки этого программного обеспечения!';
$l['no_softdb'] = 'База данных не была размещена.';
$l['database_exists'] = 'База данных уже существует. Пожалуйста, укажите другое название.';
$l['databaseuser_exists'] = 'Пользователь базы данных уже существует. Пожалуйста, укажите другое имя.';
$l['db_name_long'] = 'Название базы данных не может быть больше 7 букв. Пожалуйста, укажите более короткое название базы данных.';
$l['db_limit_crossed'] = 'Максимальное количество баз данных которое можно создать достигнуто, поэтому установка не может быть продолжена.';
$l['no_field'] = 'Поле <b>&soft-1;</b> является обязательным и должно быть заполнено.';
$l['error_adddb'] = 'База данных не может быть создана';
$l['error_adduser'] = 'Возникла ошибка при добавлении пользователя в новой базе данных';
$l['no_package'] = 'Инсталляционный пакет не может быть найден!';
$l['no_decompress'] = 'Возникли некоторые ошибки в распаковке файлов пакетов.';
$l['mail_new_ins'] = 'Новая установка &soft-1; была завершена. Подробная информация о, установке приведены ниже:';
$l['mail_path'] = 'Путь';
$l['mail_url'] = 'URL';
$l['mail_admin_url'] = 'Admin URL'; 
$l['mail_admin'] = 'Админ Имя';
$l['mail_pass'] = 'Админ Пароль';
$l['mail_db'] = 'MySQL База Данных';
$l['mail_dbuser'] = 'MySQL БД Пользователь';
$l['mail_dbhost'] = 'MySQL БД Хост';
$l['mail_dbpass'] = 'MySQL БД Пароль';
$l['mail_time'] = 'Установлено';
$l['mail_subject'] = 'Новая установка &soft-1;';
$l['no_cron_min'] = 'Не указаны минуты Cron';
$l['no_cron_hour'] = 'Не указаны часы Cron';
$l['no_cron_day'] = 'Не указаны дни Cron';
$l['no_cron_month'] = 'Не указаны месяцы Cron';
$l['no_cron_weekday'] = 'Не указаны дни недели Cron';
$l['wrong_cron_min'] = 'Cron минуты указаны неправильно. Допустимые значения 0-59 или <b>*</b>';
$l['wrong_cron_hour'] = 'Cron часы указаны неправильно. Допустимые значения 0-23 или <b>*</b>';
$l['wrong_cron_day'] = 'Cron день указан неправильно. Допустимые значения 1-31 или <b>*</b>';
$l['wrong_cron_month'] = 'Cron месяц указан неправильно. Допустимые значения 1-12 или <b>*</b>';
$l['wrong_cron_weekday'] = 'Cron день недели указан неправильно. Допустимые значения 0-7 или <b>*</b>';
$l['mail_cron'] = 'Cron Задание';
$l['no_datadir'] = 'Не указан каталога данных';
$l['datadir_exists'] = 'Указанный каталог существует. Пожалуйста, укажите другой.';
$l['no_decompress_data'] = 'Возникли некоторые ошибки в распаковке файлов данных.';
$l['mail_datadir'] = 'Каталог данных';
$l['some_files_exist'] = 'Установка не может продолжаться, потому что следующие файлы уже существуют в указанной папке : ';
$l['delete_files'] = 'Пожалуйста, удалите файлы или выберите другой каталог.';
$l['overwrite_exist'] = '<b>ИЛИ</b> <br /><input type="checkbox" name="overwrite_existing" id="overwrite_existing" />&nbsp;&nbsp;<b><span style="color:#000;">Установите флажок, чтобы переписать все файлы и продолжать</span></b>';
$l['checking_data'] = 'Checking the submitted data';
$l['unzipping_files'] = 'Copying files and folders';
$l['unzipping_datadir'] = 'Unzipping data files';
$l['prop_db'] = 'Propagating the database';
$l['finishing_process'] = 'Finishing Installation';
$l['wait_note'] = '<b>NOTE:</b> This may take 3-4 minutes. Please do not leave this page until the progress bar reaches 100%';
$l['no_hostname'] = 'Please enter your Database Hostname';
$l['no_dbusername'] = 'Please enter your Database Username';
$l['no_dbuserpass'] = 'Please enter your Database Password';
$l['softdirectory_invalid'] = 'The directory you typed is invalid.';
$l['softdatadir_invalid'] = 'The data directory you typed is invalid.';
$l['err_domain'] = 'No Domain';
$l['err_domain_admin'] = 'This User does not have any Domain. Please contact Administrator.';
$l['err_pass_strength'] = 'Password strength must be greater than ';
$l['no_https'] = 'A trusted SSL Certificate was not found';
$l['err_dbprefix'] = 'Table Prefix is invalid. Valid values are a-z or A-Z or 0-9 or _';
$l['no_php_install'] = 'PHP is not installed. To install it, please click <a href="'.$globals['index'].'act=apps&app=1">here</a>';
$l['no_mysql_install'] = 'MySQL is not installed. To install it, please click <a href="'.$globals['index'].'act=apps&app=16">here</a>';
$l['no_domain_verify'] = 'Could not access your domain. Please make sure your domain is pointing to this server and there is no .htaccess file restricing access to your domain';
$l['auto_backup_not_allowed'] = 'The auto backup frequency you chose is invalid';
$l['invalid_script'] = 'Invalid Script ID';
$l['no_domain_found'] = 'No domain found. Please add a domain to install the script';
$l['not_php_script'] = 'This script is not in PHP';

//Theme Strings
$l['<title>'] = $globals['sn'].' - '.APP.' - ';
$l['install'] = 'Установка';
$l['overview'] = 'Обзор';
$l['features'] = 'Особенности';
$l['demo'] = 'Демо';
$l['ratings'] = 'Рейтинг';
$l['import'] = 'Импорт';
$l['software_ver'] = 'Версия';
$l['space_req'] = 'Требуемое место';
$l['available_space'] = 'Доступное место';
$l['req_space'] = 'Требуемое место';
$l['mb'] = 'МБ';
$l['software_support'] = 'Поддержка Программного Обеспечения';
$l['support_link'] = 'Визит на Сайт Поддержки';
$l['support_note'] = 'Примечание: Softaculous не обеспечивает поддержку для любого программного обеспечения.';
$l['setup'] = 'Установка Программного обеспечения';
$l['choose_domain'] = 'Выберите домен';
$l['choose_domain_exp'] = 'Пожалуйста, выберите домен для установки программного обеспечения.';
$l['in_directory'] = 'В Дирректории';
$l['in_directory_exp'] = 'Каталог относительно вашего домена и он <b>не должен существовать</b>. т.е. Для установки на http://mydomain/dir/ просто введите <b>dir</b>. Для установки только в http://mydomain/ оставьте поле пустым.';
$l['database_name'] = 'Название Базы Данных';
$l['database_name_exp'] = 'Введите название базы данных в которой будет создана установка';
$l['softcopy_note'] = '<b>ПРИМЕЧАНИЕ</b>: Это программное обеспечение требует, чтобы оно было установлено ​​с помощью собственной утилиты установки. Пожалуйста, посетите URL, который будет показан один раз, файлы были скопированы для полного процесса установки.';
$l['softsubmit'] = 'Установка';
$l['congrats'] = 'Поздравляем, Программное обеспечение установлено успешно!';
$l['succesful'] = 'был успешно установлен в';
$l['admin_url'] = 'Административный URL';
$l['setup_continue'] = 'Однако, установка будет завершена самой программой. Для завершения установки, пожалуйста, посетите следующий адрес';
$l['enjoy'] = 'Мы надеемся, что процесс установки прошел легко.';
$l['install_notes'] = 'Ниже приводятся некоторые важные примечания. Настоятельно рекомендуется прочитать их';
$l['please_note'] = '<b>ПРИМЕЧАНИЕ</b>: '.APP.' производит только автоматическую установку программного обеспечения и не предоставляет никакой поддержки для отдельных пакетов программного обеспечения. Пожалуйста, посетите веб-сайт поставщика программного обеспечения для поддержки!';
$l['regards'] = 'С уважением';
$l['softinstaller'] = APP.' Авто Установщик';
$l['return'] = 'Вернуться к Обзору';
$l['current_ins'] = 'Имеющиеся Установки';
$l['link'] = 'Ссылка';
$l['ins_time'] = 'Установлено';
$l['version'] = 'Версия';
$l['upd_to'] = 'Обновить до версии';
$l['remove'] = 'Удалить';
$l['no_info'] = 'Нет Информации';
$l['randpass'] = 'Генерировать случайный пароль';
$l['ratesoft'] = 'Оценить этот скрипт';
$l['reviews'] = 'Отзывы';
$l['reviewsoft'] = 'Напишите свой Отзыв';
$l['readreviews'] = 'Отзывы';
$l['reviews_exp'] = 'Читайте обзоры, написанные другими пользователями и';
$l['cron_job'] = 'CRON Задание';
$l['cron_job_exp'] = 'Этот сценарий требует задания CRON. Пожалуйста, укажите время работы CRON . Если Вы не знаете его, оставьте все как есть!';
$l['cron_min'] = 'Мин';
$l['cron_hour'] = 'Час';
$l['cron_day'] = 'День';
$l['cron_month'] = 'Месяц';
$l['cron_weekday'] = 'Неделя';
$l['datadir'] = 'Директория Данных';
$l['datadir_exp'] = 'Этот сценарий требует, чтобы свои данные хранились в папке, не доступной через Интернет. Она будет создана в вашем домашнем каталоге. Т.е. Если вы укажете <b>datadir</b> будет создано - /home/username/<b>datadir</b>';
$l['db_alpha_num'] = 'Только буквенно-цифровой символы разрешены для имя нахваний баз данных.';
$l['overwrite'] = 'Перезаписать файлы';
$l['ins_emailto'] = 'Отправить детали установки';
$l['choose_protocol'] = 'Выберите протокол';
$l['choose_protocol_exp'] = 'Если ваш сайт имеет SSL, то, пожалуйста, выберите протокол HTTPS.';
$l['clone'] = 'Clone';
$l['backup'] = 'Backup';
$l['options'] = 'Опции';
$l['admin'] = 'Админ';
$l['notify_ver'] = 'Уведомление: '.$globals['sn'].' имеет новую версию';
$l['notifyversion'] = 'Спасибо за информирование о новой версии. Мы будем посмотрим на это как можно скорее';
$l['del_insid'] = 'Вы уверены, что хотите удалить выбранные установки? Действие будет необратимым.\n Никаких дальнейших подтверждения не будет предложено.';
$l['rem_inst_id'] = 'Удаление Установки - ';
$l['no_sel_inst'] = 'Нет установок выбранных для удаления.';
$l['inst_remvd'] = 'Выбранные установки были удалены. Страница будет перезагружена!';
$l['remove'] = 'Удалить';
$l['go'] = 'Начать';
$l['screenshots'] = 'Screenshots'; 
$l['downloading'] = 'Downloading Package'; 
$l['installing'] = 'Installing Script'; 
$l['editdetail'] = 'Edit Details';
$l['publish'] = 'Publish on the Web';
$l['hostname'] = 'Database Hostname';
$l['hostname_exp'] = 'The MySQL hostname (mainly <b>localhost</b>)';
$l['dbusername'] = 'Database Username';
$l['dbusername_exp'] = 'The MySQL username';
$l['dbuserpass'] = 'Database Password';
$l['dbuserpass_exp'] = 'The password of the MySQL user';
$l['database_name_exp_aefer'] = 'Type the name of the database to be used for the installation';
$l['sel_version'] = 'Select Version';
$l['choose_version_exp'] = 'Please select the version to install.';
$l['choose_version'] = 'Choose the version you want to install';
$l['select'] = 'Select';
$l['release_date'] = 'Release Date';
$l['adv_option'] = 'Advanced Options';
$l['disable_notify_update'] = 'Disable Update Notification Emails';
$l['exp_disable_notify_update'] = 'If checked you will not receive an email notification for updates available for this installation.';
$l['prog_installing'] = 'Installing '; // Dont remove trailing space
$l['prog_install_complete'] = 'Installation Completed.';
$l['eu_auto_upgrade'] = 'Auto Upgrade';
$l['exp_eu_auto_upgrade'] = 'If checked, this installation will be automatically upgraded to the latest version when a new version is available.';
$l['auto_upgrade_plugins'] = 'Auto Upgrade &soft-1; Plugins';
$l['exp_auto_upgrade_plugins'] = 'If checked, all the active &soft-1; plugins installed for this installation will be automatically upgraded to the latest version when your script installation is upgraded.';
$l['auto_upgrade_themes'] = 'Auto Upgrade &soft-1; Themes';
$l['exp_auto_upgrade_themes'] = 'If checked, the active &soft-1; theme for this installation will be automatically upgraded to the latest version when your script installation is upgraded.';
$l['auto_upgrade_enabled'] = 'Auto Upgrade Enabled';
$l['bad'] = 'Bad';
$l['good'] = 'Good';
$l['strong'] = 'Strong';
$l['short'] = 'Short';
$l['strength_indicator'] = 'Strength Indicator';
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

$l['choose_theme'] = 'Select Theme';
$l['clear_theme'] = 'Clear selection';
$l['installing_theme'] = 'Installing theme';
$l['cant_download_theme'] = 'Could not download the theme files';
$l['no_theme_package'] = 'The theme installation package could not be found!';
$l['unzipping_theme_files'] = 'Copying themes files and folders';
$l['use_this_theme'] = 'Select this';
$l['err_auto_backup_limit'] = 'The auto backup rotation cannot be more than <b>&soft-1;</b>';
$l['select_domain'] = 'Select Domain';
$l['refresh'] = 'Refresh';
$l['purchase'] = 'Buy';
$l['your_purchased'] = 'Purchased ';//trailing space is required
$l['your_purchased_times'] = ' times(s)';
$l['err_theme_not_bought'] = 'You have not purchased the theme, so could not install it !';
$l['err_theme_reached_limit'] = 'Please buy this theme and try to install it again. You reached the limit of installing this theme.';
$l['payment_heading'] = 'Purchase Theme';
$l['payment_redirect'] = 'You will be redirected to pay ';//trailing space is required
$l['close'] = 'Close';
$l['free'] = 'Free';
$l['select'] = 'Select';
$l['theme_is_optional'] = '<b>Note</b>: This is optional. If not selected, the default theme will be installed';
$l['with_selected'] = 'With Selected';
$l['not_in_free'] = '<b>&soft-1;</b> cannot be installed in the Free version of '.APP.'!';
$l['notify_admin'] = 'Please notify your Server Admin to purchase the premium version of '.APP.'!';
$l['related_scripts'] = 'Related Scripts';

$l['date_added'] = 'Date Added';
$l['downloaded'] = 'Downloaded';

$l['soft_ins_exists'] = 'An installation already exists at &soft-1; as per our records. To re-install the application please uninstall the existing installation!';
$l['install_now'] = 'Install Now';
$l['my_apps'] = 'My Apps';

$l['backup_location'] = 'Backup Location';
$l['backup_location_exp'] = 'Choose the backup location to be used while backing up this installation';
$l['default'] = 'Default';
$l['invalid_backup_location'] = 'Backup location submitted does not exist';
$l['local_folder'] = 'Local Folder';

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