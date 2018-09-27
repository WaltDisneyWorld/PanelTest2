<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

session_start();
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require "vendor/autoload.php";
require 'config.php';
$con = mysqli_connect("$host", "$user", "$pass", "$data");

$email = mysqli_real_escape_string($con, $_POST['user']);





$sql        = "select * from users where username='$email'";
$run_user   = mysqli_query($con, $sql);
$check_user = mysqli_num_rows($run_user);
if ($check_user > 0) {
    
    
    
    
        $sql = "SELECT password FROM users where username='$email'";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
    
            $key = Key::loadFromAsciiSafeString($salt);
$pass = Crypto::decrypt($row[0], $key);
$_SESSION["user"] = $_POST["user"];
if ($pass == $_POST["pass"]) {
            if ($_POST['pass'] == 'admin') {
        header('Location: index.php?page=temppass');
        die();
    }
    header('Location: index.php?page=cp');
    die();
} else {
      include 'config.php';

    // Create connection
    $conn = new mysqli('localhost', 'root', "$pass", "$data");

    $t   = time();
    $sql = "INSERT INTO failedlogin(id, ip, time)
VALUES ('".rand(1, 99999)."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d', $t)."')";
    $conn->query($sql);
    $conn->close();

    header('Location: index.php?page=main&error');
    die();


}

        }
          // Free result set
          
    }
  
    

    
    

}  
    include 'config.php';

    // Create connection
    $conn = new mysqli('localhost', 'root', "$pass", "$data");

    $t   = time();
    $sql = "INSERT INTO failedlogin(id, ip, time)
VALUES ('".rand(1, 99999)."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d', $t)."')";
    $conn->query($sql);
    $conn->close();

    header('Location: index.php?page=main&error');
    die();

