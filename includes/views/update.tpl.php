<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
onlyadmin();
ini_set('max_execution_time', 60);
error_reporting(E_ALL);
function redodie($a ="")
{
    $HOME = true;
}
?>
 <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Updates</h2>
<?php




$localScriptsPath = dirname(__FILE__) . '/';
print '
		<style>
			.yxt {width:100%;max-width:100%;font-family:Consolas,Lucida Console,monospace;background-color:#f4f4f4;
				baupdate.php?check_for_updates=trueckground-image:-webkit-graredodient(linear,50% 0%,50% 100%,color-stop(50%,#f4f4f4),color-stop(50%,#e5e5e5));
				background-image:-webkit-linear-graredodient(#f4f4f4 50%,#e5e5e5 50%);
				background-image:-webkit-graredodient(linear,left top,left bottom,color-stop(50%,#f4f4f4),color-stop(50%,#e5e5e5));
				background-image:-webkit-linear-graredodient(#f4f4f4 50%,#e5e5e5 50%);background-image:linear-graredodient(#f4f4f4 50%,#e5e5e5 50%);
				-webkit-background-size:38px 38px;background-size:38px 38px;border:1px solid #c5c5c5;line-height:19px;
				overflow-y:hidden;overflow-x:auto;padding:0 0 0 4px;font-size:small;}
	
		</style>
';
if (version_compare(phpversion(), '4.1') < 0) {
    echo "</div></div></div>";
    $HOME = true;
    require 'includes/classes/footer.class.php';
    die();
}
@set_time_limit(0);
@ini_set('max_execution_time', 0);
@ini_set('memory_limit', '32M');
require_once("includes/classes/communication.class.php");
$currentVersion = $intisp_ver;
if (isset($_GET["force"])) {
    $currentVersion = "0.0.1";
}






$getVersions    = newVersion();
if ($getVersions != '' and $currentVersion != '') {
    print_message(lang('CURRENT VERSION'), $currentVersion, $color = 'grey');
    print_message(lang('WARNING'), lang('The upgrade process will affect all files and folders included in the main script installation.') . '<br>' . lang('This includes all the core files used to run the script.') . '<br>' . lang('If you have made any modifications to those files, your changes will be lost.'), $color = 'red');
    print_message(lang('IMPORTANT'), lang('Before you perform the update, make sure to backup your database and all files!'), $color = 'orange');
    $step = 1;
    print_message(lang('STEP') . ' ' . $step, lang('Reading Current Releases List'), $color = 'grey');
    $versionList = explode("\n", $getVersions);
    sort($versionList);
    foreach ($versionList as $actualVersion) {
        $actualVersion = trim($actualVersion);
        if ($actualVersion > $currentVersion) {
            $step++;
            print_message(lang('STEP') . ' ' . $step, lang('New Update Found &mdash; Version') . ' ' . $actualVersion, $color = 'grey');
            if ($info = @file_get_contents("https://raw.githubusercontent.com/INTisp/INTisp/master/README.md")) {
                print_message(lang('What\'s New'), '<pre class="yxt">' . $info . '</pre>', $color = 'grey');
            }
            $found               = true;
            $actualVersionStrlen = @file_get_contents("includes/master.zip");
            
            if (!file_exists('includes/master.zip')) {
                $step++;
                print_message(lang('STEP') . ' ' . $step, lang('Downloading New Update'), $color = 'grey');
                file_put_contents("includes/master.zip", file_get_contents("https://github.com/INTisp/INTisp/archive/master.zip"));
                $step++;
                print_message(lang('STEP') . ' ' . $step, lang('Update Downloaded And Saved'), $color = 'grey');
                $step++;
                print_message(lang('STEP') . ' ' . $step, lang('Filesize') . ' ' . human_filesize(filesize("includes/master.zip")) . ' MD5SUM ' . md5_file("includes/master.zip") . '</p>', $color = 'grey');
            } else {
                $step++;
                print_message(lang('STEP') . ' ' . $step, lang('Update Already Downloaded And Saved'), $color = 'grey');
                $step++;
                print_message(lang('STEP') . ' ' . $step, lang('Filesize') . ' ' . human_filesize(filesize("includes/master.zip")) . ' MD5SUM ' . md5_file("includes/master.zip") . '</p>', $color = 'grey');
  
            }
          
            if (isset($_GET['doUpdate']) and $_GET['doUpdate'] == true) {
               
                print_message(lang('STEP') . ' ' . $step, lang('Peak Memory Usage') . ' ' . human_filesize(memory_get_peak_usage(true)) . '</p>', $color = 'grey');
                if (!is_dir("includes/tmp")) {
                    if (@mkdir("includes/tmp", 0777, true)) {
                        print_message(lang('CREATED'), " Temperary Storage for Updates.", $color = 'orange');
                    } else {
                        print_message(lang('ERROR'), lang('Could Not Create Dir') . ' ' . lang('Operation Aborted'), $color = 'red');
                        echo "</div></div></div>";
                        $HOME = true;
                        require 'includes/classes/footer.class.php';
                        die();
                    }
                } else {
                    function deleteDirectory($dir)
                    {
                        if (!file_exists($dir)) {
                            return true;
                        }
                        if (!is_dir($dir)) {
                            return unlink($dir);
                        }
                        foreach (scandir($dir) as $item) {
                            if ($item == '.' || $item == '..') {
                                continue;
                            }
                            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                                return false;
                            }
                        }
                        return rmdir($dir);
                    }
                    deleteDirectory("includes/tmp");
                    if (@mkdir("includes/tmp", 0777, true)) {
                        print_message(lang('CREATED'), " Temperary Storage for Updates.", $color = 'orange');
                    } else {
                        print_message(lang('ERROR'), lang('Could Not Create Dir') . ' ' . lang('Operation Aborted'), $color = 'red');
                        echo "</div></div></div>";
                        $HOME = true;
                        require 'includes/classes/footer.class.php';
                        die();
                    }
                }
                $master = 'includes/tmp/';
                function doTheExtraction() {
                    $data   = exec('unzip -d includes/tmp includes/master.zip');
                    if (is_dir("includes/tmp/intisp")) {
                        return;
                    }
                    $zip = new ZipArchive;
                    if ($zip->open('includes/master.zip') === TRUE) {
                    $zip->extractTo('includes/tmp/');
                     $zip->close();
                     return true;
                    } else {
                   return false;
                   die("t");
                    }
                }


                doTheExtraction();
                if (is_dir("includes/tmp/INTisp-master")) {
                    $step++;
                    print_message(lang('STEP') . " " . $step, "File extraction completed.", $color = 'grey');
                } else {
                    print_message(lang('ERROR'), lang('Could Not Read File') . ' master.zip. ' . lang('Operation Aborted'), $color = 'red');
                    echo "</div></div></div>";
                    $HOME = true;
                    require 'includes/classes/footer.class.php';
                    die();
                }
                
                unlink("includes/master.zip");
                function recurse_copy($src, $dst)
                {
                    $dir = opendir($src);
                    @mkdir($dst);
                    while (false !== ($file = readdir($dir))) {
                        if (($file != '.') && ($file != '..')) {
                            if (is_dir($src . '/' . $file)) {
                                recurse_copy($src . '/' . $file, $dst . '/' . $file);
                            } else {
                                copy($src . '/' . $file, $dst . '/' . $file);
                                print_message("COPY", "Copying " . $src . '/' . $file . " to " . $dst . '/' . $file . ".", $color = 'grey');
                            }
                        }
                    }
                    closedir($dir);
                }
                recurse_copy("includes/tmp/INTisp-master", getcwd());
                $step++;
                exec("rm -rf install");
                print_message(lang('STEP') . " " . $step, "Overwrited Directories.", $color = 'grey');
                exec("rm -rf includes/tmp");
                $step++;
                print_message(lang('STEP') . " " . $step, "Cleaning Up.", $color = 'grey');
                $updated = true;
            } else {
                print_message(lang('OK'), lang('Update Ready'), $color = 'green');
                print_message('', '<a class="btn btn-primary" href="' . $webroot . '/update?doUpdate=true">' . lang('Install Now?') . '</a><br><br><br><br><br> <a class="btn btn-danger" href="' . $webroot . '/update?doUpdate=true&force">Emergency Recovery?</a>');
            }
            break;
        }
    }
    if (isset($updated) and $updated == true) {
        include "includes/classes/mail.class.php";
        sendemailuser(
                "System Update/Emergency Recovery",
                "
    <p>IntISP has been updated to version " . $actualVersion . ". Please make sure everything works, if not you will need to either run a emergency restore or restore your backup.</p>
    "
            );
        print_message(lang('READY'), lang('Script Updated To Version') . ' ' . $actualVersion, $color = 'green');
    } elseif (!isset($found) or $found != true) {
        print_message(lang('INFO'), lang('The Newest Version Of The Script Is Version') . ' ' . $currentVersion, $color = 'green');
        print_message(lang('OK'), lang('This Is The Latest Version!'), $color = 'green');
        print_message('', '<a class="btn btn-primary" href="' . $webroot . '/update?check_for_updates=true">' . lang('Check For Updates?') . '</a><br><br><br><br><br> <a class="btn btn-danger" href="' . $webroot . '/update?doUpdate=true&force">Emergency Recovery?</a>');
    }
} elseif ($getVersions == '' or $currentVersion == '') {
    print_message(lang('ERROR'), lang('Could Not Find Latest Releases. Operation Aborted'), $color = 'red');
}
 echo "</div></div></div>";
  $HOME = true;
    require 'includes/classes/footer.class.php';
    die();

function print_message($headline, $message, $color = '')
{
    switch ($color) {
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
function lang($string, $replaceArray = array(), $default = false)
{
    global $lang, $automaticallyScrollToTheBottomOfThePage;
    if (is_array($replaceArray) and count($replaceArray) > 0) {
        $lang[$string] = strReplaceAssoc($replaceArray, $lang[$string]);
    }
    if (isset($automaticallyScrollToTheBottomOfThePage) and $automaticallyScrollToTheBottomOfThePage == true and $string != 'title') {
        $scroll = '<script>window.setTimeout("scrollBy(0,1000)", 500);</script>';
    } else {
        $scroll = '';
    }
    return isset($lang[$string]) ? $lang[$string] . $scroll : ($default ? $default . $scroll : $string . $scroll);
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
?></div></div></div>
<?php
require 'includes/classes/footer.class.php';
?>
