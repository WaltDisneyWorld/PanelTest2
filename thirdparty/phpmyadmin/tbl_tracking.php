<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Table tracking page.
 */
use PhpMyAdmin\Message;
use PhpMyAdmin\Tracker;
use PhpMyAdmin\Tracking;
use PhpMyAdmin\Response;

require_once './libraries/common.inc.php';

//Get some js files needed for Ajax requests
$response = Response::getInstance();
$header = $response->getHeader();
$scripts = $header->getScripts();
$scripts->addFile('vendor/jquery/jquery.tablesorter.js');
$scripts->addFile('tbl_tracking.js');

define('TABLE_MAY_BE_ABSENT', true);
require './libraries/tbl_common.inc.php';

if (Tracker::isActive()
    && Tracker::isTracked($GLOBALS['db'], $GLOBALS['table'])
    && !(isset($_POST['toggle_activation'])
    && 'deactivate_now' == $_POST['toggle_activation'])
    && !(isset($_POST['report_export'])
    && 'sqldumpfile' == $_POST['export_type'])
) {
    $msg = Message::notice(
        sprintf(
            __('Tracking of %s is activated.'),
            htmlspecialchars($GLOBALS['db'].'.'.$GLOBALS['table'])
        )
    );
    $response->addHTML($msg->getDisplay());
}

$url_query .= '&amp;goto=tbl_tracking.php&amp;back=tbl_tracking.php';
$url_params['goto'] = 'tbl_tracking.php';
$url_params['back'] = 'tbl_tracking.php';

// Init vars for tracking report
if (isset($_POST['report']) || isset($_POST['report_export'])) {
    $data = Tracker::getTrackedData(
        $GLOBALS['db'],
        $GLOBALS['table'],
        $_POST['version']
    );

    $selection_schema = false;
    $selection_data = false;
    $selection_both = false;

    if (!isset($_POST['logtype'])) {
        $_POST['logtype'] = 'schema_and_data';
    }
    if ('schema' == $_POST['logtype']) {
        $selection_schema = true;
    } elseif ('data' == $_POST['logtype']) {
        $selection_data = true;
    } else {
        $selection_both = true;
    }
    if (!isset($_POST['date_from'])) {
        $_POST['date_from'] = $data['date_from'];
    }
    if (!isset($_POST['date_to'])) {
        $_POST['date_to'] = $data['date_to'];
    }
    if (!isset($_POST['users'])) {
        $_POST['users'] = '*';
    }
    $filter_ts_from = strtotime($_POST['date_from']);
    $filter_ts_to = strtotime($_POST['date_to']);
    $filter_users = array_map('trim', explode(',', $_POST['users']));
}

// Prepare export
if (isset($_POST['report_export'])) {
    $entries = Tracking::getEntries($data, $filter_ts_from, $filter_ts_to, $filter_users);
}

// Export as file download
if (isset($_POST['report_export'])
    && 'sqldumpfile' == $_POST['export_type']
) {
    Tracking::exportAsFileDownload($entries);
}

$html = '<br />';

/*
 * Actions
 */
if (isset($_POST['submit_mult'])) {
    if (!empty($_POST['selected_versions'])) {
        if ('delete_version' == $_POST['submit_mult']) {
            foreach ($_POST['selected_versions'] as $version) {
                Tracking::deleteTrackingVersion($version);
            }
            $html .= Message::success(
                __('Tracking versions deleted successfully.')
            )->getDisplay();
        }
    } else {
        $html .= Message::notice(
            __('No versions selected.')
        )->getDisplay();
    }
}

if (isset($_POST['submit_delete_version'])) {
    $html .= Tracking::deleteTrackingVersion($_POST['version']);
}

// Create tracking version
if (isset($_POST['submit_create_version'])) {
    $html .= Tracking::createTrackingVersion();
}

// Deactivate tracking
if (isset($_POST['toggle_activation'])
    && 'deactivate_now' == $_POST['toggle_activation']
) {
    $html .= Tracking::changeTracking('deactivate');
}

// Activate tracking
if (isset($_POST['toggle_activation'])
    && 'activate_now' == $_POST['toggle_activation']
) {
    $html .= Tracking::changeTracking('activate');
}

// Export as SQL execution
if (isset($_POST['report_export']) && 'execution' == $_POST['export_type']) {
    $sql_result = Tracking::exportAsSqlExecution($entries);
    $msg = Message::success(__('SQL statements executed.'));
    $html .= $msg->getDisplay();
}

// Export as SQL dump
if (isset($_POST['report_export']) && 'sqldump' == $_POST['export_type']) {
    $html .= Tracking::exportAsSqlDump($entries);
}

/*
 * Schema snapshot
 */
if (isset($_POST['snapshot'])) {
    $html .= Tracking::getHtmlForSchemaSnapshot($url_query);
}
// end of snapshot report

/*
 *  Tracking report
 */
if (isset($_POST['report'])
    && (isset($_POST['delete_ddlog']) || isset($_POST['delete_dmlog']))
) {
    $html .= Tracking::deleteTrackingReportRows($data);
}

if (isset($_POST['report']) || isset($_POST['report_export'])) {
    $html .= Tracking::getHtmlForTrackingReport(
        $url_query,
        $data,
        $url_params,
        $selection_schema,
        $selection_data,
        $selection_both,
        $filter_ts_to,
        $filter_ts_from,
        $filter_users
    );
} // end of report

/*
 * List selectable tables
 */
$selectable_tables_sql_result = Tracking::getSqlResultForSelectableTables();
if ($GLOBALS['dbi']->numRows($selectable_tables_sql_result) > 0) {
    $html .= Tracking::getHtmlForSelectableTables(
        $selectable_tables_sql_result,
        $url_query
    );
}
$html .= '<br />';

/*
 * List versions of current table
 */
$sql_result = Tracking::getListOfVersionsOfTable();
$last_version = Tracking::getTableLastVersionNumber($sql_result);
if ($last_version > 0) {
    $html .= Tracking::getHtmlForTableVersionDetails(
        $sql_result,
        $last_version,
        $url_params,
        $url_query,
        $pmaThemeImage,
        $text_dir
    );
}

$type = $GLOBALS['dbi']->getTable($GLOBALS['db'], $GLOBALS['table'])
    ->isView() ? 'view' : 'table';
$html .= Tracking::getHtmlForDataDefinitionAndManipulationStatements(
    'tbl_tracking.php'.$url_query,
    $last_version,
    $GLOBALS['db'],
    array($GLOBALS['table']),
    $type
);

$html .= '<br class="clearfloat"/>';

$response->addHTML($html);
