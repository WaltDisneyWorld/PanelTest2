<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

function adminer_object() {
    // required to run any plugin
    include_once "templates/default/plugin.tpl";

        include_once "features/ade/l.php";

    $plugins = array(
        // specify enabled plugins here
        new AdminerLoginServers(array("localhost")),
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
     */
    
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "templates/default/database.tpl";