<?php
header('Content-Type: text/event-stream');
// recommended to prevent caching of event data.
header('Cache-Control: no-cache'); 
  
function send_message($id, $message, $progress) {
    $d = array('message' => $message , 'progress' => $progress);
      
    echo "id: $id" . PHP_EOL;
    echo "data: " . json_encode($d) . PHP_EOL;
    echo PHP_EOL;
      
    ob_flush();
    flush();
}
  
  

    send_message(10, 'Downloading composer install...' , 10); 
    file_put_contents("composer.php",file_get_contents("https://getcomposer.org/installer"));
    send_message(20, 'Running composer installer...' , 20); 
    send_message(40, shell_exec('wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | env COMPOSER_HOME="' . getcwd() . '" php -- --quiet') . "Done!" , 40);
    sleep(1);
send_message(50, "Starting Composer Package Installer... (This may take some time, do not exit this page)" , 50);
file_put_contents("composer.json",file_get_contents("../../composer.json"));
send_message(60, shell_exec('env COMPOSER_HOME="' . getcwd() . '" php composer.phar install') . "Done!" , 40);
shell_exec("cp -rf vendor ../../vendor");
  send_message(70, "Cleaning up..." , 70);
   shell_exec("rm -rf vendor cache composer.json composer.lock composer.phar composer.php keys.dev.pub keys.tags.pub .htaccess");
    sleep(1);
    if (file_exists("../../vendor")) {
     $fi = "PASSED!";
    } else {
     $fi = "FAILED!";
    }
    send_message(100, "The Vendor Folder Test has " . $fi , 100);
 send_message(100, 'Command Completed Complete!',1);

