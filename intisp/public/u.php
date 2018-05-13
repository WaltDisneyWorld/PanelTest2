<?php
if (!isset($_GET["i"])) {
    echo "No Address Found<br>";
    echo "Please try again or contact website owner<br>";
    echo "Powered By intisp<br>";
    die();
}
if (!file_exists("/var/www/html/interface/data/u/names/" . $_GET["i"])) {
 echo "No Address Found<br>";
    echo "Please try again or contact website owner<br>";
    echo "Powered By intisp<br>";
    die();
}
$a = file_get_contents("/var/www/html/interface/data/u/names/" . $_GET["i"]);
//router

if (file_exists("/var/webister/" . $a . "/index.php")) {
    include "/var/webister/" . $a . "/index.php";
}
else if (file_exists("/var/webister/" . $a . "/index.html")) {
    echo file_get_contents("/var/webister/" . $a . "/index.html");
} else {
    echo "No Address Found<br>";
    echo "Please try again or contact website owner<br>";
    echo "Powered By intisp<br>";
    die();
}


 echo file_get_contents("/var/webister/interface/data/loginfoot");
?>
