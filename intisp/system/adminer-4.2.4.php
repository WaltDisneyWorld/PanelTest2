<?php

function adminer_object() {
    // required to run any plugin
    include_once "plugin.php";

        include_once "ade/l.php";

    
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
include "database.php";
?>