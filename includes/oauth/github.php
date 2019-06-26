<?php

use OAuth\OAuth2\Service\GitHub;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;

require_once 'vendor/autoload.php';
function auth()
{
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    $sql = "SELECT value FROM settings WHERE code =  'github_public' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $gpub = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'github_secret' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $gsec = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }

    $serviceFactory = new \OAuth\ServiceFactory();
    // Session storage
    $actual_link = (isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $storage = new Session();
    $credentials = new Credentials(
        $gpub,
        $gsec,
        $actual_link
);
    $gitHub = $serviceFactory->createService('GitHub', $credentials, $storage, array('user'));
    if (!empty($_GET['code'])) {
        // This was a callback request from github, get the token
        $gitHub->requestAccessToken($_GET['code']);
        $result = json_decode($gitHub->request('user/emails'), true);
        return 'github_'.$result[0];
    } else {
        $url = $gitHub->getAuthorizationUri();

        header('Location: '.$url);
        die();
    }
}
