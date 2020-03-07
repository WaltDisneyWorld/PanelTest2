<?php

if (!isset($HOME)) {
    die();
}

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require 'vendor/autoload.php';
 $key = Key::loadFromAsciiSafeString($salt);
//die('update Administrators set username="' .addslashes($_POST["username"]) .'", password="' . md5(addslashes($_POST["password_ch"])) .'" where username=' . $_POST["username"]);
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'update users set username="'.$_POST['username'].'", password="'.Crypto::encrypt($_POST['password'], $key).'" where username="'.$_POST['username'].'"';
    mysqli_query($con, $sql);



    header('Location: '.$webroot.'/cp#');
