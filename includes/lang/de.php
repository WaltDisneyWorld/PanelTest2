<?php
error_reporting(0);

$lang_1 = '<p> Ihr Lizenzschlüssel';
$lang_2 = 'wurde ausgesetzt. Mögliche Gründe hierfür sind: </ p>
            <ul>
                <li> Ihre Lizenz ist bei Zahlung überfällig </ li>
                <li> Ihre Lizenz wurde wegen eines Verbots gesperrt
                    Domain </ li>
                <li> Ihre Lizenz wurde für den Endbenutzer verwendet
                    Lizenzvereinbarung </ li>
            </ ul>
            <p>
   ';
$lang_3 = 'Bitte lassen Sie einen neuen Lizenzschlüssel von einem Kundenbetreuer installieren. </ p>
';
$lang_4 = 'Root-Benutzer';
$lang_5 = 'Client';
$lang_6 = 'Master Reseller';
$lang_7 = 'Client';
$lang_8 = 'Dashboard';
$lang_9 = 'Abrechnung und Support';
$lang_10 = 'News';
$lang_11 = 'Abrechnung';
$lang_12 = 'Unterstützung';
$lang_13 = 'E-Mail-Verlauf';
$lang_14 = 'Server';
$lang_15 = 'Neuer Server';
$lang_16 = 'Neuer Reseller';
$lang_17 = 'Cloudflare';
$lang_18 = 'Benutzer';
$lang_19 = 'Pläne';
$lang_20 = 'Master-Datenbank';
$lang_21 = 'Einstellungen';
$lang_22 = 'Updates';
$lang_23 = 'Plugins';
$lang_24 = 'Terminal';
$lang_25 = 'Nachrichten';
$lang_26 = 'Dateien';
$lang_27 = 'Cronjob';
$lang_28 = 'Datenbank';
$lang_29 = 'PHP Info';
$lang_30 = 'Forum';
$lang_31 = 'Unterstützung';
if (isset($failsafe_offline) && $failsafe_offline) {
    $lang_32 = "<div class =' alert alert-warning 'role =' alert '>
 <h4 class = 'alert-heading'> VX IntISP-Update kann installiert werden. </ h4>
<p> Ein Update kann installiert werden. Dieses Update kann Installationsprobleme beheben, Sicherheitsprobleme beheben und neue Funktionen hinzufügen. </ p>
<a href='index.php?page=update' class='btn btn-primary'> Update ausführen </a>
</ div> ";
} else {
    $lang_32 = "<div class =' alert alert-warning 'role =' alert '>
 <h4 class = 'alert-heading'> V '. file_get_contents (' https://httpupdate.enyrx.com/version ').' IntISP-Update kann installiert werden. </ h4>
<p> Ein Update kann installiert werden. Dieses Update kann Installationsprobleme beheben, Sicherheitsprobleme beheben und neue Funktionen hinzufügen. </ p>
<a href='index.php?page=update' class='btn btn-primary'> Update ausführen </a>
</ div> ";
}
$lang_33 = "<div class =' alert alert-danger 'role =' alert '>
 <h4 class = 'alert-heading'> Unsichere Verbindung </ h4>
<p> Die Verbindung zum Control Panel ist nicht sicher. Stellen Sie sicher, dass Sie über ein gültiges SSL-Zertifikat verfügen und Ihre Verbindung sicher ist. </ P>
</ div> ";
$lang_34 = "<div class =' notification is-danger '> Wenden Sie sich bitte an den Support, wenn Sie Probleme haben. Ihre Kontingentquote wurde erreicht. </ div>
                              ";
$lang_35 = 'Systemstatistiken';
$lang_36 = 'Benutzer';
$lang_37 = 'Fehlgeschlagene Anmeldungen';
$lang_38 = 'Zeit auf dem Server';
$lang_39 = "<div class =' alert alert-warning 'role =' alert '>
 <h4 class = 'alert-heading'> Entwicklungsversion </ h4>
 <p> Diese Kopie von IntISP darf nicht für Produktionszwecke verwendet werden. Dies ist nur eine Entwicklungskopie, wenn dieses System für Produktionszwecke verwendet wird. Bitte erhalte eine Rückerstattung und kontaktiere piracy@enyrx.com. Vielen Dank für Ihre Unterstützung. </ P>
  <p> </ p>
</ div> ";
$lang_40 = 'Fehlgeschlagene Anmeldungen';
$lang_41 = 'Version';
$lang_42 = 'Status';
$lang_43 = 'Energieverwaltung';
$lang_44 = 'Neustart';
$lang_45 = 'Server';
$lang_46 = 'System';
$lang_47 = 'Mein Server';
$lang_48 = 'Cron Job wurde erstellt';
$lang_49 = 'Zeit';
$lang_50 = 'PHP-Datei';
$lang_51 = 'Cron Job hinzufügen';
$lang_52 = 'Befehl';
$lang_53 = "<h2 class =' page-title '> Dateimanager </ h2>
                        <p> MonstaFTP ist ein Fremdanbieter. Wir bieten die kostenlose Version von Monsta mit jeder Version von IntISP an. Wenn Sie möchten, dass Benutzer Dateien bearbeiten oder auf Premium-Funktionen zugreifen können, müssen Sie eine Lizenz von ihnen erwerben. Wenn Sie ein Kunde sind und diese Meldung sehen, ignorieren Sie dies bitte oder wenden Sie sich an den Administrator dieses Webhosts. </ P>
";
$lang_54 = 'Benutzer auflisten';
$lang_55 = 'Benutzername';
$lang_56 = 'Port';
$lang_57 = '<th> Betreff </ th>
        <th> Nachricht </ th> <th> Löschen? </ th> ';
$lang_58 = 'Passwort';
$lang_59 = 'Speicherplatz in MB';
$lang_60 = '<p> Dies kann sehr lange dauern. Wenn Sie einen Benutzer erstellt haben, verlassen Sie diese Seite nicht. </ p>
               ';
$lang_61 = 'Plugin';
$lang_62 = 'Version';
$lang_63 = 'Beschreibung';
$lang_64 = 'Titel';
$lang_65 = 'Logo';
$lang_66 = 'Forum-URL';
$lang_67 = 'Support-URL';
$lang_68 = 'Werbung';
$lang_69 = 'Einstellungen ändern';
$lang_70 = 'Anmelden';
$lang_71 = 'Falscher Benutzername oder Passwort!';
$grey                                                                                                    = ' style="border-left:7px solid #bcbcbc;padding-left:12px;list-style-type:none"';
$red                                                                                                     = ' style="border-left:7px solid #dd3d36;padding-left:12px;list-style-type:none"';
$orange                                                                                                  = ' style="border-left:7px solid #ffba00;padding-left:12px;list-style-type:none"';
$green                                                                                                   = ' style="border-left:7px solid #7ad03a;padding-left:12px;list-style-type:none"';
$lang = array();
$lang['title']                                                                                           = 'Update';
$lang['DYNAMIC UPDATE SYSTEM']                                                                           = 'INTISP UPDATE SYSTEM';
$lang['ERROR']                                                                                           = 'ERROR';
$lang['Could Not Read Current-Version. Operation Aborted']                                               = 'Could Not Read Current-Version. Operation Aborted';
$lang['Could Not Read New-Versions. Operation Aborted']                                                  = 'Could Not Read New-Versions. Operation Aborted';
$lang['CURRENT VERSION']                                                                                 = 'CURRENT VERSION';
$lang['WARNING']                                                                                         = 'WARNING';
$lang['The upgrade process will affect all files and folders included in the main script installation.'] = 'The upgrade process will affect all files and folders that are being used by intisp.';
$lang['This includes all the core files used to run the script.']                                        = 'This includes all the core files used to run the Intisp and other user files.';
$lang['If you have made any modifications to those files, your changes will be lost.']                   = 'If you have made any modifications to those files, your changes will be lost.';
$lang['IMPORTANT']                                                                                       = 'IMPORTANT';
$lang['Before you perform the update, make sure to backup your database and all files!']                 = 'Before you perform the update, make sure to backup your database and all files!';
$lang['STEP']                                                                                            = 'STEP';
$lang['IMPORTANT']                                                                                       = 'IMPORTANT';
$lang['Reading Current Releases List']                                                                   = 'Reading Current Releases List';
$lang['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$lang['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$lang['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$lang['Downloading New Update']                                                                          = 'Downloading New Update';
$lang['Update Downloaded And Saved']                                                                     = 'Update Downloaded And Saved';
$lang['Already Downloaded File Is Outdatet']                                                             = 'Already Downloaded File Is Outdatet';
$lang['File Is Downloaded And Saved New']                                                                = 'File Is Downloaded And Saved New';
$lang['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$lang['DO']                                                                                              = 'DO';
$lang['CREATED']                                                                                         = 'CREATED';
$lang['EXECUTED']                                                                                        = 'EXECUTED';
$lang['UPDATED']                                                                                         = 'UPDATED';
$lang['Dir']                                                                                             = 'Dir';
$lang['File']                                                                                            = 'File';
$lang['Update Ready']                                                                                    = 'Update Ready';
$lang['Install Now?']                                                                                    = 'Install Now?';
$lang['READY']                                                                                           = 'READY';
$lang['Script Updated To Version']                                                                       = 'Script Updated To Version';
$lang['Check For Updates?']                                                                              = 'Check For Updates?';
$lang['INFO']                                                                                            = 'INFO';
$lang['The Newest Version Of The Script Is Version']                                                     = 'The Newest Version Of The Script Is Version';
$lang['OK']                                                                                              = 'OK';
$lang['This Is The Latest Version!']                                                                     = 'This Is The Latest Version!';
$lang['Check For Updates?']                                                                              = 'Check For Updates?';
$lang['Could Not Find Latest Releases. Operation Aborted']                                               = 'Could Not Find Latest Releases. Operation Aborted';
$lang['Could Not Read File']                                                                             = 'Could Not Read File';
$lang['Could Not Save New Update. Operation Aborted']                                                    = 'Could Not Save New Update. Operation Aborted';
$lang['Could Not Delete File']                                                                           = 'Could Not Delete File';
$lang['DELETE']                                                                                          = 'DELETE';
$lang['What\'s New']                                                                                     = 'What\'s New';
$lang['PHP 4.1 or greater is required. Operation Aborted']                                               = 'PHP 4.1 or greater is required. Operation Aborted';
$lang['Could Not Create Dir']                                                                            = 'Could Not Create Dir';
$lang['Could Not Create File']                                                                           = 'Could Not Create File';
$lang['Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted']                             = 'Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted';
$lang['not downloaded']                                                                                  = 'not downloaded';
$lang['Operation Aborted']                                                                               = 'Operation Aborted';
$lang['Download']                                                                                        = 'Download';
$lang['Filesize']                                                                                        = 'Filesize';
$lang['Changelog']                                                                                       = 'Changelog';
$lang['Peak Memory Usage']                                                                               = 'Peak Memory Usage';
