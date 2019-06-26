<?php

if (!isset($HOME)) {
    die();
}
/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

function onlyadmin()
{
    if ('admin' == $_SESSION['user']) {
    } else {
        die();
    }
}
onlyadmin();
require 'includes/classes/communication.class.php';
require 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location: '.$webroot.'/cp');
    die();
}

if ('restart' == $_GET['act']) {
    pwrmgmnt('restart');
    header('Location: '.$webroot.'/cp');
    die();
}
if ('mysql' == $_GET['act']) {
    pwrmgmnt('mysql');
    header('Location: '.$webroot.'/cp');
    die();
}
if ('server' == $_GET['act']) {
    pwrmgmnt('server');
    header('Location: '.$webroot.'/cp');
    die();
}
