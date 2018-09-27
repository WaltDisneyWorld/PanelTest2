<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

require "configdatabase.php";
$securehash = "INSERTVALUEHERE";
if (isset($_SESSION["reseller"])) {
    $data = $_SESSION["reseller"];
}