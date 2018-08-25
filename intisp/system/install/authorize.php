<?php
function failed($msg) {
  header("Location: after.php?e=" . urlencode($msg));
  die();
}
session_start();
require("../include/verify.php");
$results = check_license($_POST["key"]);
switch ($results['status']) {
    case "Active":
        // get new local key and save it somewhere
        $localkeydata = $results['localkey'];
        break;
    case "Invalid":
        failed("License key is Invalid");
        break;
    case "Expired":
        failed("License key is Expired");
        break;
    case "Suspended":
        failed("License key is Suspended");
        break;
    default:
        failed("Invalid Response");
        break;
}
file_put_contents("../data/register",$_POST["key"]);
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
The Serial Number <?php echo $_POST["key"]; ?> was added to this IntISP server.
  </div>
</article>
  </div>
      <a href="../" class="button is-link">Return to Panel</a>

  </section>
  
   
  </body>
</html>
