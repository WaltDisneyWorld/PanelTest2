<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

error_reporting(E_ALL);
$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = $argv[1];
$DBName   = 'webister';



$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
    trigger_error('Database connection failed: '.$conn->connect_error, E_USER_ERROR);
}

echo "Restoring Previous Migration Version " . file_get_contents("/var/www/html/interface/data/version") . "\n";
$path_migrations = '/var/webister/migrations';
foreach(glob($path_migrations.DIRECTORY_SEPARATOR."*.sql") as $script) {
    $sql = file_get_contents($script);
    if (!$conn->query($sql) === TRUE) {
    echo "\n" . $conn->error . "\n";
}
}
echo "Restore Complete V" . file_get_contents("/var/www/html/interface/data/version");
$salt = rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999);

$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1('admin'.$salt)."', '', '', '80')";
$conn->query($sql);
$sql = "INSERT INTO mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$conn->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$conn->query($sql);

//$config_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'interface';
//file_put_contents($config_path.DIRECTORY_SEPARATOR.'config.php', '<?php
file_put_contents('/var/www/html/interface/configdatabase.php', '<?php
$'.'host'." = 'localhost';
$".'user'."   = 'root';
$".'pass'."   = '".$argv[1]."';
$".'data'."   = 'webister';
$".'salt'."   = '".$salt."';

");
