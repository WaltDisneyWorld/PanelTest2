<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

session_start();
require 'config.php';
$con = mysqli_connect("$host", "$user", "$pass", "$data");

$email = mysqli_real_escape_string($con, $_POST['user']);

$pass = sha1($_POST['pass'] . $salt);

$sql        = "select * from users where username='$email' AND password='$pass'";
$run_user   = mysqli_query($con, $sql);
$check_user = mysqli_num_rows($run_user);
if ($check_user > 0) {
    $_SESSION['user'] = $email;
    if ($_POST['pass'] == 'admin') {
        header('Location: index.php?page=temppass');
        die();
    }
    header('Location: index.php?page=cp');
    die();
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

