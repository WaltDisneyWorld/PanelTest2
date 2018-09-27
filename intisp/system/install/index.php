<?php
session_start();
error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../configdatabase.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created. Please verify that your serial number is correct and that your settings are correct.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written.");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir); 
			header( 'Location: ' . $redir . '' ) ;
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly.');
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
		<title>Install | IntISP</title>

	<link rel='stylesheet' id='buttons-css'  href='css/styles.css' type='text/css' media='all' />
	</head>
	<body class="core-ui">
<p id="logo"><a href="https://intisp.delinz.com/" tabindex="-1">IntISP</a></p>
<?php
if (!isset($_GET["details"])) { 
	?>
<p>Welcome to IntISP. Before getting started, we need some information to completely setup the entire system.</p>
<ol>
	<li>Serial Number</li>
	<li>Database name</li>
	<li>Database username</li>
	<li>Database password</li>
	<li>Database host</li>
	<li>Site Name</li>
	<li>Administrator Username</li>
	<li>Administrator Password</li>
	<li>Administrator Email</li>
</ol>
<p>
		We&#8217;re going to use this information to create a <code>configuration</code> file.	
	</p>
	<b>Running System Checks</b>
<p>Checking File Writable <?php
$error = false;
	echo "✓";

?></p>
<p>MySQL PHP Extension <?php
function is_connected()
{
    $connected = @fsockopen("www.delinz.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}


if (!function_exists('mysqli_connect')) {
	$error = true;
	echo "✖";
} else {
	echo "✓";
}

?></p>
<p>Checking Communication with DeLinz <?php
if (!is_connected()) {
	$error = true;
	echo "✖";
} else {
	echo "✓";
}

?></p>
<p>Checking Composer Installed Modules <?php
if (!file_exists("../vendor")) {
	$error = true;
	echo "✖";
	?>
	<p class="alert warning">You will need to install the composer libraries. You will need to type in your terminal sudo sh /var/www/html/interface/install/comp.sh</p>
	<?php
} else {
	echo "✓";
}

?></p>
<p>Checking Previous Installation <?php
if (file_exists("../configdatabase.php")) {
	$error = true;
	echo "✖";
	?>
	<p class="alert warning">This installation has been blocked. You cannot install because the system has already been installed. We recommend that you delete the installation folder</p>
	<?php
} else {
	echo "✓";
}

?></p>
<?php if ($error) { ?>
<p class="alert warning">Please check the requirements or contact support. We are not able to install IntISP because you do not meet the minimum requirements.</p>
<?php } else { 
$_SESSION["passed"] = true;
?>
<p class="alert success">Your system passed the basic requirement check.</p>
<p class="step"><a href="?details" class="button button-large">Next</a></p>
<?php } ?>
<?php 
} else { 
	if (!$_SESSION["passed"]) {
		die("Navigation Mismatch. Direct Linking Detected");
	}
	?>
    <center><h1>Install</h1></center>
    


		  <?php if(isset($message)) {echo '<p class="alert warning">' . $message . '</p>';}?>
<form id="install_form" method="post" action="?details">
	<p>Below you should enter your database connection details. If you&#8217;re not sure about these, contact your host.</p>
	<table class="form-table">
			<tr>
			<th scope="row"><label for="key">Activation Key</label></th>
			<td><input name="key" id="key" type="text" size="25" placeholder="Intisp-XXXXXXXXXXX" /></td>
			<td>
				You may get an activation key <a href="https://host.delinz.com/index.php">here</a>. This is required in order to activate IntISP</td>
		</tr>
		<tr>
			<th scope="row"><label for="database">Database Name</label></th>
			<td><input name="database" id="database" type="text" size="25" placeholder="Intisp" /></td>
			<td>The name of the database you want to use with IntISP.</td>
		</tr>
		<tr>
			<th scope="row"><label for="username">Database Username</label></th>
			<td><input name="username" id="username" type="text" size="25" placeholder="root" /></td>
			<td>Your database username.</td>
		</tr>
		<tr>
			<th scope="row"><label for="password">Database Password</label></th>
			<td><input name="password" id="password" type="text" size="25" placeholder="password" autocomplete="off" /></td>
			<td>Your database password.</td>
		</tr>
		<tr>
			<th scope="row"><label for="hostname">Database Host</label></th>
			<td><input name="hostname" id="hostname" type="text" size="25" placeholder="localhost" /></td>
			<td>
			You should be able to get this info from your web host, if <code>localhost</code> doesn&#8217;t work.			</td>
		</tr>
	
	</table>
			<input type="hidden" name="language" value="" />
	<p class="step"><input name="submit" type="submit" value="Submit" class="button button-large" /></p>
</form>


 <?php  }?>

	</body>
</html>
