<?php
if (!isset($HOME)) {
    die();
}
 require 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location: '.$webroot.'/');
    die();
}

    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'loginhead' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
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

  <link rel="stylesheet" href="templates/default/public/lib/fontawesome/css/font-awesome.css">

  <link rel="stylesheet" href="templates/default/public/css/styles.css">

  <script src="templates/default/public/lib/modernizr/modernizr.js"></script>
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
      <h1><img src="templates/default/public/assets/img/image.png"></h1>
      <h4 class="panel-title"><?php
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
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


    <form action="action.php?action=pass" method="post">
      <div class="input-container">
          <input type="hidden" name="username" value="<?php echo $_SESSION['user']; ?>">
       <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="password" class="form-control" name="password" placeholder="Enter New Password">
          </div>
        </div>
       
        <div class="bar"></div>
      </div>
      <div class="button-container">
       <button class="btn btn-success btn-quirk btn-block">Set Password</button>
      </div>

</div>

<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'loginfoot' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
?>
</body>
</html>