<?php
// Inject MySQL Session Replacement
if (file_exists("config.php")) {
require("includes/classes/session.db.php");	//Include MySQL database class
require("includes/classes/mysql.db.php");	//Include PHP MySQL sessions
$session = new Session();	//Start a new PHP MySQL session
}

$HOME = true;
require 'includes/classes/autoload.php';
loadINTisp();
