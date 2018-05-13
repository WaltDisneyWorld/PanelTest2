<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

require 'config.php';
//die('update Administrators set username="' .addslashes($_POST["username"]) .'", password="' . md5(addslashes($_POST["password_ch"])) .'" where username=' . $_POST["username"]);
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'update Users set username="'.$_POST['username'].'", password="'.sha1($_POST['password'] . $salt).'" where username="'.$_POST['username'].'"';
    mysqli_query($con, $sql);
   $query = sprintf("SET PASSWORD FOR %s@localhost = PASSWORD('%s');", $_POST['username'], $_POST['password']);
    mysqli_query($con, $query);
    mysqli_close($con);
if ($_POST["username"] == "admin" || $_POST["username"] == "Admin") {
    include "include/mail.php";
    sendemailuser("Password Changed", "The password for the main administrator account has been changed. If you did not change your password we recommend that you restore the password or reinstall webister. This may also be an issue with the installation of project webister.");
}
    
    header('Location: index.php?page=cp#');
