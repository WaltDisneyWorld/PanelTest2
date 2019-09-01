<?php
if ('latest' == $_GET["act"]) {

    function newVersion() {
        $xv = file_get_contents('https://raw.githubusercontent.com/INTisp/INTisp/master/includes/classes/communication.class.php');
        $randfile = rand(1,9999).'.php';
        file_put_contents('cache/'.$randfile,$xv);
        require 'cache/'.$randfile;
        $communications = new communications;
        $currentV = $communications->getIntISPVersion();

        unlink('cache/'.$randfile);
        return $currentV;
        }
        echo newVersion();
        die();
}
if (file_exists("config.php")) {
    require("includes/classes/session.db.php");	//Include MySQL database class
    require("includes/classes/mysql.db.php");	//Include PHP MySQL sessions
    $session = new Session();	//Start a new PHP MySQL session
    }
$HOME = true;
require 'includes/classes/actionload.php';
