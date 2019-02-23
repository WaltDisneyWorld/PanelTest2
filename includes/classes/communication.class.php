<?php

$intisp_ver = "13";
if (!isset($tempxaaa)) {
    require_once("includes/classes/license.class.php");



    include 'config.php';


    $keys = "";
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
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
        if (isset($_SESSION["singlechk"])) {
            return false;
        }
        
        $curlInit = curl_init($domain);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        //get answer
        $response = curl_exec($curlInit);

        curl_close($curlInit);
        if ($response) {
            return true;
        }
        $_SESSION["singlechk"] = "1";
        return false;
    }
    $dev_edition = true;
    if (checkOnline("http://host.enyrx.com")) {
        $edition = getEdition($keys)["Type"];
    } else {
        $edition = "Dev";
        $failsafe_offline = true;
    }
    if ($edition == "Shared") {
        $dev_edition = false;
        $edition = "Shared Host Edition";
    }
    if ($edition == "Standalone") {
        $dev_edition = false;
        $edition = "Standalone Server Edition";
    }
    if ($edition == "Host") {
        $dev_edition = false;
        $edition = "Web Host Edition";
    }
    if ($edition == "Dev") {
        $edition = "Developer Edition";
    }
    $logging = $debug;
    function updatePassword($pass)
    {
        global $logging;
        if ($logging) {
            $message = "[" . time() . "] " . $_SESSION["user"] . " Recieved Update Password";
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Update Password
    }
    function getStatus()
    {
        global $logging;
        if ($logging) {
            $message = "[" . time() . "] " . $_SESSION["user"] . " Recieved Status Update";
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Server Status
        return "Online";
    }
    function getDiskPercentage()
    {
        global $logging;
        if ($logging) {
            $message = "[" . time() . "] " . $_SESSION["user"] . " Recieved Disk Usage ";
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Disk Percentage Used
        return 30;
    }
    function pwrmgmnt($action)
    {
        global $logging;
        if ($logging) {
            $message = "[" . time() . "] " . $_SESSION["user"] . " Recieved Power Action " . $action;
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        // Power Controls
    }
    function provserverclient($port, $disk, $username, $password)
    {
        global $logging;
        if ($logging) {
            $message = "[" . time() . "] " . $_SESSION["user"] . " Recieved Provision of User " . $username;
            $myfile = file_put_contents('actions.log', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        //Provision a new server
    }
}
