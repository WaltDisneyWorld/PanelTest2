<?php
session_start();
if (!isset($_SESSION["stp2"])) die();
             $m = new MySQLi("localhost", "root", $_POST["db_pass"], "webister");
        if ($m->connect_error) { 
            
            header("Location: step2.php?err");
            die();
        }
        $salt = rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999) . rand(1,9999);

        echo "Connected To The MySQL Server<br>";
        file_put_contents('../configdatabase.php', '<?php
$'.'host'." = 'localhost';
$".'user'."   = 'root';
$".'pass'."   = '".$_POST["db_pass"]."';
$".'data'."   = 'webister';
$".'salt'."   = '".$salt."';

");
echo "Configuration Wrote Complete<br>";
echo "Restoring Previous Migration Version " . file_get_contents("/var/www/html/interface/data/version") . "<br>";
$path_migrations = 'sql';
foreach(glob($path_migrations.DIRECTORY_SEPARATOR."*.sql") as $script) {
  echo "Restoring $script <br>";
    $sql = file_get_contents($script);
    if (!$m->query($sql) === TRUE) {
    echo "<br>" . $m->error . "<br>";
      die();
}
}
echo "Restore Complete V" . file_get_contents("/var/www/html/interface/data/version") . "<br>";
$sql = "INSERT INTO mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$m->query($sql);
$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1('admin'.$salt)."', '', '', '80')";
$m->query($sql);
echo "Tables Populated Complete<br>";
echo "Admin User Creation Complete<br>";
$_SESSION["stp9"] = true;
$route="after.php";
echo '<script>window.location = "' . $route . '";</script>';
?>
