<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handle error report submission.
 */
use PhpMyAdmin\ErrorReport;
use PhpMyAdmin\Message;
use PhpMyAdmin\Response;
use PhpMyAdmin\UserPreferences;
use PhpMyAdmin\Utils\HttpRequest;

require_once 'libraries/common.inc.php';

if (!isset($_POST['exception_type'])
    || !in_array($_POST['exception_type'], array('js', 'php'))
) {
    die('Oops, something went wrong!!');
}

$response = Response::getInstance();

$errorReport = new ErrorReport(new HttpRequest());

if (isset($_POST['send_error_report'])
    && (true == $_POST['send_error_report']
    || '1' == $_POST['send_error_report'])
) {
    if ('php' == $_POST['exception_type']) {
        /*
         * Prevent infinite error submission.
         * Happens in case error submissions fails.
         * If reporting is done in some time interval,
         *  just clear them & clear json data too.
         */
        if (isset($_SESSION['prev_error_subm_time'])
            && isset($_SESSION['error_subm_count'])
            && $_SESSION['error_subm_count'] >= 3
            && ($_SESSION['prev_error_subm_time'] - time()) <= 3000
        ) {
            $_SESSION['error_subm_count'] = 0;
            $_SESSION['prev_errors'] = '';
            $response->addJSON('_stopErrorReportLoop', '1');
        } else {
            $_SESSION['prev_error_subm_time'] = time();
            $_SESSION['error_subm_count'] = (
                (isset($_SESSION['error_subm_count']))
                    ? ($_SESSION['error_subm_count'] + 1)
                    : (0)
            );
        }
    }
    $reportData = $errorReport->getData($_POST['exception_type']);
    // report if and only if there were 'actual' errors.
    if (count($reportData) > 0) {
        $server_response = $errorReport->send($reportData);
        if (false === $server_response) {
            $success = false;
        } else {
            $decoded_response = json_decode($server_response, true);
            $success = !empty($decoded_response) ?
                $decoded_response['success'] : false;
        }

        /* Message to show to the user */
        if ($success) {
            if ((isset($_POST['automatic'])
                && 'true' === $_POST['automatic'])
                || 'always' == $GLOBALS['cfg']['SendErrorReports']
            ) {
                $msg = __(
                    'An error has been detected and an error report has been '
                    .'automatically submitted based on your settings.'
                );
            } else {
                $msg = __('Thank you for submitting this report.');
            }
        } else {
            $msg = __(
                'An error has been detected and an error report has been '
                .'generated but failed to be sent.'
            )
            .' '
            .__(
                'If you experience any '
                .'problems please submit a bug report manually.'
            );
        }
        $msg .= ' '.__('You may want to refresh the page.');

        /* Create message object */
        if ($success) {
            $msg = Message::notice($msg);
        } else {
            $msg = Message::error($msg);
        }

        /* Add message to response */
        if ($response->isAjax()) {
            if ('js' == $_POST['exception_type']) {
                $response->addJSON('message', $msg);
            } else {
                $response->addJSON('_errSubmitMsg', $msg);
            }
        } elseif ('php' == $_POST['exception_type']) {
            $jsCode = 'PMA_ajaxShowMessage("<div class=\"error\">'
                    .$msg
                    .'</div>", false);';
            $response->getFooter()->getScripts()->addCode($jsCode);
        }

        if ('php' == $_POST['exception_type']) {
            // clear previous errors & save new ones.
            $GLOBALS['error_handler']->savePreviousErrors();
        }

        /* Persist always send settings */
        if (isset($_POST['always_send'])
            && 'true' === $_POST['always_send']
        ) {
            $userPreferences = new UserPreferences();
            $userPreferences->persistOption('SendErrorReports', 'always', 'ask');
        }
    }
} elseif (!empty($_POST['get_settings'])) {
    $response->addJSON('report_setting', $GLOBALS['cfg']['SendErrorReports']);
} else {
    if ('js' == $_POST['exception_type']) {
        $response->addHTML($errorReport->getForm());
    } else {
        // clear previous errors & save new ones.
        $GLOBALS['error_handler']->savePreviousErrors();
    }
}
