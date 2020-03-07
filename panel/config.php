<?php
define("debug", false); // For Troubleshooting, This Enables built in Error Reporting

/*

DATABASE DETAILS

*/

define("database_host",'localhost');
define("database_username",'root');
define("database_password",'Pr@gr@fl@re7233');
define("database_name",'intispKLQXVAGMJH');

/*

Miscellaneous Options

*/

define("encryption_salt",'');
define('language','en');
define('installation_path','http://192.168.1.254/panel');

/*

MySQLi Connection Function

*/

function establishDBconnection() {
    $database_server = new MySQLi(constant("database_host"), constant("database_username"), constant("database_password"), constant("database_name"));
    return $database_server;
}
?>
