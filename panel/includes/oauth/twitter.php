<?php

use OAuth\OAuth1\Service\Twitter;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;

require_once 'vendor/autoload.php';
function auth()
{
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    $sql = "SELECT value FROM settings WHERE code =  'twitter_public' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $gpub = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'twitter_secret' LIMIT 0 , 30";

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
    $twitterService = $serviceFactory->createService('twitter', $credentials, $storage);
    if (!empty($_GET['oauth_token'])) {
        $token = $storage->retrieveAccessToken('Twitter');
        // This was a callback request from twitter, get the token
        $twitterService->requestAccessToken(
            $_GET['oauth_token'],
            $_GET['oauth_verifier'],
            $token->getRequestTokenSecret()
        );
        // Send a request now that we have access token
        $result = json_decode($twitterService->request('account/verify_credentials.json'));
        return $result['email'];
    } else {
        $token = $twitterService->requestRequestToken();
        $url = $twitterService->getAuthorizationUri(array('oauth_token' => $token->getRequestToken()));
        header('Location: '.$url);
    }
}
