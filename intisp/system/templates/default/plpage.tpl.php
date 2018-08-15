<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

require "include/head.php";
require "plugins/" . $_GET["pl"];
if ($menu_only_admin) {
    onlyadmin();
}
page();
require "include/footer.php";