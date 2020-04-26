<?php
if (!defined("HOMEBASE")) {
    die();
}
/**
 * IntISP
 */


class IntISP
{
    protected $config_path = null;
    protected $config = null;
    protected $database = null;
    public function __construct()
    {
        //$this->config_path = __DIR__.DIRECTORY_SEPARATOR;
        $this->config_path = dirname(__DIR__, 2).DIRECTORY_SEPARATOR;
    }
    public function loadConfig()
    {
        require $this->config_path.'config.php';
        return $config;
    }
    public function preInit()
    {
        if (file_exists($this->config_path.'config.php')) {
            $this->config = $this->loadConfig();
            
            require("includes/classes/session.db.php");	//Include MySQL database class
            require("includes/classes/mysql.db.php");	//Include PHP MySQL sessions
            $session = new Session();	//Start a new PHP MySQL session
        }
        
        //if (!file_exists('config.php') || file_get_contents("config.php") == "") {
        if (!file_exists($this->config_path.'config.php') || empty($this->config)) {
            header('Location: install/');
            die();
        }

        if ($this->config["debug"]) {
            require 'includes/classes/php_error.class.php';
            $options = array(
                    'snippet_num_lines' => 3,
                    'background_text' => 'IntISP',
                    'error_reporting_off' => 0,
                    'enable_saving' => 0,
                    'display_line_numbers' => 0,
                    'server_name' => 'IntISP has stopped because an exception has occured.',
                    'error_reporting_on' => E_ALL,
            );
            php_error\reportErrors($options);
        } else {
            error_reporting(0);
        }
        
        // Final Initialization Sequence
        $this->database = new MySQLi($this->config["database_host"], $this->config["database_username"], $this->config["database_password"], $this->config["database_name"]);
        if (isset($_GET["action"])) {
            require_once "includes/classes/actionload.php";
            
            $actionload = new IntISPBackend;
            $actionload->preInit();
           
            die();
        }
    }
  
    public function getValueFromSetting($setting)
    {
        $sql = "SELECT value FROM settings WHERE code =  '$setting';";
        if ($result = mysqli_query($this->database, $sql)) {
            while ($row = mysqli_fetch_row($result)) {
                return $row[0];
            }
            // Free result set
            mysqli_free_result($result);
        }
        mysqli_close($con);
    }
    public function int_route($file)
    {
        require_once 'vendor/autoload.php';

        require_once 'includes/classes/detect.class.php';
       
        $detect = new Mobile_Detect;
        if ($detect->isMobile()) {
            define("template_name", "mobile");
        } else {
            define("template_name", $this->getValueFromSetting("theme"));
        }

        $loader = new \Twig\Loader\FilesystemLoader('templates/'.constant("template_name").DIRECTORY_SEPARATOR);
        if (!$debug) {
            $twig = new \Twig\Environment($loader, [
                'cache' => 'cache',
            ]);
        } else {
            $twig = new \Twig\Environment($loader);
        }
      
        require_once "includes/classes/notmigratedconfig.php";
        require_once "includes/classes/protection.class.php";
        require_once 'includes/classes/communication.class.php';
        require_once 'includes/classes/level.class.php';
        require_once "includes/classes/autoload.php";
        require_once "includes/classes/session.db.php";	//Include MySQL database class
        require_once "includes/classes/mysql.db.php";	//Include PHP MySQL sessions
        if (!isset($lang)) {
            $lang = 'en';
        }
        if (isset($_SESSION['lang'])) {
            $lang = $_SESSION['lang'];
        }
        require 'includes/lang/'.$lang.'.php';


        
        require_once $file;
        
        exit;
    }

    /**
     *
     */
    public function initPages()
    {
        require_once 'vendor/autoload.php';
        if (isset($_GET["webconsole"]) && isset($_SESSION['user']) && $_SESSION["user"] == "admin") {
            require("includes/views/webconsole.tpl.php");
            die();
        }
        
        $router = new \Bramus\Router\Router();
        
        $router->get('/', function () {
            if (isset($_SESSION['user'])) {
                $this->int_route('includes/views/cp.tpl.php');
            } else {
                $this->int_route('includes/views/login.tpl.php');
                die();
            }
        });

        $router->get('/(\w+)', function ($name) {
            if (file_exists("includes/views/" . $name . ".tpl.php")) {
                if ($name == "cp") {
                    $this->int_route('includes/views/cp.tpl.php', true);
                } else {
                    $this->int_route("includes/views/" . $name . ".tpl.php");
                }
            } else {
                header('HTTP/1.1 404 Not Found');
                echo file_get_contents("templates/404.html");
                die();
            }
        });
        $router->run();
    }
}
