<?php

$intisp_ver = '13';
if (!isset($tempxaaa)) {
    require_once 'includes/classes/license.class.php';

    include 'config.php';

    $keys = '';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'register' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $keys = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);

    function issues()
    {
    }
    function checkOnline($domain)
    {
        /*
            Get Rid of License and Activation Servers
            They are no longer needed
        */
    return true;
    }

    $edition = getEdition($keys)['Type'];

    $logging = $debug;
    function updatePassword($pass)
    {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved Update Password';
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Update Password
    }
    function getStatus()
    {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved Status Update';
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Server Status
        return 'Online';
    }
    function getDiskPercentage()
    {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved Disk Usage ';
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Disk Percentage Used
        return 90;
    }
    function pwrmgmnt($action)
    {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved Power Action '.$action;
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        // Power Controls
    }
    function deprovision($username) {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved deProvision of User '.$username;
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Delete User
    }
    function provserverclient($port, $disk, $username, $password)
    {
        global $logging;
        if ($logging) {
            $message = '['.time().'] '.$_SESSION['user'].' Recieved Provision of User '.$username;
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Provision a new server
    }
}
