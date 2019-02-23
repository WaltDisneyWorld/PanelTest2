<?php

if (!isset($HOME)) die();
if (isset($_GET["rec"])) {
    $_SESSION["singlechk"] = null;
}
error_reporting(0);
ini_set("session.cookie_lifetime","360");
session_start();
include 'config.php';
/*
In case of update
*/
if (!isset($lang)) $lang = "en";
if (isset($_SESSION["lang"])) $lang = $_SESSION["lang"];
require("includes/lang/" . $lang . ".php");
  $keys = "";
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'register' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $keys = $row[0];
        }
          // Free result set
          mysqli_free_result($result);
    }
    mysqli_close($con);
    require_once("includes/classes/communication.class.php");
   
    if (!$failsafe_offline){
if (getEdition($keys) == false) {
throw new Exception( $lang_1 . $license . $lang_2 . $lang_3);
die();
}
}




 function isSSL()
    {
        if( !empty( $_SERVER['https'] ) )
            return TRUE;
        if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
            return TRUE;
        return FALSE;
    }




function ismasterreseller() {
return true;
    
}
function onlymasterreseller() {
 return true;
}
function onlyadmin() {
     if ($_SESSION['user'] == 'admin') {
         
     } else {
         die();
     }
}
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $quote = $row[4];
     if ($quote == '') {
         $quote = '∞';
     }
 }
   mysqli_free_result($result);
    mysqli_close($con);
?>
<?php
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    if (getDiskPercentage() == 100) {
    ?>
    <h1>You have reached your disk usage limit</h1>
    <p>Please contact support to remove this message.</p>
    <?php
    die();
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        $cp = basename($_SERVER["SCRIPT_FILENAME"], '.php');
        if ($cp == "cp") {
            ?>
         
<?php } 

include 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
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
              if ($_SESSION['user'] == 'admin') {
                   $usertype =  $lang_4;
              } else {
              $usertype =  $lang_5;   
              }
             
          } else {
              if ($_SESSION['user'] == 'admitn') {
               $usertype =  $lang_6;  
              } else {
                  $usertype =  $lang_7;
              }
          }
           $whmurl = "";
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
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
       $menu_builder = "";
   
   if ($_SESSION['user'] == 'admin') {
   

              $menu_builder .=  '<h5 class="sidebar-title">' . $lang_14 . '</h5>';
      $menu_builder .=  '<ul class="nav nav-pills nav-stacked nav-quirk">';
            
            
            
               $menu_builder .=  '<li'; if ($_GET["page"] == "newserv") $menu_builder .=  ' class="active"';
               $menu_builder .=  '><a href="' . $webroot .'/newserv"><i class="fa fa fa-plus"></i> <span>' . $lang_15 . '</span></a></li>';
                
                                            if (ismasterreseller()) {
                                            
              $menu_builder .=  '<li'; if ($_GET["page"] == "newresell")  $menu_builder .=  ' class="active"';  $menu_builder .=  '><a href="' . $webroot .'/newresell"><i class="fa fa fa-plus"></i> <span>' . $lang_16 . '</span></a></li>';
               }
             if (file_get_contents("data/cloudflare") != "") {
                                            
               $menu_builder .=  '<li'; if ($_GET["page"] == "cloudflare")  $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/cloudflare"><i class="fa fa fa-cloud"></i> <span>' . $lang_17 . '</span></a></li>';
               }
          $menu_builder .= '<li'; if ($_GET["page"] == "list")  $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/list#"><i class="fa fa fa-user"></i> <span>' . $lang_18 . '</span></a></li>';
                  
                                                                            if (ismasterreseller()) {
                                                                            
              $menu_builder .= '<li><a href="thirdparty/phpmyadmin/index.php?server=localhost&pma_username=' . urlencode($user) . '&pma_password=' . urlencode($pass) . '"><i class="fa fa fa-database"></i> <span>' . $lang_20 . '</span></a></li>';
              } 
              $menu_builder .=' </ul>
                      <h5 class="sidebar-title">System</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';
        
if (ismasterreseller()) {
    
               $menu_builder .=  '<li';  if ($_GET["page"] == "settings") $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/settings"><i class="fa fa fa-sliders"></i> <span>' .  $lang_21 . '</span></a></li>';
              $menu_builder .=  '<li';  if ($_GET["page"] == "fman") $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/fman"><i class="fa fa fa-sliders"></i> <span>Root File Manager</span></a></li>';
             
               $menu_builder .=  '<li';  if ($_GET["page"] == "update") $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/update"><i class="fa fa fa-upload"></i> <span>' . $lang_22 . '</span></a></li>';
                } 
            $menu_builder .='<li'; if ($_GET["page"] == "plug") $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/plug"><i class="fa fa fa-puzzle-piece"></i> <span>' . $lang_23 . '</span></a></li>';
           $menu_builder .='<li';  if ($_GET["page"] == "terminal") $menu_builder .=  ' class="active"'; $menu_builder .=  '><a href="' . $webroot .'/terminal"><i class="fa fa fa-terminal"></i> <span>' . $lang_24 . '</span></a></li>';
            
                                            if (ismasterreseller()) {
                                            
            $menu_builder .='<li';  if ($_GET["page"] == "mail") $menu_builder .=  ' class="active"';  $menu_builder .=  '><a href="' . $webroot .'/mail"><i class="fa fa fa-envelope-o"></i> <span>' . $lang_25 . '</span></a></li>';
                } 
               $menu_builder .='</ul>';
                }
                     $menu_builder .=' <h5 class="sidebar-title">My Server</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';
       
               $menu_builder .='<li'; if ($_GET["page"] == "FileManager")  $menu_builder .=  ' class="active"';  $menu_builder .=  '><a href="' . $webroot .'/FileManager"><i class="fa fa fa-file"></i> <span>' . $lang_26 . '</span></a></li>';
               $menu_builder .='<li'; if ($_GET["page"] == "cron")  $menu_builder .=  ' class="active"';  $menu_builder .=  '><a href="' . $webroot .'/cron"><i class="fa fa fa-clock-o"></i> <span>' . $lang_27 . '</span></a></li>';
           $menu_builder .= '    <li><a href="thirdparty/phpmyadmin/index.php"><i class="fa fa fa-database"></i> <span>' . $lang_28 . '</span></a></li>
             <li><a href="/phpinfo"><i class="fa fa fa-code"></i> <span>' . $lang_29 . '</span></a></li>
                     </ul>';
		if ($CP) {
			$page = "cp";
		} else {
			$page = $_GET["page"];
		}
echo $twig->render('head.tpl', ['template_dir' => 'templates/' . $template_name,
'intisp_ver' => $intisp_ver,
'site_title' => $site_title,
"edition" => $edition,
"usertype" => $usertype,
"username" => $_SESSION['user'],
"page" => $page,
"lang_8"=> $lang_8,
"lang_9"=> $lang_9,
"lang_10"=> $lang_10,
"lang_11"=> $lang_11,
"lang_12"=> $lang_12,
"lang_13"=> $lang_13,
"whmurl"=>$whmurl,
"menu"=>$menu_builder,
"webroot"=>$webroot]);

 if (!$failsafe_offline) { if ($intisp_ver != file_get_contents("https://httpupdate.enyrx.com/version")) {
    echo $lang_32;

}
}
                       if (!isSSL()) {
                    echo $lang_33;
                           }
		if ($CP) {
		  if (getEdition($keys)["ID"] == 1) {
              ?>
                   <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">This is a free trail.</h4>
<p>This trail will expire in <b><?php echo getEdition($keys)["Exp"]; ?></b> days</p>
<p>Once the trail expires you will not be able to login to this control panel. You will need to install a new key.</p>
</div>
              <?php
          }
          if ($failsafe_offline) {
          ?>
           <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">The Activation Servers are offline</h4>
 <p>The Enyrx Activation Servers seem to be offline or could not be contacted at this time. IntISP automatically switched the version to development mode until the activation servers can be contacted again.</p>
<p>If you continue to see this mes.sage after some time please contact our support. The owner of this server may also be pirating our software. However if you are also not able to access enyrx.com, the user is most likely not pirating.</p>
<a href="<?php echo $webroot; ?>/?rec" class="btn btn-primary">Recheck Activation</a>
</div>
          <?php
          }}if ($dev_edition) {
           echo $lang_39;   
          }
                        
                           if (issues()) {
                               die($lang_34);
                           } 
                           
                           ?> 
               <div class="contentpanel">

      <div class="row">
        <div class="col-md-10 col-lg-10 dash-left">
            
        

  
        
              
