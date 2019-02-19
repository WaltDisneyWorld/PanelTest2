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
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=main');
    die();
}

if ($_GET['act'] == 'restart') {
   pwrmgmnt("restart");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'mysql') {
    pwrmgmnt("mysql");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'server') {
    pwrmgmnt("server");
    header('Location: index.php?page=cp');
    die();
}
