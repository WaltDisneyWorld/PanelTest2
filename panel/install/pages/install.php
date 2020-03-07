<?php

if (!defined('HOMEBASE')) {
    die('Direct Access is Not Allowed');
}
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require '../vendor/autoload.php';
@ini_set('zlib.output_compression', 0);
set_time_limit(0);
if (!isset($_SESSION['install_db'])) {
    ?>
     <script>window.location.href = "index.php?pg=license";</script>
        <a href="index.php?pg=license">Click here</a> if you are not redirected.
    <?php
    die();
}
if (!isset($_SESSION['act'])) {
    ?>
     <script>window.location.href = "index.php?pg=db";</script>
        <a href="index.php?pg=db">Click here</a> if you are not redirected.
    <?php
    die();
}

?>


<h1 class="title">Installation Procedure</h1>
<p>The installation procedure is running please do not close or refresh this page. Do not turn off the server.</p>
<Br><br>
<textarea style="margin: 0px; height: 345px; width: 744px;" disabled>IntISP Installation Process has been started!<?php
    echo "\n";
    require '../config.php';
    echo "Importing Database...\n";
     $m = establishDBconnection();
    $path_migrations = 'sql';
    foreach (glob($path_migrations.DIRECTORY_SEPARATOR.'*.sql') as $script) {
        $sql = file_get_contents($script);
        if (true === !$m->query($sql)) {
            die('MySQL Error! Cannot Continue');
        }
    }
        $key = Key::createNewRandomKey();
        $salt = $key->saveToAsciiSafeString();
        function simpleSettingInsert($key,$value = '') {
            global $m;
            $sql = "INSERT INTO settings (code, value) VALUES ('$key', '$value')";
            echo "Placing Default Value for $key...\n";
            $m->query($sql);
        }
     $sql = "INSERT INTO mail (subject, message) VALUES ('Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>')";
$m->query($sql);
simpleSettingInsert('title','My Web Host');
simpleSettingInsert('cloudflare');
simpleSettingInsert('color','000000');
simpleSettingInsert('forum');
simpleSettingInsert('head','Panel');
simpleSettingInsert('logo','public/assets/img/intisp.png');
simpleSettingInsert('mail');
simpleSettingInsert('support');
simpleSettingInsert('theme','default');
simpleSettingInsert('upbutton');
simpleSettingInsert('whmurl');
simpleSettingInsert('smtp_host');
simpleSettingInsert('smtp_port');
simpleSettingInsert('smtp_security');
simpleSettingInsert('smtp_username');
simpleSettingInsert('smtp_password');

function oauth_db($c)
{
    simpleSettingInsert($c . "_public");
    simpleSettingInsert($c . "_secret");
    echo "Installing $c Auth Support...\n";
}
oauth_db('github');
oauth_db('twitter');
oauth_db('google');
oauth_db('facebook');
simpleSettingInsert('register',$_SESSION['act']);
$sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port) VALUES ('1', 'admin', '".Crypto::encrypt('admin', $key)."', '', '', '80')";
$m->query($sql);

        // Close the connection
        $m->close();


        echo "Import Complete...\n";
        echo "Updating Configuration...\n";
        $c = file_get_contents('../config.php');
        $c = str_replace('%SALT%', $salt, $c);
        file_put_contents('../config.php', $c);
        echo 'Configuration Updated. Installation Complete';
    ?>
    </textarea>
<br>
<p>The Installation has completed!</p><br>
<div class="notification is-danger">
Please make sure to delete the installation folder as anyone can overwrite this installation.
</div>

<p>The default Username and Password is:</p>
<b>Username:</b> admin<br>
<b>Password:</b> admin
<br><br>

<a href="../" class="button">Login to IntISP Now</a>