<?php

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require "../vendor/autoload.php";
class Database {

	// Function to the database and tables and fill them with the default data
	function create_database($data)
	{
		// Connect to the database
		$m = new mysqli($data['hostname'],$data['username'],$data['password'],'');

		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Create the prepared statement
		$m->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);

		// Close the connection
		$m->close();

		return true;
	}

	// Function to create the tables and fill them with the default data
	function create_tables($data)
	{
		$key = Key::createNewRandomKey();
        $salt = $key->saveToAsciiSafeString();
$_SESSION["securesalt"] =  $salt;
		require("../include/verify.php");
$results = check_license($data["key"]);
switch ($results['status']) {
    case "Active":
        // get new local key and save it somewhere
        $localkeydata = $results['localkey'];
        break;
    case "Invalid":
        return false;
        break;
    case "Expired":
        return false;
        break;
    case "Suspended":
        return false;
        break;
    default:
        return false;
        break;
}
		// Connect to the database
		$m = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);

		// Check for errors
		if(mysqli_connect_errno())
			return false;
$path_migrations = "sql";
	foreach(glob($path_migrations.DIRECTORY_SEPARATOR."*.sql") as $script) {
    $sql = file_get_contents($script);
    if (!$m->query($sql) === TRUE) {
  return false;
}
}

$sql = "INSERT INTO mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$m->query($sql);
//Data Folder Alternative


$sql = "INSERT INTO settings (id, code, value) VALUES ('2', 'cloudflare', '')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('3', 'color', '000000')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('4', 'forum', 'https://forum.delinz.com')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('5', 'head', '" . '<center><a href="https://github.com/INTisp/INTisp"><img src="https://s15.postimg.cc/knf0x50wr/Untitled_design.jpg"></a></center>
'. "')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('6', 'loginfoot', '')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('7', 'loginhead', '')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('8', 'logo', 'public/assets/img/webister.png')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('9', 'mail', 'nobody@gmail.com')";
$m->query($sql);

$sql = "INSERT INTO settings (id, code, value) VALUES ('10', 'supprt', 'https://host.delinz.com')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('11', 'theme', 'default')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('12', 'upbutton', 'https://google.com')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('13', 'whmurl', '')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('14', 'register', '" . $data["key"] . "')";
$m->query($sql);
$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '". Crypto::encrypt("admin", $key) ."', '', '', '80')";
$m->query($sql);

		// Close the connection
		$m->close();

		return true;
	}
}