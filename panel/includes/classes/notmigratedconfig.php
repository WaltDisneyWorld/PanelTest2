<?php

/*
THIS FILE WILL BE REMOVED SOON

THIS FILE IS USED TO TRANSLATE THE OLD CONFIG FOR FILES THAT HAVENT BEEN CONVERTED YET.



*/
function getCred()
{
    require("config.php");
    return $config;
}

$unloaded = getCred();
$HOME = "test";
$host = $unloaded["database_host"];
$user = $unloaded["database_username"];
$pass = $unloaded["database_password"];
$data = $unloaded["database_name"];
$salt = $unloaded["encryption_salt"];
$webroot = $unloaded["installation_path"];
$template_name = "default";
