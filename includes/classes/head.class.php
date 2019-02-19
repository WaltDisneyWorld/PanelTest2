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
    header('Location: index.php');
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
         
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>IntISP Control Panel</title>
<script src="public/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="public/lib/Hover/hover.css">
  <link rel="stylesheet" href="public/lib/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" href="public/lib/weather-icons/css/weather-icons.css">
  <link rel="stylesheet" href="public/lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="public/lib/jquery-toggles/toggles-full.css">


  <link rel="stylesheet" href="public/css/styles.css">

  <script src="public/lib/modernizr/modernizr.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../public/lib/html5shiv/html5shiv.js"></script>
  <script src="../public/lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body>

<header>
  <div class="headerpanel">

    <div class="logopanel">
      <h2><a href="index.php?page=cp"><?php
include 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection
    $sql = "SELECT value FROM settings WHERE code =  'title' LIMIT 0 , 30";
if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
      printf($row[0]);
  }
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($con);
?></a></h2>

    </div><!-- logopanel -->

    <div class="headerbar">
    
      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

     
      
      <div class="header-right">
        <ul class="headermenu">
            
          <li>
            <div id="noticePanel" class="btn-group">
                       <button onclick="location.href='index.php?page=cp';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-home"></i>
              </button>
                          <button onclick="location.href='index.php?page=FileManager';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-file"></i>
              </button>
                <button onclick="location.href='thirdparty/phpmyadmin/index.php';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-database"></i>
              </button>
              <button data-toggle="modal" data-target="#myModal" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-user"></i>
              </button>
            <button onclick="location.href='action.php?action=exit';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-sign-out"></i>
              </button> 
              </div>
              </li>
              </ul>
              </div>
          </div><!-- header-right -->
    </div><!-- headerbar -->
  </div><!-- header-->
</header>

<section>
    
  <div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->
          <div class="media leftpanel-profile">
        <div class="media-left">
     
        </div>
         <div class="media-body">
          <h4 class="media-heading">IntISP <?php echo $intisp_ver; ?><br>
              <?php echo $edition; ?>
              </h4>
              </div>
        <br>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $_SESSION['user']; ?> </h4>
          <span><?php
          if (isMasterReseller()) {
              if ($_SESSION['user'] == 'admin') {
                   echo $lang_4;
              } else {
              echo $lang_5;   
              }
             
          } else {
              if ($_SESSION['user'] == 'admitn') {
               echo $lang_6;  
              } else {
                  echo $lang_7;
              }
          }
          ?></span>
        </div>
      </div><!-- leftpanel-profile -->


          </li>
        </ul>
      </div><!-- leftpanel-userinfo -->
       <div class="tab-content">

        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
                   <ul class="nav nav-pills nav-stacked nav-quirk">
               <li <?php if ($_GET["page"] == "cp") echo 'class="active"'; ?>><a href="index.php?page=cp"><i class="fa fa-home"></i> <span><?php echo $lang_8; ?></span></a></li>
               </ul>
        <?php 
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


  if ($whmurl != "") {
 
  ?>
          <h5 class="sidebar-title"><?php echo $lang_9; ?></h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li><a href="<?php echo $whmurl; ?>/clientarea.php"><i class="fa fa fa-newspaper-o"></i> <span><?php echo $lang_10; ?></span></a></li>
               <li><a href="<?php echo $whmurl; ?>/clientarea.php"><i class="fa fa fa-credit-card"></i> <span><?php echo $lang_11; ?></span></a></li>
               <li><a href="<?php echo $whmurl; ?>/index.php?rp=/knowledgebase"><i class="fa fa-question-circle"></i> <span><?php echo $lang_12; ?></span></a></li>
               <li><a href="<?php echo $whmurl; ?>/clientarea.php?action=emails"><i class="fa fa fa-envelope-o"></i> <span><?php echo $lang_13; ?></span></a></li>
               </ul>
               <?php } ?>  <?php if ($_SESSION['user'] == 'admin') {
    ?>

               <h5 class="sidebar-title"><?php echo $lang_14; ?></h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li <?php if ($_GET["page"] == "newserv") echo 'class="active"'; ?>><a href="index.php?page=newserv"><i class="fa fa fa-plus"></i> <span><?php echo $lang_15; ?></span></a></li>
                  <?php
                                            if (ismasterreseller()) {
                                            ?>
               <li <?php if ($_GET["page"] == "newresell") echo 'class="active"'; ?>><a href="index.php?page=newresell"><i class="fa fa fa-plus"></i> <span><?php echo $lang_16; ?></span></a></li>
               <?php } ?>
                  <?php if (file_get_contents("data/cloudflare") != "") {
                                            ?>
               <li <?php if ($_GET["page"] == "cloudflare") echo 'class="active"'; ?>><a href="index.php?page=cloudflare"><i class="fa fa fa-cloud"></i> <span><?php echo $lang_17; ?></span></a></li>
               <?php } ?>
          <li <?php if ($_GET["page"] == "list") echo 'class="active"'; ?>><a href="index.php?page=list#"><i class="fa fa fa-user"></i> <span><?php echo $lang_18; ?></span></a></li>
                  <?php
                                                                            if (ismasterreseller()) {
                                                                            ?>
              <li><a href="thirdparty/phpmyadmin/index.php?server=localhost&pma_username=<?php echo urlencode($user); ?>&pma_password=<?php echo urlencode($pass); ?>"><i class="fa fa fa-database"></i> <span><?php echo $lang_20; ?></span></a></li>
              <?php } ?>
               </ul>
                      <h5 class="sidebar-title">System</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
           <?php
if (ismasterreseller()) {
    ?>
               <li <?php if ($_GET["page"] == "settings") echo 'class="active"'; ?>><a href="index.php?page=settings"><i class="fa fa fa-sliders"></i> <span><?php echo $lang_21; ?></span></a></li>
              <li <?php if ($_GET["page"] == "fman") echo 'class="active"'; ?>><a href="index.php?page=fman"><i class="fa fa fa-sliders"></i> <span>Root File Manager</span></a></li>
             
               <li <?php if ($_GET["page"] == "update") echo 'class="active"'; ?>><a href="index.php?page=update"><i class="fa fa fa-upload"></i> <span><?php echo $lang_22; ?></span></a></li>
               <?php } ?>
               <li <?php if ($_GET["page"] == "plug") echo 'class="active"'; ?>><a href="index.php?page=plug"><i class="fa fa fa-puzzle-piece"></i> <span><?php echo $lang_23; ?></span></a></li>
          <li <?php if ($_GET["page"] == "terminal") echo 'class="active"'; ?>><a href="index.php?page=terminal"><i class="fa fa fa-terminal"></i> <span><?php echo $lang_24; ?></span></a></li>
            <?php
                                            if (ismasterreseller()) {
                                            ?>
             <li <?php if ($_GET["page"] == "mail") echo 'class="active"'; ?>><a href="index.php?page=mail"><i class="fa fa fa-envelope-o"></i> <span><?php echo $lang_25; ?></span></a></li>
                <?php } ?>
               </ul><?php } ?>
                      <h5 class="sidebar-title">My Server</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li <?php if ($_GET["page"] == "FileManager") echo 'class="active"'; ?>><a href="index.php?page=FileManager"><i class="fa fa fa-file"></i> <span><?php echo $lang_26; ?></span></a></li>
               <li <?php if ($_GET["page"] == "cron") echo 'class="active"'; ?>><a href="index.php?page=cron"><i class="fa fa fa-clock-o"></i> <span><?php echo $lang_27; ?></span></a></li>
               <li><a href="thirdparty/phpmyadmin/index.php"><i class="fa fa fa-database"></i> <span><?php echo $lang_28; ?></span></a></li>
             <li><a href="index.php?page=phpinfo"><i class="fa fa fa-code"></i> <span><?php echo $lang_29; ?></span></a></li>
              <li><a href="<?php echo file_get_contents("data/forum"); ?>"><i class="fa fa fa-file"></i> <span><?php echo $lang_30; ?></span></a></li>
              <li><a href="<?php echo file_get_contents("data/support"); ?>"><i class="fa fa fa-life-ring"></i> <span><?php echo $lang_31; ?></span></a></li>
               </ul>
               </div>
              </div>
              </div>
              
            </div>
     </div><!-- tab-pane -->


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  <div class="mainpanel">
<?php if (!$failsafe_offline) { if ($intisp_ver != file_get_contents("https://httpupdate.enyrx.com/version")) {
    echo $lang_32;

}
}
                       if (!isSSL()) {
                    echo $lang_33;
                           }
                           ?>
                           <?php
                           if (issues()) {
                               die($lang_34);
                           } 
                           
                           ?> 
               <div class="contentpanel">

      <div class="row">
        <div class="col-md-10 col-lg-10 dash-left">
              <?php if ($_SESSION['user'] == 'admin') {
    ?>
   
          <?php } if ($dev_edition) {
           echo $lang_39;   
          }

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
<a href="?page=cp&rec" class="btn btn-primary">Recheck Activation</a>
</div>
          <?php
          }
