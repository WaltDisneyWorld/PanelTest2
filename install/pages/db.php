<?php
if (!defined('HOMEBASE')) {
    die("Direct Access is Not Allowed");
}
if (!isset($_SESSION["install_db"])) {
    ?>
     <script>window.location.href = "index.php?pg=license";</script>
        <a href="index.php?pg=license">Click here</a> if you are not redirected.
    <?php
    die();
}
?>
<h1 class="title">Database Details</h1>

<?php
if (isset($_GET["c"])) {
    $e = 0;
    require("../includes/classes/license.class.php");
    if (getEdition($_POST["key"]) == false) {
        $e = 1; ?>
   <div class="notification is-danger">
 The License information provided may be not be valid.
</div>
  <?php
    } else {
        $_SESSION["act"] = $_POST["key"];
    }
    if ($e == 0) {
        $conn = new mysqli($_POST["host"], $_POST["username"], $_POST["password"]);
        $sql = "CREATE DATABASE IF NOT EXISTS " . $_POST["database"];
        $conn->query($sql);
        $mysqli_connection = new MySQLi($_POST["host"], $_POST["username"], $_POST["password"], $_POST["database"]);
        if ($mysqli_connection->connect_error) {
            $e = 1; ?>
    <div class="notification is-danger">
 We were unable to connect to the database given. Please validate the credentials and make sure they are correct.
</div>
   <?php
        }
    }
    if ($e == 0) {
        $config = file_get_contents("config/database.php");
        $new  = str_replace("%HOSTNAME%", $_POST['host'], $config);
        $new  = str_replace("%USERNAME%", $_POST['username'], $new);
        $new  = str_replace("%PASSWORD%", $_POST['password'], $new);
        $new  = str_replace("%DATABASE%", $_POST['database'], $new);
        $new  = str_replace("%WEBROOT%", $_POST['webroot'], $new);
        $new  = str_replace("%LANG%", "en", $new);
        file_put_contents("../config.php", $new);
        if (!file_exists("../config.php")) {
            $e = 1; ?>
    
     <div class="notification is-danger">
 We were unable to write the configuration file. Please make sure the permissions are set up correctly.
</div>
<?php
        }
        if ($e == 0) {
            ?>
     <script>window.location.href = "index.php?pg=installation";</script>
        <a href="index.php?pg=installation">Click here</a> if you are not redirected.
    <?php
        }
    }
}
?>
  
  
 
<?php

?>

<p>Congrats! You have reached the hard part. You will need to find your database details. If you are unable to find these details or you do not know how. Please press the Need Assistance button and we will assist you with it.</p>
<form method="POST" action="index.php?pg=db&c">
<br>
<div class="field">
  <label class="label">License Key</label>
  <div class="control">
    <input name="key" class="input is-rounded" type="text" placeholder="IntISP-XXXXXXXXXXXX" value="NXAXP-8374J-8QWCS-83EN4-9I0" style="width:400px">
    <p>If you do not have a license key. You can get one <a href="https://host.enyrx.com">here</a>.</p>
  </div>
</div>
<br><br>
<div class="field">
  <label class="label">Database Host</label>
  <div class="control">
    <input name="host" class="input is-rounded" type="text" placeholder="localhost" value="localhost" style="width:400px">
    <p>This is where the database server is running. If it is on the same computer is should be localhost or 127.0.0.0.1</p>
  </div>
</div>


<div class="field">
  <label class="label">Database Username</label>
  <div class="control">
    <input name="username" class="input is-rounded" type="text" placeholder="root" value="root" style="width:400px">
    <p>The database user should be root.</p>
  </div>
</div>

<div class="field">
  <label class="label">Database Password</label>
  <div class="control">
    <input name="password" class="input is-rounded" type="text" placeholder="**********" style="width:400px">
    <p>The database password should be what was generated/entered during installation.</p>
  </div>
</div>
	

<div class="field">
  <label class="label">Database Name</label>
  <div class="control">
    <input name="database" class="input is-rounded" type="text" placeholder="intisp" value="<?php
    function generateRandomString($length = 10) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo "intisp" . generateRandomString(10);
    
    ?>" style="width:400px">
    <p>You will need to make sure that the database exists.</p>
  </div>
</div>
	
<div class="field">
  <label class="label">Site URL</label>
  <div class="control">
	  <?php $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                $_SERVER['REQUEST_URI']; ?>
    <input name="webroot" class="input is-rounded" type="text" value="<?php echo substr($link, 0, -24); ?>" style="width:400px">
    <p>The website URL where IntISP is installed.</p>
  </div>
</div><Br><br>

<div class="buttons has-addons">
    <a href="index.php?pg=license" class="button">Back</a>
  <input type="submit" class="button" value="Continue">
</div>
</form>