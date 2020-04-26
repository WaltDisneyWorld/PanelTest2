<?php
class intispPermissions
{
    public function isAdmin()
    {
        if ('admin' == $_SESSION['user']) {
            return true;
        }
        return false;
    }
    public function onlyadmin()
    {
        if (!$this->isAdmin()) {
            die();
        }
    }
    public function isLoggedin()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            die();
        }
    }
    public function getUserStats()
    {
    }
    public function whoami()
    {
        if ('admin' == $_SESSION['user']) {
            return "Root User";
        }
        if (ismasterreseller()) {
            return "Reseller";
        }
        return "Client";
    }
}
