<?php
/**
 * Adaclare Technologies
 *
 * Webister Hosting Software
 * Install
 *
 */
error_reporting(0);
$DBServer = 'localhost';
$DBUser = 'root';
$DBPass = $argv[1];
$DBName = 'webister';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
    trigger_error('Database connection failed: '.$conn->connect_error, E_USER_ERROR);
}

//Load migrations from .sql files
//$path_migrations = dirname(__FILE__).DIRECTORY_SEPARATOR.'migrations';
 $sql = 'CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(1000),
password TEXT,
bandwidth TEXT,
diskspace TEXT,
port TEXT
)';
$conn->query($sql);
$sql = 'CREATE TABLE Settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
)';
$conn->query($sql);
$sql = 'CREATE TABLE Mail (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
subject TEXT,
message TEXT
)';
$conn->query($sql);
foreach(glob("/var/webister/interface/migrations/*.sql") as $script) {
    $sql = file_get_contents($script);
    //echo $sql;
    $conn->query($sql);
}
/*
$sql = 'CREATE TABLE Settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
)';


 $sql = 'CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(1000),
password TEXT,
bandwidth TEXT,
diskspace TEXT,
port TEXT
)';
$conn->query($sql);
 $sql = 'CREATE TABLE FailedLogin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
ip TEXT,
time TEXT
)';
$conn->query($sql);
 $sql = 'CREATE TABLE Mail (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
subject TEXT,
message TEXT
)';
$conn->query($sql);
 $sql = 'CREATE TABLE Cloudflare (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username TEXT,
email TEXT,
password TEXT
)';
$conn->query($sql);
*/
$salt = rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999);

$sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1('admin'.$salt)."', '', '', '80')";
$conn->query($sql);
$sql = "INSERT INTO Mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$conn->query($sql);
//unlink('/var/webister/interface/config.php');

//$config_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'interface';
//file_put_contents($config_path.DIRECTORY_SEPARATOR.'config.php', '<?php
file_put_contents('/var/www/html/interface/configdatabase.php', '<?php
$'.'host'." = '127.0.0.1';
$".'user'."   = 'root';
$".'pass'."   = '".$argv[1]."';
$".'data'."   = 'webister';
$".'salt'."   = '".$salt."';

");


$databasename = $_POST["databasename"];
$dbpass = $_POST["dbpass"];

// store connection info...

$connection=mysqli_connect("localhost","root","$DBPass");


// check connection...

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$sql="CREATE DATABASE admin";

mysqli_query($connection,$sql);

    // Create user

$sql='grant usage on *.* to admin@localhost identified by ' . "'" . "admin" . "'";

mysqli_query($connection,$sql);


  

$sql="grant all privileges on admin.* to admin@localhost";

#echo "$sql";
mysqli_query($connection,$sql);


#Deprecated
#mysql_connect('localhost', 'root', $argv[1]);
#mysql_query("CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';");
#mysql_query('CREATE DATABASE admin');
#mysql_query("GRANT ALL ON admin.* TO 'admin'@'localhost'");
#mysql_close();
