<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Logging functionality for webserver.
 *
 * This includes web server specific code to log some information.
 */

namespace PhpMyAdmin;

/**
 * Misc logging functions.
 */
class Logging
{
    /**
     * Get authentication logging destination.
     *
     * @return string
     */
    public static function getLogDestination()
    {
        $log_file = $GLOBALS['PMA_Config']->get('AuthLog');

        /* Autodetect */
        if ('auto' == $log_file) {
            if (function_exists('syslog')) {
                $log_file = 'syslog';
            } elseif (function_exists('error_log')) {
                $log_file = 'php';
            } else {
                $log_file = '';
            }
        }
        return $log_file;
    }

    /**
     * Generate log message for authentication logging.
     *
     * @param string $user   user name
     * @param string $status status message
     */
    public static function getLogMessage($user, $status)
    {
        if ('ok' == $status) {
            return 'user authenticated: '.$user.' from '.Core::getIp();
        }
        return 'user denied: '.$user.' ('.$status.') from '.Core::getIp();
    }

    /**
     * Logs user information to webserver logs.
     *
     * @param string $user   user name
     * @param string $status status message
     */
    public static function logUser($user, $status = 'ok')
    {
        if (function_exists('apache_note')) {
            apache_note('userID', $user);
            apache_note('userStatus', $status);
        }
        /* Do not log successful authentications */
        if (!$GLOBALS['PMA_Config']->get('AuthLogSuccess') && 'ok' == $status) {
            return;
        }
        $log_file = self::getLogDestination();
        if (empty($log_file)) {
            return;
        }
        $message = self::getLogMessage($user, $status);
        if ('syslog' == $log_file) {
            if (function_exists('syslog')) {
                @openlog('phpMyAdmin', LOG_NDELAY | LOG_PID, LOG_AUTHPRIV);
                @syslog(LOG_WARNING, $message);
                closelog();
            }
        } elseif ('php' == $log_file) {
            @error_log($message);
        } elseif ('sapi' == $log_file) {
            @error_log($message, 4);
        } else {
            @error_log(
                date('M d H:i:s').' phpmyadmin: '.$message."\n",
                3,
                $log_file
            );
        }
    }
}
