<?php
error_reporting(0);
ini_set("session.cookie_lifetime","360");
session_start();
include 'config.php';
 function isSSL()
    {
        if( !empty( $_SERVER['https'] ) )
            return TRUE;
        if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
            return TRUE;
        return FALSE;
    }
function failed($msg) {
 ?>
 This version of IntISP is not activated. Error Message: <?php echo $msg; ?>
 Please contact Support!
 <?php
 throw new Exception("This version of IntISP is not activated. Delinz Activation Server said: " . $msg);
	die();
}
require("include/verify.php");

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

$results = check_license($keys);
switch ($results['status']) {
    case "Active":
        // get new local key and save it somewhere
        $localkeydata = $results['localkey'];
        break;
    case "Invalid":
        failed("License key is Invalid");
        break;
    case "Expired":
        failed("License key is Expired");
        break;
    case "Suspended":
        failed("License key is Suspended");
        break;
    default:
        failed("Invalid Response");
        break;
}

function ismasterreseller() {
    require "config.php";
    if ($data == "webister") {
        return TRUE;
    }  
        return FALSE;
    
}
function onlymasterreseller() {
    require "config.php";
    if ($data == "webister") {
        
    } else {
        die();
    }
}
function onlyadmin() {
     if ($_SESSION['user'] == 'admin') {
         
     } else {
         die();
     }
}
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=main');
    die();
}

     function Connect($port)
     {
         $serverConn = @stream_socket_client("tcp://127.0.0.1:$port", $errno, $errstr);
         if ($errstr != '') {
             return FALSE;
         }
         fclose($serverConn);

         return TRUE;
     }
 function GetDirectorySize($path)
 {
     $bytestotal = 0;
     $path       = realpath($path);
     if ($path !== FALSE) {
         foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
             $bytestotal += $object->getSize();
         }
     }

     return $bytestotal;
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

      <div class="searchpanel">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div>
      
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
                <button onclick="location.href='adminer-4.2.4.php?server=localhost';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-database"></i>
              </button>
              <button data-toggle="modal" data-target="#myModal" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-user"></i>
              </button>
            <button onclick="location.href='index.php?page=logout';" class="btn btn-notice" data-toggle="dropdown">
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
          <h4 class="media-heading"><?php echo $_SESSION['user']; ?> </h4>
          <span><?php
          if (isMasterReseller()) {
              if ($_SESSION['user'] == 'admin') {
                   echo "Root User";
              } else {
              echo "Client";     
              }
             
          } else {
              if ($_SESSION['user'] == 'admitn') {
               echo "Master Reseller";   
              } else {
                  echo "Client";
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
               <li class="active"><a href="index.php?page=cp"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
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
          <h5 class="sidebar-title">Billing and Support</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li><a href="<?php echo $whmurl; ?>/clientarea.php"><i class="fa fa fa-newspaper-o"></i> <span>News</span></a></li>
               <li><a href="<?php echo $whmurl; ?>/clientarea.php"><i class="fa fa fa-credit-card"></i> <span>Billing</span></a></li>
               <li><a href="<?php echo $whmurl; ?>/index.php?rp=/knowledgebase"><i class="fa fa-question-circle"></i> <span>Assistance</span></a></li>
               <li><a href="<?php echo $whmurl; ?>/clientarea.php?action=emails"><i class="fa fa fa-envelope-o"></i> <span>Email History</span></a></li>
               </ul>
               <?php } ?>  <?php if ($_SESSION['user'] == 'admin') {
    ?>

               <h5 class="sidebar-title">Servers</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li><a href="index.php?page=newserv"><i class="fa fa fa-plus"></i> <span>New Server</span></a></li>
                  <?php
                                            if (ismasterreseller()) {
                                            ?>
               <li><a href="index.php?page=newresell"><i class="fa fa fa-plus"></i> <span>New Reseller</span></a></li>
               <?php } ?>
                  <?php if (file_get_contents("data/cloudflare") != "") {
                                            ?>
               <li><a href="index.php?page=cloudflare"><i class="fa fa fa-cloud"></i> <span>Cloudflare</span></a></li>
               <?php } ?>
          <li><a href="index.php?page=list#"><i class="fa fa fa-user"></i> <span>Users</span></a></li>
             <li><a href="index.php?page=plans"><i class="fa fa fa-columns"></i> <span>Plans</span></a></li>
               <?php
                                                                            if (ismasterreseller()) {
                                                                            ?>
              <li><a href="adminer-4.2.4.php?server=localhost&username=<?php echo urlencode($user); ?>&password=<?php echo urlencode($pass); ?>"><i class="fa fa fa-database"></i> <span>All Databases</span></a></li>
              <?php } ?>
               </ul>
                      <h5 class="sidebar-title">System</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
           <?php
if (ismasterreseller()) {
    ?>
               <li><a href="index.php?page=settings"><i class="fa fa fa-sliders"></i> <span>Settings</span></a></li>
               <li><a href="index.php?page=update"><i class="fa fa fa-upload"></i> <span>Updates</span></a></li>
               <?php } ?>
               <li><a href="index.php?page=plug"><i class="fa fa fa-puzzle-piece"></i> <span>Plugins</span></a></li>
          <li><a href="index.php?page=terminal"><i class="fa fa fa-terminal"></i> <span>Terminal</span></a></li>
            <?php
                                            if (ismasterreseller()) {
                                            ?>
             <li><a href="index.php?page=mail"><i class="fa fa fa-envelope-o"></i> <span>Messages</span></a></li>
              <li><a href="index.php?page=systemcheck"><i class="fa fa fa-info-circle"></i> <span>System Checklist</span></a></li>
              <?php } ?>
               </ul><?php } ?>
                      <h5 class="sidebar-title">My Server</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li><a href="index.php?page=FileManager"><i class="fa fa fa-file"></i> <span>Files</span></a></li>
               <li><a href="index.php?page=cron"><i class="fa fa fa-clock-o"></i> <span>Cron Jobs</span></a></li>
               <li><a href="adminer-4.2.4.php?server=localhost"><i class="fa fa fa-database"></i> <span>Database</span></a></li>
          <li><a href="index.php?page=wp"><i class="fa fa fa-wordpress"></i> <span>Wordpress</span></a></li>
             <li><a href="index.php?page=phpinfo"><i class="fa fa fa-code"></i> <span>PHP Info</span></a></li>
              <li><a href="<?php echo file_get_contents("data/forum"); ?>"><i class="fa fa fa-file"></i> <span>Forum</span></a></li>
              <li><a href="<?php echo file_get_contents("data/support"); ?>"><i class="fa fa fa-life-ring"></i> <span>Support</span></a></li>
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
   <?php
                       if (!isSSL()) {
                           ?>
                           <div class="notification is-danger">
  <strong>Danger!</strong> You are connected to Webister however your connection is insecure.
</div>
                           <?php
                           }
                           ?>
                           <?php
                           if ($quote != "∞") {
                           if (GetDirectorySize('/var/webister/'.$myp) > $quote) {
                               die("
                               <div class='notification is-danger'>Please contact support if you are having issues.Your plan quota has been reached.</div>
                               
                               ");
                           } 
                           }
                           ?> 
               <div class="contentpanel">

      <div class="row">
        <div class="col-md-9 col-lg-8 dash-left">
              <?php if ($_SESSION['user'] == 'admin') {
    ?>
      <div class="panel panel-site-traffic">
            <div class="panel-heading">
              <ul class="panel-options">
              
              </ul>
              <h4 class="panel-title text-success">System Stats</h4>
              <p class="nomargin"></p>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-6 col-sm-4">
                  <div class="pull-left">
                    <div class="icon icon ion-stats-bars"></div>
                  </div>
                  <div class="pull-left">
                    <h4 class="panel-title">Users/Servers</h4>
                    <h3><?php
                                            $count  = 0;
                                            $con    = mysqli_connect($host, $user, $pass, $data);
                                            $sql    = 'SELECT * FROM users';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h3>
                    
                  </div>
                </div>
                <div class="col-xs-6 col-sm-4">
                  <div class="pull-left">
                    <div class="icon icon ion-eye"></div>
                  </div>
                  <h4 class="panel-title">Failed Logins</h4>
                  <h3><?php
                                            $count  = 0;
                                            $con    = mysqli_connect($host, $user, $pass, $data);
                                            $sql    = 'SELECT * FROM failedlogin';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h3>
                 
                </div>
                <div class="col-xs-6 col-sm-4">
                  <div class="pull-left">
                    <div class="icon icon ion-clock"></div>
                  </div>
                  <h4 class="panel-title">Time on Server</h4>
                  <h3><?php echo date("h:i"); ?></h3>
             
                </div>
              </div><!-- row -->
              </div></div>
          <?php } ?>