<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

require 'config.php';
require 'include/mail.php';
//die('update Administrators set username="' .addslashes($_POST["username"]) .'", password="' . md5(addslashes($_POST["password_ch"])) .'" where username=' . $_POST["username"]);
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'update settings set id="1", value="'.$_POST['title'].'",code="title" where id="1"';
    mysqli_query($con, $sql);
  $sql = 'update settings set id="5", value="'.$_POST['head'].'",code="head" where id="5"';
    mysqli_query($con, $sql);
     $sql = 'update settings set id="4", value="'.$_POST['forum'].'",code="forum" where id="4"';
    mysqli_query($con, $sql);
      $sql = 'update settings set id="10", value="'.$_POST['support'].'",code="support" where id="10"';
    mysqli_query($con, $sql);
       $sql = 'update settings set id="8", value="'.$_POST['logos'].'",code="logo" where id="8"';
    mysqli_query($con, $sql);
       $sql = 'update settings set id="7", value="'.$_POST['loginh'].'",code="loginhead" where id="7"';
    mysqli_query($con, $sql);
          $sql = 'update settings set id="6", value="'.$_POST['loginf'].'",code="loginfoot" where id="6"';
    mysqli_query($con, $sql);
           $sql = 'update settings set id="11", value="'.$_POST['theme'].'",code="theme" where id="11"';
    mysqli_query($con, $sql);
    $sql = 'update settings set id="3", value="'.$_POST['navbar'].'",code="color" where id="3"';
    mysqli_query($con, $sql);
    $sql = 'update settings set id="2", value="'.$_POST['cloudflare'].'",code="cloudflare" where id="2"';
    mysqli_query($con, $sql);
        $sql = 'update settings set id="12", value="'.$_POST['upgrade'].'",code="upbutton" where id="12"';
    mysqli_query($con, $sql);
 $sql = 'update settings set id="9", value="'.$_POST['mail'].'",code="mail" where id="9"';
    mysqli_query($con, $sql);
         $sql = 'update settings set id="9", value="'.$_POST['mail'].'",code="mail" where id="9"';
    mysqli_query($con, $sql);
         $sql = 'update settings set id="13", value="'.$_POST['whmurl'].'",code="whmurl" where id="13"';
    mysqli_query($con, $sql);
    
		    mysqli_close($con);
    sendemailuser(
        "settings Changed", "
    <b>settings have been changed on the Webister Hosting Control Panel</b>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.
    "
    );
    header('Location: index.php?page=settings');
