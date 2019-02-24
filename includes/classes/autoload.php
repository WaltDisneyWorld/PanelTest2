<?php
if (!isset($HOME)) {
    die();
}
if (file_exists("config.php")) {
    require("config.php");
}
if (!file_exists("config.php")) {
    header("Location: install/");
    die();
}
if ($debug) {
    require('includes/classes/php_error.class.php');
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
    error_reporting(0);
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
function int_route($file, $CP = false)
{
	require("config.php");
	$mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'theme' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $template_name = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
    
    require_once 'vendor/autoload.php';
   
 
    $loader = new \Twig\Loader\FilesystemLoader('templates/' . $template_name);
    if (!$debug) {
        $twig = new \Twig\Environment($loader, [
    'cache' => 'cache',
]);
    } else {
        $twig = new \Twig\Environment($loader);
    }


    $HOME = true;
    include($file);
}
function loadINTisp()
{
    require("config.php");
    require_once 'vendor/autoload.php';
    $router = new \Bramus\Router\Router();
   
    $router->get('/', function () {
        if (isset($_SESSION["user"])) {
            int_route("includes/views/cp.tpl.php", true);
        } else {
            int_route("includes/views/login.tpl.php");
            die();
        }
    });
    $router->get('/temppass', function () {
        int_route("includes/views/temppass.tpl.php");
    });
    $router->get('/activation', function () {
        int_route("includes/views/activation.tpl.php");
    });
    $router->get('/wizard', function () {
        int_route("includes/views/wizard.tpl.php");
    });
    $router->get('/manage7', function () {
        int_route("includes/views/manage7.tpl.php");
    });
    $router->get('/fman', function () {
        int_route("includes/views/fman.tpl.php");
    });
    $router->get('/cp', function () {
        int_route("includes/views/cp.tpl.php", true);
    });
    $router->get('/newserv', function () {
        int_route("includes/views/newserv.tpl.php");
    });
    $router->get('/list', function () {
        int_route("includes/views/list.tpl.php");
    });
    $router->get('/plans', function () {
        int_route("includes/views/plans.tpl.php");
    });
    $router->get('/settings', function () {
        int_route("includes/views/settings.tpl.php");
    });
    $router->get('/update', function () {
        int_route("includes/views/update.tpl.php");
    });
    $router->get('/plug', function () {
        int_route("includes/views/plugin.tpl.php");
    });
    $router->get('/terminal', function () {
        int_route("includes/views/terminal.tpl.php");
    });
    $router->get('/mail', function () {
        int_route("includes/views/mail.tpl.php");
    });
    $router->get('/plpage', function () {
        int_route("includes/views/plpage.tpl.php");
    });
    $router->get('/FileManager', function () {
        int_route("includes/views/FileManager.tpl.php");
    });
    $router->get('/phpinfo', function () {
        int_route("includes/views/phpinfo.tpl.php");
    });
    $router->get('/cron', function () {
        int_route("includes/views/cron.tpl.php");
    });
    $router->run();
}
