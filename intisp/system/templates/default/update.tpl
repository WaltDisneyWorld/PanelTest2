<?php session_start(); require 'include/head.php';onlyadmin();
ini_set('max_execution_time', 60);
error_reporting(E_ALL);
?>
 <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Updates</h2>
<?php
$current = file_get_contents("data/version");
$getVersions = file_get_contents("https://dl.adaclare.com/main/intisp/curversion.txt");
if ($getVersions != '') {
    echo '<p>CURRENT VERSION: '.$current.'</p>';
    echo '<p>Reading Current Releases List</p>';
    if ($current != $getVersions) {
        echo '<p>New Update Found: v'.$getVersions.'</p>';
        if (!is_file('data/wb-'.$getVersions.'.zip')) {
             echo '<p>Downloading New Update</p>';
             $newUpdate = file_get_contents('https://dl.adaclare.com/main/intisp/wb-'.$getVersions.'.zip');
 
             $dlHandler = fopen('data/wb-'.$getVersions.'.zip', 'w');
            if (!fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); 
            }
             fclose($dlHandler);
             echo '<p>Update Downloaded And Saved</p>';
        } else { echo '<p>Update already downloaded.</p>';
        }   
        if ($_GET['doUpdate'] == true) {
            echo "Opening " . 'data/wb-'.$getVersions.'.zip...<br><pre>';
            echo shell_exec('unzip -o /var/www/html/interface/data/wb-'.$getVersions.'.zip -d /var/www/html/interface/');
            echo "</pre>";
            $updated = true;
                
            file_put_contents("data/version", $getVersions);
            include "include/mail.php";
            sendemailuser("Webister Update to " . $getVersions, "Webister is now updated to the latest version, " . $getVersions . ".");
            echo '<p class="success">&raquo; Webister Updated to v'.$getVersions.'</p>';
        } else {
             echo '<p>Update ready. <a href="?doUpdate=true">&raquo; Install Now?</a></p>';
        }
    } else {
        echo '<p>&raquo; No update is available.</p>';
    }
} else {
    echo '<p>Could not find latest realeases.</p>';
}
?>

<?php
require 'include/footer.php';
?>