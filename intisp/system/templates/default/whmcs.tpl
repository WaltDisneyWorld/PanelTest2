<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

error_reporting(0);
require 'config.php';

if ($_GET['val']) {
    $con   = mysqli_connect("$host", "$user", "$pass", 'webister');
    $email = mysqli_real_escape_string($con, $_GET['user']);
    $pass  = sha1(mysqli_real_escape_string($con, $_GET['pass']));

    $sql        = "select * from users where username='$email' AND password='$pass'";
    $run_user   = mysqli_query($con, $sql);
    $check_user = mysqli_num_rows($run_user);
    if ($check_user > 0) {
        $var = rand(1000, 9999);
        file_put_contents('data/'.$var, '');
        echo $var;
    } else {
        echo '1';
    }
}
