<?php
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
if (file_exists("vendor/autoload")) {

require "vendor/autoload.php";
}

/* function error_found($errstr,$errorno,$errline,$errfile){
    $error = "";
    switch ($errno) {
    case E_USER_ERROR:
        $error .= "<b>My ERROR</b> [$errno] $errstr<br />\n";
        $error .= "  Fatal error on line $errline in file $errfile";
        $error .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        $error .= "Aborting...<br />\n";
        break;

    case E_USER_WARNING:
        $error .= "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        $error .= "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        $error .= "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }
  header("Location: error.php?error=" . urlencode($error));
}
set_error_handler('error_found');
set_exception_handler('error_found'); */
try {
session_start();
if (!file_exists("configdatabase.php")) {
    header("Location: install/");
    die();
}
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
/**
 * index.php.
 *
 * Validate all installation settings and connection to mysql
 *
 * @category Important
 *
 * @author    Adaclare
 * @copyright 2017 Adaclare
 */
if (!isset($_GET['page'])) {
    include "templates/default/main.tpl.php";
    die();
}
if (file_exists("templates/default/" . $_GET['page'].'.tpl.php')) {
    include "templates/default/" . $_GET['page'].'.tpl.php';
    die();
}  
    header('HTTP/1.0 404 Not Found'); ?>
<!doctype html><html><head><title>404 Not Found</title><style>
body { background-color: #fcfcfc; color: #333333; margin: 0; padding:0; }
h1 { font-size: 1.5em; font-weight: normal; background-color: #9999cc; min-height:2em; line-height:2em; border-bottom: 1px inset black; margin: 0; }
h1, p { padding-left: 10px; }
code.url { background-color: #eeeeee; font-family:monospace; padding:0 2px;}
</style>
</head><body><h1>Not Found</h1><p>The requested resource <code class="url">index.php?page=<?php echo $_GET['page']; ?></code> was not found on this server.</p></body></html>
<?php

} catch (Exception $e) {
    header("Location: error.php?error=" . urlencode($e->getMessage()));
}
?>
