<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Logout script.
 */
use PhpMyAdmin\Core;

require_once 'libraries/common.inc.php';

if ('POST' != $_SERVER['REQUEST_METHOD'] || $token_mismatch) {
    Core::sendHeaderLocation('./index.php');
} else {
    $auth_plugin->logOut();
}
