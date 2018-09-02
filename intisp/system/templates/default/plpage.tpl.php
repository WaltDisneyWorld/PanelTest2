<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

require "include/head.php";
$safe = false;
$noshow = true;
require "plugins/" . $_GET["pl"];
if ($menu_only_admin) {
    onlyadmin();
}
page();
?>
 
<?php
require "include/footer.php";
