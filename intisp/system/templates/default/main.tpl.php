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
              echo "<div class='alert alert-danger'>Wrong Username or Password!</div>";
        }
    ?>
     
      <form action="index.php?page=val" method="post">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" name="user" placeholder="Enter Username">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" name="pass" placeholder="Enter Password">
          </div>
        </div>
        <div><br></div>
        <div class="form-group">
          <button class="btn btn-success btn-quirk btn-block">Sign In</button>
        </div>
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
    </div>
  </div><!-- panel -->

</body>
</html>
