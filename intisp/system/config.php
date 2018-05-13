<?php

require "/var/www/html/interface/configdatabase.php";
$securehash = "INSERTVALUEHERE";
if (isset($_SESSION["reseller"])) {
    $data = $_SESSION["reseller"];
}