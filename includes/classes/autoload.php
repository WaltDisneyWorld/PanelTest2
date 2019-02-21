<?php
if (!isset($HOME)) die();
if (file_exists("config.php")) require("config.php");
if (!file_exists("config.php")) {
    header("Location: install/");
    die();
}
if ($debug) {
  require( 'includes/classes/php_error.class.php' );
     $options = array(
            'snippet_num_lines' => 3,
            'background_text'  => 'IntISP',
            'error_reporting_off' => 0,
            'enable_saving' => 0,
            'display_line_numbers' => 0,
            'server_name' => 'IntISP has stopped because an exception has occured.',
            'error_reporting_on' => E_ALL
    );
        php_error\reportErrors($options);
} else {

}
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;




if (isset($_GET["reseller"])) {
    
    if (file_exists("data/reseller/" . $_GET["reseller"])) {
        session_destroy(); //Prevents other cpanel users from switching to vm.
         session_start();
        $_SESSION["reseller"] = $_GET["reseller"];
    } else {
            header('HTTP/1.0 404 Not Found'); ?>
<!doctype html><html><head><title>404 Not Found</title><style>
body { background-color: #fcfcfc; color: #333333; margin: 0; padding:0; }
h1 { font-size: 1.5em; font-weight: normal; background-color: #9999cc; min-height:2em; line-height:2em; border-bottom: 1px inset black; margin: 0; }
h1, p { padding-left: 10px; }
code.url { background-color: #eeeeee; font-family:monospace; padding:0 2px;}
</style>
</head><body><h1>INTISP RESELLER NOT FOUND</h1><p>The requested reseller <code class="url"><?php echo $_GET['reseller']; ?></code> was not found on this server.</p></body></html>
<?php
die();
    }
}
function loadINTisp() {
    $template_name = "default";
    require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates/' . $template_name);
 if ($debug) {
    
    $twig = new \Twig\Environment($loader, [
    'cache' => 'cache',
]);
} else {
    $twig = new \Twig\Environment($loader);
    
}


    $HOME = true;
if (!isset($_GET['page'])) {
 if (isset($_SESSION["user"])) {
  header("Location: ?page=cp");
 } else {
 
 
    include "includes/views/login.tpl.php";
    die();
}
}
if ($_GET["page"] == "temppass") {
     include "includes/views/temppass.tpl.php";
    die();
}
if ($_GET["page"] == "activation") {
     include "includes/views/activation.tpl.php";
    die();
}
if ($_GET["page"] == "wizard") {
     include "includes/views/wizard.tpl.php";
    die();
}
if ($_GET["page"] == "manage7") {
     include "includes/views/manage7.tpl.php";
    die();
}
if ($_GET["page"] == "fman") {
     include "includes/views/fman.tpl.php";
    die();
}
if ($_GET["page"] == "cp") {
     include "includes/views/cp.tpl.php";
    die();
}
if ($_GET["page"] == "newserv") {
     include "includes/views/newserv.tpl.php";
    die();
}
 if ($_GET["page"] == "list") {
     include "includes/views/list.tpl.php";
    die();
}
 if ($_GET["page"] == "plans") {
     include "includes/views/plans.tpl.php";
    die();
}
 if ($_GET["page"] == "settings") {
     include "includes/views/settings.tpl.php";
    die();
}
 if ($_GET["page"] == "update") {
     include "includes/views/update.tpl.php";
    die();
}
 if ($_GET["page"] == "plug") {
     include "includes/views/plugin.tpl.php";
    die();
}
 if ($_GET["page"] == "terminal") {
     include "includes/views/terminal.tpl.php";
    die();
}
 if ($_GET["page"] == "mail") {
     include "includes/views/mail.tpl.php";
    die();
}
 if ($_GET["page"] == "plpage") {
     include "includes/views/plpage.tpl.php";
    die();
}
 if ($_GET["page"] == "FileManager") {
     include "includes/views/FileManager.tpl.php";
    die();
}
 if ($_GET["page"] == "phpinfo") {
     include "includes/views/phpinfo.tpl.php";
    die();
}
 if ($_GET["page"] == "cron") {
     include "includes/views/cron.tpl.php";
    die();
}
header("Location: ?page=cp");
die();
}
