<?php
session_start();

if (isset($_GET['yes'])) {
    function newserv($port, $disk, $username, $passx)
    {
     $username = "rslr" . $username;
        $returnval = '';
        $returnval = $returnval.'<br>Creating Port '.$port;
        mkdir('/var/webister/'.$port);
        $returnval = $returnval.'<br>Creating Reseller '.$username;
        include 'config.php';
        
        $conx = mysqli_connect($host, $user, $pass);
        $sql = 'CREATE DATABASE ' . $username;
        $result = mysqli_query($conx, $sql);
        $con = mysqli_connect($host, $user, $pass, $username);
        /* Create Database */
        


$conn = new mysqli($host, $user, $pass, $username);



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


$sql = "INSERT INTO Mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$conn->query($sql);
//unlink('/var/webister/interface/config.php');


        file_put_contents("data/reseller/" . $username,"");
    
        $sql = 'SELECT * FROM Users';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {
          
          
        }
 
        mysqli_free_result($result);
        mysqli_close($con);
    
        
require("config.php");
       $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1($passx.$salt)."', '', $disk, '$port')";
$conn->query($sql);
       $sql = 'update Users set username="admin", password="'.sha1($passx . $salt).'" where username="admin"';
  $conn->query($sql);
        $conn->close();

        $returnval = $returnval.'<br>Creating Database';
        
        $databasename = $_POST["databasename"];
        $dbpass = $_POST["dbpass"];



        // store connection info...

        $connection=mysqli_connect("localhost", "root", "$pass");


        // check connection...

        if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        $sql="CREATE DATABASE $username";

        mysqli_query($connection, $sql);

        // Create user

        $sql='grant usage on *.* to ' . $username . '@localhost identified by ' . "'" . "$password" . "'";

        mysqli_query($connection, $sql);


  

        $sql="grant all privileges on admin.* to admin@localhost";

        // echo "$sql";
        mysqli_query($connection, $sql);
// Fix Database Perms

        $sql="grant all privileges on $username.* to  '$username'@'localhost'";

        // echo "$sql";
        mysqli_query($connection, $sql);

        // mysql_connect('localhost', 'root', "$pass");
        // mysql_query("CREATE USER '$username'@'localhost' IDENTIFIED BY '$username';");
        // mysql_query("CREATE DATABASE $username");
        // mysql_query("GRANT ALL ON $username.* TO '$username'@'localhost'");
        // mysql_close();
        $returnval = $returnval.'<br>Trying to Restart Webister';


      
        mkdir("/var/webister/" . $port);
        //shell_exec("cd /var/webister/" . $port . "/ && sudo nohup php -S 0.0.0.0:" . $port. " > exhibitor.out 2>&1 &");
        //Start the webserver using apache
               function service_send($command) {
$fp = fsockopen("127.0.0.1", 1210, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    fwrite($fp, $command);
 
    fclose($fp);
}
}
        service_send("sudo wvhost ". $_POST["username"]. " ". $port . "");
        service_send("restart");
        $returnval = $returnval.'<br>Done! Please restart webister';
        header('Location: ?pa='.urlencode($returnval));
    }
    newserv($_POST['pstart'], $_POST['disk'], $_POST['username'], $_POST["passx"]);
       include "include/mail.php";
            sendemailuser(
                "New User", "
    <b>A new user has been added to Webister</b>
    <p>There username is " . $_POST['username'] . "</p>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.</p>
    "
            );
}
require 'include/head.php';
onlyadmin();onlymasterreseller();
?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">New Server Reseller</h2>
                        <p><?php if (isset($_GET['pa'])) {
                            echo ''.$_GET['pa'].'';
} ?></p>
                        <p>This could take a very long time. Once you create a user, please do not exit away from this page.</p>
                <form method="POST" action="?yes">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Reseller Name</label>
    <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="" required="required">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Disk Space in MB</label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Port</label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput">Password</label>
    <input type="text" class="form-control" name="passx" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add User</button>
</form>			
<?php
require 'include/footer.php';
?>
