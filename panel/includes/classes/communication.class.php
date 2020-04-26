<?php
class communications
{
    public function getIntISPVersion()
    {
        $version = 15.0;
        return $version;
    }
    public function updatePassword($pass)
    {
    }
    public function getStatus()
    {
        return 'Online';
    }
    public function getDiskPercentage()
    {
        return 3;
    }
    public function pwrmgmnt($action)
    {
    }
    public function deprovision($username)
    {
    }
    public function adddomain($domain)
    {
    }
    public function removedomain($user, $domain)
    {
        // USER , DOMAIN ID
    }
    public function getDiskLimit($user)
    {
        return "1000";
    }
    public function provserverclient($port, $disk, $username, $password)
    {
    }
}
