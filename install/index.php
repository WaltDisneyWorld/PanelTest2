<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IntISP Installation</title>
    <link rel="stylesheet" href="public/css/bulma.min.css">
        <link rel="stylesheet" href="public/css/all.css">
  </head>
  <body>
    <div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://www.enyrx.com">
      <img src="public/img/logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
   <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <div class="button is-dark">
            <strong>V<?php
            $tempxaaa = 1;
            require '../includes/classes/communication.class.php';
            echo $intisp_ver;
            ?></strong>
          </div>
               <a class="button is-light" href="https://host.enyrx.com/contact.php">
               <i class="fas fa-life-ring"></i>
          </a>
        </div>
      </div>
    </div>
</nav>
<div class="columns">
    <div class="column"> <a class="panel-block <?php
    if (!isset($_GET['pg'])) {
        ?>
      is-active
      <?php
    }

    ?>">
 
    Welcome
  </a>
  <a class="panel-block <?php
    if (isset($_GET['pg']) && 'req' == $_GET['pg']) {
        ?>
      is-active
      <?php
    }

    ?>">
   
    Requirements
  </a>
  <a class="panel-block <?php
    if (isset($_GET['pg']) && 'license' == $_GET['pg']) {
        ?>
      is-active
      <?php
    }

    ?>">
 
    EULA
  </a>
  <a class="panel-block <?php
    if (isset($_GET['pg']) && 'db' == $_GET['pg']) {
        ?>
      is-active
      <?php
    }

    ?>">
  
    Configuration
  </a>
  <a class="panel-block <?php
    if (isset($_GET['pg']) && 'installation' == $_GET['pg']) {
        ?>
      is-active
      <?php
    }

    ?>">
  
    Installation
  </a>
  </div>
  <div class="column is-four-fifths">
    
    
   <?php
   define('HOMEBASE', 1);
    if (!isset($_GET['pg'])) {
        require 'pages/welcome.php';
    } ?>
       
         <?php
          if (isset($_GET['pg']) && 'req' == $_GET['pg']) {
              require 'pages/req.php';
          }
   if (isset($_GET['pg']) && 'license' == $_GET['pg']) {
       require 'pages/license.php';
   } ?>
         <?php
   if (isset($_GET['pg']) && 'db' == $_GET['pg']) {
       require 'pages/db.php';
   }
     if (isset($_GET['pg']) && 'installation' == $_GET['pg']) {
         require 'pages/install.php';
     } ?>
</div>
    </div>
    <script src="public/js/bulma.js"></script>
  </body>
</html>