<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */
 session_start();
function onlyadmin() 
{
    if ($_SESSION['user'] == 'admin') {
         
    } else {
        die();
    }
}
onlyadmin();
function service_send($command) 
{
    $fp = fsockopen("127.0.0.1", 1210, $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        fwrite($fp, $command);
 
        fclose($fp);
    }
}
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=main');
    die();
}


if ($_GET['act'] == 'restart') {
    service_send("restart");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'mysql') {
    service_send("service mysql restart");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'server') {
    service_send("reboot");
    header('Location: index.php?page=cp');
    die();
}
