<?php 
error_reporting(0);
    function newreseller($port, $disk, $username, $passx)
    {
        require("/var/www/html/interface/configdatabase.php");
     $username = "rslr" . $username;
        $returnval = '';
        $returnval = $returnval.'<br>Creating Port '.$port;
        mkdir('/var/webister/'.$port);
        $returnval = $returnval.'<br>Creating Reseller '.$username;

        
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


        file_put_contents("/var/www/html/interface/data/reseller/" . $username,"");
    
        $sql = 'SELECT * FROM Users';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {
          
          
        }
 
        mysqli_free_result($result);
        mysqli_close($con);
    
        
require("/var/www/html/interface/config.php");
       $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1($passx.$salt)."', '', $disk, '$port')";
$conn->query($sql);
       $sql = 'update Users set username="admin", password="'.sha1($passx . $salt).'" where username="admin"';
  $conn->query($sql);
        $conn->close();

        $returnval = $returnval.'<br>Creating Database';
        
        $databasename = $data;
        $dbpass = $pass;



        // store connection info...

        $connection=mysqli_connect("localhost", "root", "$pass");


        // check connection...

        if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        $sql="CREATE DATABASE $username";

        mysqli_query($connection, $sql);

        // Create user

        $sql='grant usage on *.* to ' . $username . '@localhost identified by ' . "'" . "$passx" . "'";

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
        service_send("sudo wvhost ". $username. " ". $port . "");
        service_send("restart");
        $returnval = $returnval.'<br>Done! Please restart webister';
      
    }



   function newserv($port, $disk, $username, $passx)
    {
      require("/var/www/html/interface/configdatabase.php");
        $returnval = '';
        $returnval = $returnval.'<br>Creating Port '.$port;
        mkdir('/var/webister/'.$port);
        $returnval = $returnval.'<br>Creating User '.$username;
        require '/var/www/html/interface/configdatabase.php';
        
        $con = mysqli_connect($host, $user, $pass, $data);
        $sql = 'SELECT * FROM Users';
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_row($result)) {
            if ($username == $row[1]) {
             
            }
            if ($port == $row[5]) {
                
            }
        }
 
        mysqli_free_result($result);
        mysqli_close($con);
    
        $conn = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($passx . $salt)."','0','".$disk."','".$port."')";

   $con = mysqli_connect("$host", "$user", "$pass", "webister");

        $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($passx . $salt)."','0','".$disk."','".$port."')";
        if ($conn->query($sql) === true) {
        } else {
            echo('error');
        }

        $conn->close();

        $returnval = $returnval.'<br>Creating Database';
        require("/var/www/html/interface/config.php");
       


        // store connection info...

        $connection=mysqli_connect("localhost", "root", "$pass");


        // check connection...

        if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        $sql="CREATE DATABASE $username";

        mysqli_query($connection, $sql);

        // Create user

        $sql='grant usage on *.* to ' . $username . '@localhost identified by ' . "'" . "$passx" . "'";

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
}



set_time_limit (0);
require("/var/www/html/interface/config.php");
$securityhash = $securehash;
// Set the ip and port we will listen on 
$address = "0.0.0.0"; 
$port = 1209; 

// Create a TCP Stream socket 
$sock = socket_create(AF_INET, SOCK_STREAM, 0); 
echo "Billing Connect Server started at " . $address . " " . $port . "\n";

// Bind the socket to an address/port 
socket_bind($sock, $address, $port) or die('Could not bind to address'); 
// Start listening for connections 
socket_listen($sock); 

//loop and listen

while (true) {
    /* Accept incoming requests and handle them as child processes */ 
    $client = socket_accept($sock); 
    
    // Read the input from the client – 1024 bytes 
    $input = socket_read($client, 1024); 
    
    // Strip all white spaces from input 
    $output = $input; 
    
    // Display output back to client 
    socket_write($client, "you wrote " . $input . "\n"); 
    
    // display input on server side
  
    $input = explode(" ", $input);
      echo "Received: " . $input[1] . "\n";
    if ($input[0] != $securityhash)
    {
        echo "Unauthorized Access from Client.\n";
    } else {
        if ($input[1] == "newreseller") {
            newreseller($input[2],$input[3],$input[4],$input[5]);
        }
         if ($input[1] == "newserv") {
            newserv($input[2],$input[3],$input[4],$input[5]);
        }
   if ($input[1] == "restart") {
      
$fp = fsockopen("localhost", 1210, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "restart";
    fwrite($fp, $out);
 
    fclose($fp);
}

   }
    }
}

// Close the client (child) socket 
socket_close($client); 

// Close the master sockets 
socket_close($sock); 
?>