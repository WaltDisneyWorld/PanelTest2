<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

if (!isset($HOME)) die();
require 'includes/classes/head.class.php';
$safe = false;
$noshow = true;
require "plugins/" . $_GET["pl"];
if ($menu_only_admin) {
    onlyadmin();
}
page();
?>
 
<?php
require 'includes/classes/footer.class.php';
