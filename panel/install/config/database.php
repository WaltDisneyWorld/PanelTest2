<?php
define("debug", false); // For Troubleshooting, This Enables built in Error Reporting

/*

DATABASE DETAILS

*/

define("database_host",'%HOSTNAME%');
define("database_username",'%USERNAME%');
define("database_password",'%PASSWORD%');
define("database_name",'%DATABASE%');

/*

Miscellaneous Options

*/

define("encryption_salt",'%SALT%');
define('language','%LANG%');
define('installation_path','%WEBROOT%');

/*

MySQLi Connection Function

*/

function establishDBconnection() {
    $database_server = new MySQLi(constant("database_host"), constant("database_username"), constant("database_password"), constant("database_name"));
    return $database_server;
}
?>
