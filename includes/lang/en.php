<?php
require_once("includes/classes/communication.class.php");
# Control Panel
$lang_1 = "Your license key ";
$lang_2 = 	 " has been suspended.  Possible reasons for this include:
                Your license is overdue on payment.
                Your license has been suspended for being used on a banned
                    domain.
                Your license was found to be being used against the End User
                    License Agreement.
   ";
$lang_3 = 	"Please have a customer support representative install a new license key.            
";
$lang_4 = "Root User";
$lang_5 = "Client";
$lang_6 = "Master Reseller";
$lang_7 = "Client";
$lang_8 = "Dashboard";
$lang_9 = "Billing and Support";
$lang_10 = "News";
$lang_11 = "Billing";
$lang_12 = "Assistance";
$lang_13 = "Email History";
$lang_14 = "Servers";
$lang_15 = "New Server";
$lang_16 = "New Reseller";
$lang_17= "Cloudflare";
$lang_18 = "Users";
$lang_19 = "Plans";
$lang_20 = "Master Database";
$lang_21 = "Settings";
$lang_22 = "Updates";
$lang_23 = "Plugins";
$lang_24 = "Terminal";
$lang_25 = "Messages";
$lang_26 = "Files";
$lang_27 = "Cronjob";
$lang_28 = "Database";
$lang_29 = "PHP Info";
$lang_30 = "Forum";
$lang_31 = "Support";
if (isset($failsafe_offline) && $failsafe_offline) {
    $lang_32 = '        <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">VX IntISP Update Ready to Install.</h4>
<p>An update is ready to be installed, this update may fix installation issues, recover security issues, and add new features.</p>
<a href="index.php?page=update" class="btn btn-primary">Run Update</a>
</div>';
} else {
    $lang_32 = '        <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">V' . file_get_contents("https://httpupdate.enyrx.com/version") . ' IntISP Update Ready to Install.</h4>
<p>An update is ready to be installed, this update may fix installation issues, recover security issues, and add new features.</p>
<a href="index.php?page=update" class="btn btn-primary">Run Update</a>
</div>';
}

$lang_33 = '    <div class="alert alert-danger" role="alert">
 <h4 class="alert-heading">Unsecure Connection</h4>
<p>The connection to the control panel is not secure. Please make sure you have a valid SSL Certificate and your connection is secure.</p>
</div>';
$lang_34 = " <div class='notification is-danger'>Please contact support if you are having issues.Your plan quota has been reached.</div>
                              ";
$lang_35 = "System Stats";
$lang_36 = "Users";
$lang_37 = "Failed Logins";
$lang_38 = "Time on Server";
$lang_39 = '    <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">Development Edition</h4>
 <p>This copy of IntISP is not allowed to be used for production purposes. This is a development copy only, if this system is being used for production purposes. Please get a refund and contact piracy@enyrx.com. Thank You for your support.</p>
  <p></p>
</div>';
$lang_40 = "Failed Logins";
$lang_41 = "Version";
$lang_42 = "Status";
$lang_43 = "Power Management";
$lang_44 = "Restart";
$lang_45 = "Servers";
$lang_46 = "System";
$lang_47 = "My Server";
$lang_48 = "Cron Job has been Created";
$lang_49 = "Time";
$lang_50 = "PHP File";
$lang_51 = "Add Cron Job";
$lang_52 = "Command";
$lang_53 = '   <h2 class="page-title">File Manager</h2>
                        <p>MonstaFTP is a thirdparty service. We offer the free version of Monsta with every version of IntISP. If you would like users to be able to edit files or access premium features, you will need to buy a license from them. If you are a client and you are seeing this message, please ignore this or contact the administrator of this web host.</p>
';
$lang_54 = "List Users";
$lang_55 = "Username";
$lang_56 = "Port";
$lang_57 = '   <th>Subject</th>
        <th>Message</th><th>Delete?</th>';
$lang_58 = "Password";
$lang_59 = "Disk Space in MB";
$lang_60 = "<p>This could take a very long time. Once you create a user, please do not exit away from this page.</p>
               ";
$lang_61 = "Plugin";
$lang_62 = "Version";
$lang_63 = "Description";
$lang_64 = "Title";
$lang_65 = "Logo";
$lang_66 = "Forum URL";
$lang_67 = "Support URL";
$lang_68 = "Advertising";
$lang_69 = "Change settings";
$lang_70 = "Sign in";
$lang_71 = "Wrong Username or Password!";
$lang = array();
$grey                                                                                                    = ' style="border-left:7px solid #bcbcbc;padding-left:12px;list-style-type:none"';
$red                                                                                                     = ' style="border-left:7px solid #dd3d36;padding-left:12px;list-style-type:none"';
$orange                                                                                                  = ' style="border-left:7px solid #ffba00;padding-left:12px;list-style-type:none"';
$green                                                                                                   = ' style="border-left:7px solid #7ad03a;padding-left:12px;list-style-type:none"';
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
