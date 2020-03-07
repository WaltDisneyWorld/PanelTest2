<?php
define("HOMEBASE",true);
require 'includes/classes/autoload.php';
$loader = new IntISP;
$loader->preInit();
$loader->initPages();

