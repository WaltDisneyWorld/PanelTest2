<?php
require "include/head.php";
require "plugins/" . $_GET["pl"];
if ($menu_only_admin) {
    onlyadmin();
}
page();
require "include/footer.php";
?>