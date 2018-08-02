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
    $sql = file_get_contents($script);
    if (!$conn->query($sql) === TRUE) {
    echo "<br>" . $conn->error . "<br>";
      die();
}
}
echo "Restore Complete V" . file_get_contents("/var/www/html/interface/data/version") . "<br>";
$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".sha1('admin'.$salt)."', '', '', '80')";
$m->query($sql);
echo "Admin User Created<br>";
$_SESSION["stp9"] = true;
$route="after.php";
echo '<script>window.location = "' . $route . '";</script>';
?>
