<?php
if (!defined('HOMEBASE')) die("Direct Access is Not Allowed");
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require "../vendor/autoload.php";
@ini_set('zlib.output_compression',0);
set_time_limit(0);
if (!isset( $_SESSION["install_db"])) {
    ?>
     <script>window.location.href = "index.php?pg=license";</script>
        <a href="index.php?pg=license">Click here</a> if you are not redirected.
    <?php
    die();
}
if (!isset($_SESSION["act"])) {
    ?>
     <script>window.location.href = "index.php?pg=db";</script>
        <a href="index.php?pg=db">Click here</a> if you are not redirected.
    <?php
    die();  
    
}
?>


<h1 class="title">Installation Procedure</h1>
<p>The installation procedure is running please do not close or refresh this page. Do not turn off the server. Once the installation procedure has finished. You will automatically be redirected to the login. The default login is admin and the password is also admin.</p>
<Br><br>
<textarea style="margin: 0px; height: 345px; width: 744px;" disabled>
    IntISP Installation Process has been started!<?php echo "\n";
    require("../config.php");
    echo "Importing Database...\n";
     $m = new MySQLi($host, $user, $pass, $data);
    $path_migrations = "sql";
	foreach(glob($path_migrations.DIRECTORY_SEPARATOR."*.sql") as $script) {
    $sql = file_get_contents($script);
    if (!$m->query($sql) === TRUE) {
  die("MySQL Error! Cannot Continue");
    }
	}
    	$key = Key::createNewRandomKey();
        $salt = $key->saveToAsciiSafeString();
     $sql = "INSERT INTO mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('2', 'cloudflare', '')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('3', 'color', '000000')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('4', 'forum', 'https://forum.delinz.com')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('5', 'head', '" . '<center><a href="https://github.com/INTisp/INTisp"><img src="public/assets/img/wall.jpg"></a></center>
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

$sql = "INSERT INTO settings (id, code, value) VALUES ('15', 'smtp_host', 'localhost')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('16', 'smtp_port', '22')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('17', 'smtp_security', '0')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('18', 'smtp_username', 'test')";
$m->query($sql);
$sql = "INSERT INTO settings (id, code, value) VALUES ('19', 'smtp_password', 'test')";
$m->query($sql);
function ae($c,$f) {
    global $m;
    $sql = "INSERT INTO settings (id, code, value) VALUES ('$f', '" . $c . "_public', '')";
$m->query($sql);
$ds = $f + 1;
$sql = "INSERT INTO settings (id, code, value) VALUES ('" . $ds . "', '" . $c . "_secret', '')";
$m->query($sql);
}
ae("github",20);
ae("twitter",22);
ae("google",24);
ae("facebook",26);



$sql = "INSERT INTO settings (id, code, value) VALUES ('14', 'register', '" . $_SESSION["act"] . "')";
$m->query($sql);
$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '". Crypto::encrypt("admin", $key) ."', '', '', '80')";
$m->query($sql);

		// Close the connection
		$m->close();
		
		echo "Import Complete...\n";
		echo "Updating Configuration...\n";
		$c = file_get_contents("../config.php");
		$c  = str_replace("%SALT%",$salt,$c);
		file_put_contents("../config.php",$c);
		echo "Configuration Updated. Installation Complete";
    ?>
    </textarea>
<br>
<div class="notification is-danger">
Please make sure to delete the installation folder as anyone can overwrite this installation.
</div>
<br><br>

<a href="../index.php" class="button">Login to IntISP Now</a>