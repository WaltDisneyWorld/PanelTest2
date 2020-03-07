<?php
if (!defined("HOMEBASE")) die();
/*
 * IntISP Backend
 */
class IntISPBackend
{
    protected $database = null;
    protected $action = null;
    protected $config = null;
    public function preInit() 
    {
            $loader = new IntISP;
           $this->$config = $loader->loadConfig();
        
           $this->database = new MySQLi($this->config["database_host"], $this->config["database_username"], $this->config["database_password"], $this->config["database_name"]);
            $this->action = $_GET["action"];
              
           require_once "includes/classes/notmigratedconfig.php";
    if ($this->action == "login") require 'includes/classes/doLogin.class.php';
    if ($this->action == "pass") require 'includes/classes/pass.class.php';
    if ($this->action == "action") require 'includes/classes/action.class.php';
    if ($this->action == "newserv") require 'includes/classes/newserv.class.php';
    if ($this->action == "options") $this->executeOptions();
    if ($this->action == "exit") {
     $loader = new IntISP;
	 $config = $loader->loadConfig();
    unset($_SESSION['user']);
    session_destroy();
    header('Location: '.$config["installation_path"].'/');
}

    }
       public function onlyadmin()
    {
        if ('admin' == $_SESSION['user']) {
        } else {
            die();
        }
    }
    public function updateOption($key,$newvalue) {
    $sql = "update settings set value='$newvalue',code='$key' where key='$key'";
    mysqli_query($this->database, $sql);
    }
    public function executeOptions() {
     $this->onlyadmin(); 
     //require_once 'includes/classes/mail.class.php';

    updateOption("title",$_POST['title']);
    updateOption("head",$_POST['head']);
    updateOption("forum",$_POST['forum']);
    updateOption("support",$_POST['support']);
    updateOption("logo",$_POST['logos']);
    updateOption("theme",$_POST['theme']);
    updateOption("color",$_POST['navbar']);
    updateOption("cloudflare",$_POST['cloudflare']);
    updateOption("upbutton",$_POST['upgrade']);
    updateOption("mail",$_POST['mail']);
    updateOption("whmurl",$_POST['whmurl']);
    updateOption("smtp_host",$_POST['smtp_host']);
    updateOption("smtp_port",$_POST['smtp_port']);
    updateOption("smtp_security",$_POST['smtp_security']);
    updateOption("smtp_username",$_POST['smtp_username']);
    updateOption("smtp_username",$_POST['smtp_password']);
    updateOption("github_public",$_POST['github_public']);
    updateOption("github_secret",$_POST['github_secret']);
    updateOption("twitter_public",$_POST['twitter_public']);
    updateOption("twitter_secret",$_POST['twitter_secret']);
    updateOption("google_public",$_POST['google_public']);
    updateOption("google_secret",$_POST['google_secret']);
    updateOption("facebook_public",$_POST['facebook_public']);
    updateOption("facebook_secret",$_POST['facebook_secret']);
    /*
    
       sendemailuser(
        'settings Changed',
        '
    <b>settings have been changed on the Webister Hosting Control Panel</b>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.
    '
    );
    
    */
    header('Location: /settings');
    }
 
}
