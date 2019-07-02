<?php
session_start();
    if ('admin' == $_SESSION['user']) {
        $path = "/";
    } else {
        $path = "/";
    }
    $disable_uploading = false;
$banned_ext = array("exe","bat","doc","docx","docm","jar","vbs","vb","sfx","dll","py","cmd");
$wp_url = "https://wordpress.org/latest.zip";
?>