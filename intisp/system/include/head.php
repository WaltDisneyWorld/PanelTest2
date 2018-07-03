<?php
error_reporting(0);
ini_set("session.cookie_lifetime","360");
session_start();
include 'config.php';
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
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">	
	<title>IntISP</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          
            <script src="public/assets/js/jquery.min.js"></script>
     
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->   
              <?php if (file_Get_contents("data/theme") == "default") { ?>
				<link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="public/assets/css/bulma.min.css">
            <?php } ?>
              <?php if (file_Get_contents("data/theme") == "modern") { ?>
            <link rel="stylesheet" type="text/css" href="public/assets/css/modern.min.css">
            <?php } ?>
            <?php if (file_Get_contents("data/theme") == "dark") { ?>
            <link rel="stylesheet" type="text/css" href="public/assets/css/dark.min.css">
            <?php } ?>
         <style>
      .modal-backdrop {
  z-index: -1;
}
      </style>
            </head>
    <body class="skin-blue dashboard">


   <div id="cpanel">
    <nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?page=cp">
    <h1><?php
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
?></h1>
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start" >
      <div class="navbar-item">
          <?php echo file_get_contents("data/version"); ?>
        </div>
      <div class="navbar-item"><a href="<?php echo file_get_contents("data/upbutton"); ?>" class="fa fa-arrow-up"> Upgrade</a>
           
           </div>
      </div>
    </div>

    <div class="navbar-end" style="background-color:#<?php echo file_get_contents("data/color"); ?>;">
   <div class="navbar-item"><a href="index.php?page=cp"><i style="color:white" class="fa fa-1x fa-home"></i></a></li>
            <div class="navbar-item"><a href="index.php?page=FileManager"><i style="color:white" class="fa fa-1x fa-file"></i></a></div>
           <div class="navbar-item"><a href="adminer-4.2.4.php?server=localhost"><i style="color:white" class="fa fa-1x fa-database"></i></a></div>
          <div class="navbar-item"><a href="index.php?page=mail"><span class="badge">
             <?php
    $count = 0;
$con       = mysqli_connect($host, $user, $pass, $data);
$sql       = 'SELECT * FROM mail';
$result    = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $count = $count + 1;
 }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?>
             
             
      
         </span></a></div>
         <?php
			  function isSSL()
    {
        if( !empty( $_SERVER['https'] ) )
            return TRUE;
        if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
            return TRUE;
        return FALSE;
    }
			if (!isSSL()) {
				?>
				   <div class="navbar-item"><A><i  style="color:white" class="fa fa-1x fa-unlock"></i></A></div>
				<?php
			} else {
			?>
				   <div class="navbar-item"><A><i style="color:white" class="fa fa-1x fa-lock"></i></A></div>
			<?php
			}
			?>
        <div class="navbar-item"><a href="" data-toggle="modal" data-target="#myModal"><i style="color:white" class="fa fa-1x fa-user"></i></a></div>
         <div class="navbar-item"><a href="index.php?page=logout"><i style="color:white" class="fa fa-1x fa fa-sign-out"></i></a></div>
            </div>
       
      </div>
    </div>
</nav>

 
            <section class="content">

                <div class="row">
                    <section class="col-lg-9">
        
             
                   
                     
                     
                      
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
