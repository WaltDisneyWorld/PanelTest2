<?php
if (!isset($HOME)) die();
/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */


function onlyadmin() 
{
    if ($_SESSION['user'] == 'admin') {
         
    } else {
        die();
    }
}
onlyadmin();
require("includes/classes/communication.class.php");
require("config.php");
if (!isset($_SESSION['user'])) {
    header('Location: ' . $webroot . '/cp');
    die();
}

if ($_GET['act'] == 'restart') {
   pwrmgmnt("restart");
    header('Location: ' . $webroot . '/cp');
    die();
}
if ($_GET['act'] == 'mysql') {
    pwrmgmnt("mysql");
    header('Location: ' . $webroot . '/cp');
    die();
}
if ($_GET['act'] == 'server') {
    pwrmgmnt("server");
    header('Location: ' . $webroot . '/cp');
    die();
}
