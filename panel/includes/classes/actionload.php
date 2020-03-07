<?php

if (!isset($HOME)) {
    die();
}

if (!isset($_GET['action'])) {
    die();
}
   require 'config.php';
   if ($debug) {
       require 'includes/classes/php_error.class.php';
       $options = array(
            'snippet_num_lines' => 3,
            'background_text' => 'IntISP',
            'error_reporting_off' => 0,
            'enable_saving' => 0,
            'display_line_numbers' => 0,
            'server_name' => 'IntISP has stopped because an exception has occured.',
            'error_reporting_on' => E_ALL,
    );
       php_error\reportErrors($options);
   } else {
       error_reporting(0);
   }
$_ACT = $_GET['action'];
if ('login' == $_ACT) {
    require 'includes/classes/doLogin.class.php';
}
if ('pass' == $_ACT) {
    require 'includes/classes/pass.class.php';
}
if ('action' == $_ACT) {
    require 'includes/classes/action.class.php';
}
if ('options' == $_ACT) {
    function onlyadmin()
    {
        if ('admin' == $_SESSION['user']) {
        } else {
            die();
        }
    }
    onlyadmin();

    require 'includes/classes/mail.class.php';
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

    $sql = 'update settings set id="15", value="'.$_POST['smtp_host'].'",code="smtp_host" where id="15"';
    mysqli_query($con, $sql);
    $sql = 'update settings set id="16", value="'.$_POST['smtp_port'].'",code="smtp_port" where id="16"';
    mysqli_query($con, $sql);

    $sql = 'update settings set id="17", value="'.$_POST['smtp_security'].'",code="smtp_security" where id="17"';
    mysqli_query($con, $sql);

    $sql = 'update settings set id="18", value="'.$_POST['smtp_username'].'",code="smtp_username" where id="18"';
    mysqli_query($con, $sql);
    $sql = 'update settings set id="19", value="'.$_POST['smtp_password'].'",code="smtp_password" where id="19"';
    mysqli_query($con, $sql);

    function ae($f, $ds)
    {
        global $con;
        $sql = 'update settings set id="'.$ds.'", value="'.$_POST[$f.'_public'].'",code="'.$f.'_public" where id="'.$ds.'"';
        mysqli_query($con, $sql);
        $ds = $ds + 1;
        $sql = 'update settings set id="'.$ds.'", value="'.$_POST[$f.'_secret'].'",code="'.$f.'_secret" where id="'.$ds.'"';
        mysqli_query($con, $sql);
    }
    ae('github', 20);
    ae('twitter', 22);
    ae('google', 24);
    ae('facebook', 26);

    mysqli_close($con);
    sendemailuser(
        'settings Changed',
        '
    <b>settings have been changed on the Webister Hosting Control Panel</b>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.
    '
    );
    header('Location: /settings');
}
if ('newserv' == $_ACT) {
    require 'includes/classes/newserv.class.php';
}
if ('exit' == $_ACT) {
    require 'config.php';
    unset($_SESSION['user']);

    session_destroy();
    header('Location: '.$webroot.'/');
}
