<?php

header('Content-Type: text/event-stream');
// recommended to prevent caching of event data.
header('Cache-Control: no-cache');

function send_message($id, $message, $progress)
{
    $d = array('message' => $message, 'progress' => $progress);

    echo "id: $id".PHP_EOL;
    echo 'data: '.json_encode($d).PHP_EOL;
    echo PHP_EOL;

    ob_flush();
    flush();
}

    send_message(10, 'THIS INSTALLER ONLY WORKS ON UBUNTU AND CENTOS. THIS MAY NOT WORK ON OTHER SYSTEMS...', 10);

    send_message(10, 'Downloading the Composer Package from https://getcomposer.org/installer...', 10);
    file_put_contents('composer.php', file_get_contents('https://getcomposer.org/installer'));
    send_message(20, 'Installing Composer to the system...', 20);
    send_message(40, shell_exec('wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | env COMPOSER_HOME="'.getcwd().'" php -- --quiet').'Done!', 40);
    sleep(1);
send_message(50, 'Installing INTISP Depends (This may take some time, do not exit this page)', 50);
file_put_contents('composer.json', file_get_contents('../../composer.json'));
$output = '<pre>'.shell_exec('env COMPOSER_HOME="'.getcwd().'" php composer.phar install 2>&1').'</pre>';
send_message(60, 'Done!', 40);
shell_exec('cp -rf vendor ../../vendor');
  send_message(70, 'Cleaning up...', 70);
   shell_exec('rm -rf vendor cache composer.json composer.lock composer.phar composer.php keys.dev.pub keys.tags.pub .htaccess');
    sleep(1);
    if (file_exists('../../vendor')) {
        $fi = 'PASSED!';
    } else {
        $fi = 'FAILED!';
    }
    send_message(100, 'The Vendor Folder Test has '.$fi, 100);
    if ('FAILED!' == $fi) {
        send_message(100, '<b>This server may not support composer automated install. Please install requirements manually or try again.</b>', 100);
        send_message(100, $output, 100);
    } else {
        send_message(100, 'Command Completed Successfully!', 100);
        send_message(100, 'THIS IS GOOD!!! Your server has automatically installed the requirements for IntISP', 100);
        send_message(100, 'Feel free to return back.', 100);
    }
