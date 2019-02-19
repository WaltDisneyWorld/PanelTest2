<?php
if (isset($_GET["de"])) {
  $_SESSION["lang"] = "de";
}
if (isset($_GET["es"])) {
   $_SESSION["lang"] = "es";
}
if (isset($_GET["en"])) {
   $_SESSION["lang"] = "en";
}


if (!isset($HOME)) die();
require("config.php");

if (!isset($lang)) $lang = "en";
if (isset($_SESSION["lang"])) $lang = $_SESSION["lang"];

require("includes/lang/" . $lang . ".php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>IntISP Login</title>

  <link rel="stylesheet" href="public/lib/fontawesome/css/font-awesome.css">

  <link rel="stylesheet" href="public/css/styles.css">

  <script src="public/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="public/lib/html5shiv/html5shiv.js"></script>
  <script src="public/lib/respond/respond.src.js"></script>
  <![endif]-->

</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1><img src="public/assets/img/image.png"></h1>
      <h4 class="panel-title"><?php
    require 'config.php';
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
?></h4>  
    </div>
    <div class="panel-body">
     <?php
        if (isset($_GET["error"])) {
              echo "<div class='alert alert-danger'>" . $lang_71 . "</div>";
        }
    ?>
       <?php
        if (isset($_GET["errorx"])) {
              echo "<div class='alert alert-danger'>Login has been established from the oauth server. However no account has been linked to this user. Please link the account before logging in using oauth.</div>";
        }
    ?>
      <form action="action.php?action=login" method="post">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" name="user" placeholder="<?php echo $lang_55; ?>">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="password" class="form-control" name="pass" placeholder="<?php echo $lang_58; ?>">
          </div>
        </div>
        <div><br></div>
        
        

        
        <div class="form-group">
          <button class="btn btn-success btn-quirk btn-block"><?php echo $lang_70; ?></button>
        </div>
        
        <?php
        $github = false;
        $google = false;
        $twitter = false;
        $facebook = false;
          $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'github_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
           if ($row[0] != "") 
            $github = true;
        }
          // Free result set
          mysqli_free_result($result);
    }
    mysqli_close($con);
             $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'facebook_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
           if ($row[0] != "") 
            $facebook = true;
        }
          // Free result set
          mysqli_free_result($result);
    }
    mysqli_close($con);
                     $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'google_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
           if ($row[0] != "") 
            $google = true;
        }
          // Free result set
          mysqli_free_result($result);
    }
    mysqli_close($con);
                 $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'twitter_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
          if ($row[0] != "") 
            $twitter = true;
        }
          // Free result set
          mysqli_free_result($result);
    }
    mysqli_close($con);
        
        
        ?>
               <?php if ($facebook) { ?> <a href="action.php?action=login&oauth=facebook" class="btn btn-danger" style="background-color:#3b5998;width:100%;"><i class="fa fa-facebook"></i> Facebook</a>  <br> <br>
        <?php } if ($github) { ?>  <a href="action.php?action=login&oauth=github" class="btn btn-danger" style="background-color:#4183c4;width:100%;"><i class="fa fa-github"></i> Github</a>  <br> <br>
       <?php } if ($twitter) { ?>   <a href="action.php?action=login&oauth=twitter" class="btn btn-danger" style="background-color:#00aced;width:100%;"><i class="fa fa-twitter"></i> Twitter</a>  <br> <br>
              <?php } if ($google) { ?>    <a href="action.php?action=login&oauth=google" class="btn btn-danger" style="background-color:#dd4b39;width:100%;"><i class="fa fa-google"></i> Google</a>
        <?php } ?>
        
        
      </form>
      
       <div class="or">or</div>
      <hr class="invisible">
      <div class="form-group">
           <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <form  class="login100-form validate-form" style="padding-top:0px;" method="GET" action="">
            		<?php
    if (isset($_SESSION["reseller"])) {
        	?>
            <input type="text" name="reseller" class="form-control" placeholder="Enter Reseller" value="<?php echo $_SESSION["reseller"]; ?>" disabled>
            <?php
            
    } else { ?>
    <input type="text" name="reseller"  class="form-control" placeholder="Enter Reseller">
    <?php 
    }?>
          </div>
        </div>
           		<?php
    if (!isset($_SESSION["reseller"])) {
        	?>
         <input type="submit" value="Switch" class="btn btn-success btn-quirk btn-block">
         <?php } else { ?>
         <input type="hidden" name="page" value="logout">
           <input type="submit" value="X" class="btn btn-danger btn-quirk btn-block">
         <?php } ?>
         </form>
      </div>
    </div><center>
      <a href="?en">English</a>
  <a href="?es">Spanish</a>
<a href="?de">German</a>
</center>
  </div><!-- panel -->

</body>
</html>
