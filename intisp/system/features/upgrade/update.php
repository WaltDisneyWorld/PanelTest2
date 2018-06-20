<?PHP
$grey                                                                                                    = ' style="border-left:7px solid #bcbcbc;padding-left:12px;list-style-type:none"';
$red                                                                                                     = ' style="border-left:7px solid #dd3d36;padding-left:12px;list-style-type:none"';
$orange                                                                                                  = ' style="border-left:7px solid #ffba00;padding-left:12px;list-style-type:none"';
$green                                                                                                   = ' style="border-left:7px solid #7ad03a;padding-left:12px;list-style-type:none"';
$i18n['title']                                                                                           = 'Update';
$i18n['DYNAMIC UPDATE SYSTEM']                                                                           = 'INTISP UPDATE SYSTEM';
$i18n['ERROR']                                                                                           = 'ERROR';
$i18n['Could Not Read Current-Version. Operation Aborted']                                               = 'Could Not Read Current-Version. Operation Aborted';
$i18n['Could Not Read New-Versions. Operation Aborted']                                                  = 'Could Not Read New-Versions. Operation Aborted';
$i18n['CURRENT VERSION']                                                                                 = 'CURRENT VERSION';
$i18n['WARNING']                                                                                         = 'WARNING';
$i18n['The upgrade process will affect all files and folders included in the main script installation.'] = 'The upgrade process will affect all files and folders that are being used by intisp.';
$i18n['This includes all the core files used to run the script.']                                        = 'This includes all the core files used to run the Intisp and other user files.';
$i18n['If you have made any modifications to those files, your changes will be lost.']                   = 'If you have made any modifications to those files, your changes will be lost.';
$i18n['IMPORTANT']                                                                                       = 'IMPORTANT';
$i18n['Before you perform the update, make sure to backup your database and all files!']                 = 'Before you perform the update, make sure to backup your database and all files!';
$i18n['STEP']                                                                                            = 'STEP';
$i18n['IMPORTANT']                                                                                       = 'IMPORTANT';
$i18n['Reading Current Releases List']                                                                   = 'Reading Current Releases List';
$i18n['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$i18n['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$i18n['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$i18n['Downloading New Update']                                                                          = 'Downloading New Update';
$i18n['Update Downloaded And Saved']                                                                     = 'Update Downloaded And Saved';
$i18n['Already Downloaded File Is Outdatet']                                                             = 'Already Downloaded File Is Outdatet';
$i18n['File Is Downloaded And Saved New']                                                                = 'File Is Downloaded And Saved New';
$i18n['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$i18n['DO']                                                                                              = 'DO';
$i18n['CREATED']                                                                                         = 'CREATED';
$i18n['EXECUTED']                                                                                        = 'EXECUTED';
$i18n['UPDATED']                                                                                         = 'UPDATED';
$i18n['Dir']                                                                                             = 'Dir';
$i18n['File']                                                                                            = 'File';
$i18n['Update Ready']                                                                                    = 'Update Ready';
$i18n['Install Now?']                                                                                    = 'Install Now?';
$i18n['READY']                                                                                           = 'READY';
$i18n['Script Updated To Version']                                                                       = 'Script Updated To Version';
$i18n['Check For Updates?']                                                                              = 'Check For Updates?';
$i18n['INFO']                                                                                            = 'INFO';
$i18n['The Newest Version Of The Script Is Version']                                                     = 'The Newest Version Of The Script Is Version';
$i18n['OK']                                                                                              = 'OK';
$i18n['This Is The Latest Version!']                                                                     = 'This Is The Latest Version!';
$i18n['Check For Updates?']                                                                              = 'Check For Updates?';
$i18n['Could Not Find Latest Releases. Operation Aborted']                                               = 'Could Not Find Latest Releases. Operation Aborted';
$i18n['Could Not Read File']                                                                             = 'Could Not Read File';
$i18n['Could Not Save New Update. Operation Aborted']                                                    = 'Could Not Save New Update. Operation Aborted';
$i18n['Could Not Delete File']                                                                           = 'Could Not Delete File';
$i18n['DELETE']                                                                                          = 'DELETE';
$i18n['What\'s New']                                                                                     = 'What\'s New';
$i18n['PHP 4.1 or greater is required. Operation Aborted']                                               = 'PHP 4.1 or greater is required. Operation Aborted';
$i18n['Could Not Create Dir']                                                                            = 'Could Not Create Dir';
$i18n['Could Not Create File']                                                                           = 'Could Not Create File';
$i18n['Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted']                             = 'Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted';
$i18n['not downloaded']                                                                                  = 'not downloaded';
$i18n['Operation Aborted']                                                                               = 'Operation Aborted';
$i18n['Download']                                                                                        = 'Download';
$i18n['Filesize']                                                                                        = 'Filesize';
$i18n['Changelog']                                                                                       = 'Changelog';
$i18n['Peak Memory Usage']                                                                               = 'Peak Memory Usage';
$localScriptsPath = dirname(__FILE__) . '/';
print '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>' . i18n('title') . '</title>
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<style>/* ORANGE 000 #ff9632  */
			::-moz-selection{color:#fff;text-shadow:none;background:#80ba42;} /* GREEN */
			::selection{color:#fff;text-shadow:none;background:#80ba42;} /* GREEN */
			*{font-family:monospace;}
			pre{width:100%;max-width:100%;font-family:Consolas,Lucida Console,monospace;background-color:#f4f4f4;
				baupdate.php?check_for_updates=trueckground-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(50%,#f4f4f4),color-stop(50%,#e5e5e5));
				background-image:-webkit-linear-gradient(#f4f4f4 50%,#e5e5e5 50%);
				background-image:-webkit-gradient(linear,left top,left bottom,color-stop(50%,#f4f4f4),color-stop(50%,#e5e5e5));
				background-image:-webkit-linear-gradient(#f4f4f4 50%,#e5e5e5 50%);background-image:linear-gradient(#f4f4f4 50%,#e5e5e5 50%);
				-webkit-background-size:38px 38px;background-size:38px 38px;border:1px solid #c5c5c5;line-height:19px;
				overflow-y:hidden;overflow-x:auto;padding:0 0 0 4px;font-size:small;}
			@media only screen and (min-width:760px){pre{width:616px;max-width:616px}}
			a{margin-left:4px;color:#328efe;padding:7px;}
			a:hover{text-decoration:none;color:white;background-color:#328efe;padding:7px;}
		</style>
		
	</head>
	<body style="background-color:white;">
		<h1>' . i18n('DYNAMIC UPDATE SYSTEM') . '</h1>
';
if (version_compare(phpversion(), '4.1') < 0)
  {
    die(print_message(i18n('ERROR'), i18n('PHP 4.1 or greater is required.'), $color = 'red'));
  }
@set_time_limit(0);
@ini_set('max_execution_time', 0);
@ini_set('memory_limit', '32M');
$currentVersion = file_get_contents("../../data/version");
$getVersions    = file_get_contents("https://raw.githubusercontent.com/INTisp/INTisp/master/intisp/system/data/version");
if ($getVersions != '' and $currentVersion != '')
  {
    print_message(i18n('CURRENT VERSION'), $currentVersion, $color = 'grey');
    print_message(i18n('WARNING'), i18n('The upgrade process will affect all files and folders included in the main script installation.') . '<br>' . i18n('This includes all the core files used to run the script.') . '<br>' . i18n('If you have made any modifications to those files, your changes will be lost.'), $color = 'red');
    print_message(i18n('IMPORTANT'), i18n('Before you perform the update, make sure to backup your database and all files!'), $color = 'orange');
    $step = 1;
    print_message(i18n('STEP') . ' ' . $step, i18n('Reading Current Releases List'), $color = 'grey');
    $versionList = explode("\n", $getVersions);
    sort($versionList);
    foreach ($versionList as $actualVersion)
      {
        $actualVersion = trim($actualVersion);
        if ($actualVersion > $currentVersion)
          {
            $step++;
            print_message(i18n('STEP') . ' ' . $step, i18n('New Update Found &mdash; Version') . ' ' . $actualVersion, $color = 'grey');
            if ($info = @file_get_contents("https://raw.githubusercontent.com/INTisp/INTisp/master/changelog.txt"))
              {
                print_message(i18n('What\'s New'), '<pre>' . $info . '</pre>', $color = 'grey');
              }
            $found               = true;
            $actualVersionStrlen = @file_get_contents("/var/webister/master.zip");
            if (!file_exists('/var/webister/master.zip'))
              {
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('Downloading New Update'), $color = 'grey');
                file_put_contents("/var/webister/master.zip", file_get_contents("https://github.com/INTisp/INTisp/archive/master.zip"));
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('Update Downloaded And Saved'), $color = 'grey');
              }
            else if ($actualVersionStrlen != @file_get_contents("https://github.com/INTisp/INTisp/archive/master.zip"))
              {
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('Already Downloaded File Is Outdatet'), $color = 'grey');
                file_put_contents("/var/webister/master.zip", file_get_contents("https://github.com/INTisp/INTisp/archive/master.zip"));
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('File Is Downloaded And Saved New'), $color = 'grey');
              }
            else
              {
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('Update Already Downloaded'), $color = 'grey');
                $step++;
                print_message(i18n('STEP') . ' ' . $step, i18n('Filesize') . ' ' . human_filesize(filesize("/var/webister/master.zip")) . '</p>', $color = 'grey');
              }
            if (isset($_GET['doUpdate']) and $_GET['doUpdate'] == true)
              {
                print_message(i18n('STEP') . ' ' . $step, i18n('Peak Memory Usage') . ' ' . human_filesize(memory_get_peak_usage(TRUE)) . '</p>', $color = 'grey');
                if (!is_dir("/var/webister/tmp"))
                  {
                    if (@mkdir("/var/webister/tmp", 0777, true))
                      {
                        print_message(i18n('CREATED'), " Temperary Storage for Updates.", $color = 'orange');
                      }
                    else
                      {
                        print_message(i18n('ERROR'), i18n('Could Not Create Dir') . ' ' . i18n('Operation Aborted'), $color = 'red');
                        die('</body></html>');
                      }
                  }
                else
                  {
                    function deleteDirectory($dir)
                      {
                        if (!file_exists($dir))
                          {
                            return true;
                          }
                        if (!is_dir($dir))
                          {
                            return unlink($dir);
                          }
                        foreach (scandir($dir) as $item)
                          {
                            if ($item == '.' || $item == '..')
                              {
                                continue;
                              }
                            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item))
                              {
                                return false;
                              }
                          }
                        return rmdir($dir);
                      }
                    deleteDirectory("/var/webister/tmp");
                    if (@mkdir("/var/webister/tmp", 0777, true))
                      {
                        print_message(i18n('CREATED'), " Temperary Storage for Updates.", $color = 'orange');
                      }
                    else
                      {
                        print_message(i18n('ERROR'), i18n('Could Not Create Dir') . ' ' . i18n('Operation Aborted'), $color = 'red');
                        die('</body></html>');
                      }
                  }
                $master = '/var/webister/master';
                $data   = exec('unzip -d /var/webister/tmp ' . $master . '.zip');
                if (is_dir("/var/webister/tmp/INTisp-master"))
                  {
                    $step++;
                    print_message(i18n('STEP') . " " . $step, "File extraction completed.", $color = 'grey');
                  }
                else
                  {
                    print_message(i18n('ERROR'), i18n('Could Not Read File') . ' master.zip. ' . i18n('Operation Aborted'), $color = 'red');
                    die('</body></html>');
                  }
                unlink("/var/webister/master.zip");
                function recurse_copy($src, $dst)
                  {
                    $dir = opendir($src);
                    @mkdir($dst);
                    while (false !== ($file = readdir($dir)))
                      {
                        if (($file != '.') && ($file != '..'))
                          {
                            if (is_dir($src . '/' . $file))
                              {
                                recurse_copy($src . '/' . $file, $dst . '/' . $file);
                              }
                            else
                              {
                                copy($src . '/' . $file, $dst . '/' . $file);
                                print_message("COPY", "Copying " . $src . '/' . $file . " to " . $dst . '/' . $file . ".", $color = 'grey');
                              }
                          }
                      }
                    closedir($dir);
                  }
                recurse_copy("/var/webister/tmp/INTisp-master/intisp/system/", "/var/www/html/interface/");
                $step++;
                print_message(i18n('STEP') . " " . $step, "Overwrited Directories.", $color = 'grey');
                deleteDirectory("/var/webister/tmp");
                $step++;
                print_message(i18n('STEP') . " " . $step, "Cleaning Up.", $color = 'grey');
                $updated = TRUE;
              }
            else
              {
                print_message(i18n('OK'), i18n('Update Ready'), $color = 'green');
                print_message('', '&raquo; <a href="?doUpdate=true">' . i18n('Install Now?') . '</a>');
              }
            break;
          }
      }
    if (isset($updated) and $updated == true)
      {
        print_message(i18n('READY'), i18n('Script Updated To Version') . ' ' . $actualVersion, $color = 'green');
      }
    else if (!isset($found) or $found != true)
      {
        print_message(i18n('INFO'), i18n('The Newest Version Of The Script Is Version') . ' ' . $currentVersion, $color = 'green');
        print_message(i18n('OK'), i18n('This Is The Latest Version!'), $color = 'green');
        print_message('', '&raquo; <a href="?check_for_updates=true">' . i18n('Check For Updates?') . '</a>');
      }
  }
else if ($getVersions == '' OR $currentVersion == '')
  {
    print_message(i18n('ERROR'), i18n('Could Not Find Latest Releases. Operation Aborted'), $color = 'red');
  }
die('</body></html>');
function print_message($headline, $message, $color = '')
  {
    switch ($color)
    {
        case 'red':
            global $red;
            $color = $red;
            break;
        case 'orange':
            global $orange;
            $color = $orange;
            break;
        case 'green':
            global $green;
            $color = $green;
            break;
        case '':
            $color = '';
            break;
        default:
            global $grey;
            $color = $grey;
            break;
    }
    print '<p' . $color . '><b>' . $headline . '</b><br>' . $message . '</p>';
  }
function i18n($string, $replaceArray = array(), $default = false)
  {
    global $i18n, $automaticallyScrollToTheBottomOfThePage;
    if (is_array($replaceArray) and count($replaceArray) > 0)
      {
        $i18n[$string] = strReplaceAssoc($replaceArray, $i18n[$string]);
      }
    if (isset($automaticallyScrollToTheBottomOfThePage) and $automaticallyScrollToTheBottomOfThePage == TRUE and $string != 'title')
      {
        $scroll = '<script>window.setTimeout("scrollBy(0,1000)", 500);</script>';
      }
    else
      {
        $scroll = '';
      }
    return isset($i18n[$string]) ? $i18n[$string] . $scroll : ($default ? $default . $scroll : $string . $scroll);
  }
function human_filesize($bytes, $decimals = 2)
  {
    $unit = array(
        'B',
        'KB',
        'MB',
        'GB',
        'TB',
        'PB'
    );
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $decimals) . ' ' . $unit[$i];
  }
