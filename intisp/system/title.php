<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

require 'config.php';
require 'include/mail.php';
//die('update Administrators set username="' .addslashes($_POST["username"]) .'", password="' . md5(addslashes($_POST["password_ch"])) .'" where username=' . $_POST["username"]);
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'update Settings set id="1", value="'.$_POST['title'].'",code="title" where id="1"';
    mysqli_query($con, $sql);
    mysqli_close($con);
    file_put_contents('data/head', $_POST['head']);
    file_put_contents('data/forum', $_POST['forum']);
    file_put_contents('data/support', $_POST['support']);
    file_put_contents('data/logo', $_POST['logos']);
    file_put_contents('data/loginhead', $_POST['loginh']);
    file_put_contents('data/loginfoot', $_POST['loginf']);
    file_put_contents('data/theme', $_POST['theme']);
    file_put_contents('data/color', $_POST['navbar']);
    file_put_contents('data/cloudflare', $_POST['cloudflare']);
    file_put_contents('data/upbutton', $_POST['upgrade']);
        file_put_contents('data/mail', $_POST['mail']);
    sendemailuser(
        "Settings Changed", "
    <b>Settings have been changed on the Webister Hosting Control Panel</b>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.
    "
    );
    header('Location: index.php?page=cp#');
