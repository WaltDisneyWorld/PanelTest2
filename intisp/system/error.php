<?php
if (isset($_GET["error"])) {
    $error = $_GET["error"];
}
else {
    $error = "Unknown Error, No ?error detected.";
    $status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
       403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
       404 => array('404 Not Found', 'The document/file requested was not found on this server.'),
       405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
       408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
       500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
       502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
       504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
);
$error = $codes[$status][1];
if (!isset($codes[$status][1])) {
    $error = "Unknown Error, No ?error detected.";
}
}
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
    <center style="color:white;">
      <h1><img src="public/assets/img/image.png"></h1>
      <h4 class="panel-title">
      An Unexpected Error has Occured.
      </h4>
      <p>Please leave a message for our support</p>
      <br><br><b>Technical Details</b>
      <p>Status Code: 500</p><br>
      <b>Error Code: <?php echo sha1($error); ?></b><br>
      <b>Error Message: <?php echo $error; ?></b><br>
      <b>License Key: <?php 
      
      if (file_exists("data/register")) {
      echo file_get_contents("data/register");
      } else {
       echo "Unknown License. System was not activated";   
      }
      
      ?></b>
      <br>
      <b>Config Exists: <?php
      
      if (file_exists("configdatabase.php")) {
       echo "Ok, Please make sure MySQL is running, it may be the issue.";   
      } else {
          echo "Configuration Does Not Exist. Please <a href='install'>click here</a> to run the installer. Before Contacting support please finish the setup wizard. This may be the problem.";
      }
      ?>
<h3 style="color:white;">You may contact support <a href="https://host.delinz.com/submitticket.php?step=2&deptid=1">here</a></h3>
You will need to have your Serial Number Ready.<br>
License Issue? Please check <a href="https://host.delinz.com/index.php?m=licensing">this</a> 
      </center>
