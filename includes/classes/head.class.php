<?php



/*
Set this to true, so that if missed Server Check, The License stuff won't work correctly.
*/

$failsafe_offline = true; 

if (!isset($HOME)) {
    die();
}
if (isset($_GET['rec'])) {
    $_SESSION['singlechk'] = null;
}
error_reporting(0);
ini_set('session.cookie_lifetime', '360');
session_start();
include 'config.php';
/*
In case of update
*/
if (!isset($lang)) {
    $lang = 'en';
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}
require 'includes/lang/'.$lang.'.php';
require_once 'includes/classes/communication.class.php';

    if (!$failsafe_offline) {
        if (false == getEdition($keys)) {
            throw new Exception($lang_1.$license.$lang_2.$lang_3);
            die();
        }
    }

 function isSSL()
 {
     if (!empty($_SERVER['https'])) {
         return true;
     }
     if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' == $_SERVER['HTTP_X_FORWARDED_PROTO']) {
         return true;
     }
     return false;
 }

function ismasterreseller()
{
    return true;
}
function onlymasterreseller()
{
    return true;
}
function onlyadmin()
{
    if ('admin' == $_SESSION['user']) {
    } else {
        die();
    }
}
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $quote = $row[4];
     if ('' == $quote) {
         $quote = '∞';
     }
 }
   mysqli_free_result($result);
    mysqli_close($con);
?>
<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    $communications = new communications;
    $intisp_ver = $communications->getIntISPVersion();

    if (100 == $communications->getDiskPercentage()) {
    $_SESSION["preventative"] = true;
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        $cp = basename($_SERVER['SCRIPT_FILENAME'], '.php');
        if ('cp' == $cp) {
            ?>
         
<?php
        }

include 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection
    $sql = "SELECT value FROM settings WHERE code =  'title' LIMIT 0 , 30";
if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        $site_title = $row[0];
    }
    // Free result set
    mysqli_free_result($result);
}
mysqli_close($con);
 if (isMasterReseller()) {
     if ('admin' == $_SESSION['user']) {
         $usertype = $lang_4;
     } else {
         $usertype = $lang_5;
     }
 } else {
     if ('admin' == $_SESSION['user']) {
         $usertype = $lang_6;
     } else {
         $usertype = $lang_7;
     }
 }
           $whmurl = '';
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'whmurl' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $whmurl = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
       $menu_builder = '';

   if ('admin' == $_SESSION['user']) {
       $menu_builder .= '<h5 class="sidebar-title">'.$lang_14.'</h5>';
       $menu_builder .= '<ul class="nav nav-pills nav-stacked nav-quirk">';

       $menu_builder .= '<li';
       if ('newserv' == $_GET['page']) {
           $menu_builder .= ' class="active"';
       }
       $menu_builder .= '><a href="'.$webroot.'/newserv"><i class="fa fa fa-plus"></i> <span>'.$lang_15.'</span></a></li>';

     
       if ('' != file_get_contents('data/cloudflare')) {
           $menu_builder .= '<li';
           if ('cloudflare' == $_GET['page']) {
               $menu_builder .= ' class="active"';
           }
           $menu_builder .= '><a href="'.$webroot.'/cloudflare"><i class="fa fa fa-cloud"></i> <span>'.$lang_17.'</span></a></li>';
       }
       $menu_builder .= '<li';
       if ('list' == $_GET['page']) {
           $menu_builder .= ' class="active"';
       }
       $menu_builder .= '><a href="'.$webroot.'/list#"><i class="fa fa fa-user"></i> <span>'.$lang_18.'</span></a></li>';

    
       $menu_builder .= ' </ul>
                      <h5 class="sidebar-title">System</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';

       if (ismasterreseller()) {
           $menu_builder .= '<li';
           if ('settings' == $_GET['page']) {
               $menu_builder .= ' class="active"';
           }
           $menu_builder .= '><a href="'.$webroot.'/settings"><i class="fa fa fa-sliders"></i> <span>'.$lang_21.'</span></a></li>';
           $menu_builder .= '<li';
           if ('fman' == $_GET['page']) {
               $menu_builder .= ' class="active"';
           }
           $menu_builder .= '><a href="'.$webroot.'/fman"><i class="fa fa fa-sliders"></i> <span>Root File Manager</span></a></li>';

           $menu_builder .= '<li';
           if ('update' == $_GET['page']) {
               $menu_builder .= ' class="active"';
           }
           $menu_builder .= '><a href="'.$webroot.'/update"><i class="fa fa fa-upload"></i> <span>'.$lang_22.'</span></a></li>';
       }
       $menu_builder .= '<li';
       if ('plug' == $_GET['page']) {
           $menu_builder .= ' class="active"';
       }
       $menu_builder .= '><a href="'.$webroot.'/plug"><i class="fa fa fa-puzzle-piece"></i> <span>'.$lang_23.'</span></a></li>';
       $menu_builder .= '<li';
       if ('terminal' == $_GET['page']) {
           $menu_builder .= ' class="active"';
       }
       $menu_builder .= '><a href="'.$webroot.'/terminal"><i class="fa fa fa-terminal"></i> <span>'.$lang_24.'</span></a></li>';

       if (ismasterreseller()) {
           $menu_builder .= '<li';
           if ('mail' == $_GET['page']) {
               $menu_builder .= ' class="active"';
           }
           $menu_builder .= '><a href="'.$webroot.'/mail"><i class="fa fa fa-envelope-o"></i> <span>'.$lang_25.'</span></a></li>';
       }
       $menu_builder .= '</ul>';
   }
                     $menu_builder .= ' <h5 class="sidebar-title">My Server</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';

                   $menu_builder .= '<li'; if ('cron' == $_GET['page']) {
                   $menu_builder .= ' class="active"';
               }  $menu_builder .= '><a href="'.$webroot.'/cron"><i class="fa fa fa-clock-o"></i> <span>'.$lang_27.'</span></a></li>';
           $menu_builder .= '    <li><a href="thirdparty/phpminiadmin/index.php"><i class="fa fa fa-database"></i> <span>'.$lang_28.'</span></a></li>
             <li><a href="'.$webroot.'/phpinfo"><i class="fa fa fa-code"></i> <span>'.$lang_29.'</span></a></li>
             <li><a href="'.$webroot.'/domain"><i class="fa fa fa-plus"></i> <span>Domains</span></a></li>
                     </ul>';
        if ($CP) {
            $page = 'cp';
        } else {
            $page = $_GET['page'];
        }
echo $twig->render('head.tpl', ['template_dir' => 'templates/'.$template_name,
'intisp_ver' => $intisp_ver,
'site_title' => $site_title,
'edition' => $edition,
'usertype' => $usertype,
'username' => $_SESSION['user'],
'page' => $page,
'lang_8' => $lang_8,
'lang_9' => $lang_9,
'lang_10' => $lang_10,
'lang_11' => $lang_11,
'lang_12' => $lang_12,
'lang_13' => $lang_13,
'whmurl' => $whmurl,
'menu' => $menu_builder,
'webroot' => $webroot, ]);


 if (!isSSL()) {
                           echo $lang_33;
                       }
        if ($CP) {
            if (isset($_GET['con']))
            {
             function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir); 
     foreach ($objects as $object) {
       if ('.' != $object && '..' != $object) {
         if (is_dir($dir.'/'.$object))
           rrmdir($dir.'/'.$object);
         else
           unlink($dir.'/'.$object);
       }
     }
     rmdir($dir);
   }
 }rrmdir('install');
            }
              if (file_exists('install') && "admin" == $_SESSION["user"]) {
                ?>
           <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">The Install Folder Needs to be deleted</h4>
<p>Your installation folder needs to be deleted. Please delete the folder or press the button below. Failing to do so will cause your system to be at risk.</p>
<a href="<?php echo $webroot; ?>/?con" class="btn btn-primary">Delete Install Folder</a>
</div>
          <?php
            }
        } if ($dev_edition) {
            echo $lang_39;
        }
		
	
		
		
		
		
if (isset($_SESSION["preventative"])) {
    ?>
 <div class="alert alert-warning" role="alert">
<b>You have reached your disk limit</b>
<p>To ensure you will not go over your disk limit, functions have been disabled. Please contact your web hosting service or delete some files.<Br>You may also want to upgrade your plan to allow for more storage.</p>
 </div>
    <?php
}
                           if ($communications->overQuota()) {
                               die($lang_34);
                           }

                           ?> 
               <div class="contentpanel">

      <div class="row">
        <div class="col-md-10 col-lg-10 dash-left">
            
        

  
        
              
