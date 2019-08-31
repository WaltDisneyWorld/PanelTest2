<?php
class communications {
    function getIntISPVersion() {
        $version = 14.1;
        return $version;
    }
    function updatePassword($pass)
    {

    } 
    function getStatus()
    {
        return 'Online';
    }   
    function getDiskPercentage()
    {
        return 90;
    }
    function pwrmgmnt($action)
    {

    }
    function deprovision($username) {

    }
    function overQuota() {
        return false;
    }
    function provserverclient($port, $disk, $username, $password)
    {

    }
}