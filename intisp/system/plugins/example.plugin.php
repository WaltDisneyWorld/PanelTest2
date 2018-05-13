<?php
/*
Plugin Name: Plugin
Plugin URI: https://www.youtube.com/
Description: This is plugin
Version: 1.1
Author: Thomas Wilbur
Author URI: https://www.youtube.com/
*/
$menu = true;
$menu_name="Example Plugin";
$menu_only_admin = true;
function page() {
   ?>
   <h1>Welcome</h1>
   <p>This is a demo plugin of somethings that you can do with our plugin system.</p>
   <?php
}
