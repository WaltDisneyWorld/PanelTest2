<?php
session_start();
/*
Offical Client for AdaclareID 2.0 Oauth
*/
  function buildLink($apiurl,$api_security,$command,$callback = "", $session = "") {
        global $apiurl,$api_security;
        return ($apiurl . "?security=" . $api_security . "&command=" . $command . "&callback=" . $callback . "&session=" . $session);
    }
class adaclareID {
   public $apiurl,$api_security;
    function setInfo($api_url,$api_security_id) {
        global $apiurl,$api_security;
        $apiurl = $api_url;
        $api_security = $api_security_id;
    }
    function sendTestPayload () {
        global $apiurl,$api_security;
        $output = file_get_contents(buildLink($apiurl,$api_security,"status"));
        if ($output == '200:"Online"') return true;
        return false;
    }
    function requestLogin() {
        global $apiurl,$api_security;
         if (isset($_SESSION["loginauth01"])) {
        $output = file_get_contents(buildLink($apiurl,$api_security,"check","",$_SESSION["loginauth01"]));
        if ($output != '401:"Not Authorized"') {
        
            return true;
        }}
        if (isset($_GET["session"]))
        {
            $_SESSION["loginauth01"] = $_GET["session"];
           
            return true;
            
        } else {
        $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        header("Location: " . buildLink($apiurl,$api_security,"authorize",$actual_link));
        die();
        }
    }
    function checkLogin () {
        global $apiurl,$api_security;
      
        if (!isset($_SESSION["loginauth01"])) return false;
        $output = file_get_contents(buildLink($apiurl,$api_security,"check","",$_SESSION["loginauth01"]));
        if ($output == '401:"Not Authorized"') return false;
        $output = json_decode($output, true);
        return $output;
        
    }
 
}
 $id = new adaclareID(); //Registers the Class
$id->setInfo("https://www.adaclare.com/login/index/server.php","adaclareIsNetworking"); //Sets the required Variables to connect to the API.
if(!$id->sendTestPayload()) die("Networking Error Detected or cannot connect to Oauth API"); //Checks if the api can connect
if($id->checkLogin() == false) $id->requestLogin(); //Checks if user is logged in
$username= $id->checkLogin()["username"];
$email= $id->checkLogin()["email"];
$session= $id->checkLogin()["session"];
$ip = file_get_contents("https://intisp.adaclare.com/api/ip.php");
file_put_contents("../data/register",$session);
file_get_contents("https://intisp.adaclare.com/api/?v=hulint9&n&u=" . urlencode($username) . "&e=" . urlencode($email) . "&s=" . urlencode($session) . "&i=" . urlencode($ip));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activated IntISP</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Activated your IntISP <?php echo file_get_contents("../data/version"); ?> Completed
      </h1>
      <p class="subtitle">
        Your IntISP copy is now genuine and is completely valid. It is ready to go. Please run this command<br>
        sudo rm -rf /var/www/html/interface/install
      </p>

  <article class="message is-info">
  <div class="message-body">
The Serial Number <?php echo $session; ?> was added to this IntISP server. You will soon recieve a confirmation email. This IntISP server is currently maintained by <?php echo $username; ?> (<?php echo $email; ?>).
  </div>
</article>
  </div>
      <a href="../" class="button is-link">Return to Panel</a>

  </section>
  
   
  </body>
</html>
