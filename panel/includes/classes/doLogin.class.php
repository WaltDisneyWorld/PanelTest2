<?php
if (!defined("HOMEBASE")) {
    die();
}

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require 'vendor/autoload.php';

if (isset($_GET['oauth'])) {
    if ('github' == $_GET['oauth']) {
        require 'includes/oauth/github.php';
    }
    if ('google' == $_GET['oauth']) {
        require 'includes/oauth/google.php';
    }
    if ('facebook' == $_GET['oauth']) {
        require 'includes/oauth/facebook.php';
    }
    if ('twitter' == $_GET['oauth']) {
        require 'includes/oauth/twitter.php';
    }

    $usez = auth();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    $sql = "select * from oauth where link='$usez'";
    $run_user = mysqli_query($con, $sql);
    $check_user = mysqli_num_rows($run_user);
    if ($check_user > 0) {
        // The user has been found
        $mysqli = new mysqli();
        $con = mysqli_connect("$host", "$user", "$pass", "$data");
        // Check connection
        $sql = "SELECT name FROM oauth WHERE link =  '$usez' LIMIT 0 , 30";
        if ($result = mysqli_query($con, $sql)) {
            // Fetch one and one row
            while ($row = mysqli_fetch_row($result)) {
                $theuser = $row[0];
            }
            // Free result set
            mysqli_free_result($result);
        }
        mysqli_close($con);
        $_SESSION['user'] = $theuser;
        header('Location: '.$webroot.'/cp');
        die();
    } else {
        header("Location: ' . $webroot . '/?errorx");
    }
    die();
}







$con = mysqli_connect("$host", "$user", "$pass", "$data");
if (!isset($_POST['user'])) {
    $email = mysqli_real_escape_string($con, '');
} else {
    $email = mysqli_real_escape_string($con, $_POST['user']);
}

$sql = "select * from users where username='$email'";
$run_user = mysqli_query($con, $sql);
$check_user = mysqli_num_rows($run_user);

if ($check_user > 0) {
    $sql = "SELECT password FROM users where username='$email'";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $key = Key::loadFromAsciiSafeString($salt);
            $pass = Crypto::decrypt($row[0], $key);

            if ($pass == $_POST['pass']) {
                $_SESSION['user'] = $_POST['user'];
                if ('admin' == $_POST['pass']) {
                    header('Location: '.$webroot.'/temppass');
                    die();
                }
                header('Location: '.$webroot.'/cp');
                die();
            } else {
             

                // Create connection
                $conn = new mysqli('localhost', 'root', "$pass", "$data");

                $t = time();
                $sql = "INSERT INTO failedlogin(id, ip, time)
VALUES ('".rand(1, 99999)."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d', $t)."')";
                $conn->query($sql);
                $conn->close();
                
                if ('admin' == $_POST['user']) {
                    require 'includes/classes/mail.class.php';
                    sendemailuser('Failed login attempt for admin', '
    <b>The administrator account has had a failed login attempt<b><br>
    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was
    '.date('Y-m-d', $t).".
    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>
    
    ");
                }
                header('Location: '.$webroot.'/?error');
                die();
            }
        }
        // Free result set
    }
}
   

    // Create connection
    $conn = new mysqli('localhost', 'root', "$pass", "$data");

    $t = time();
    $sql = "INSERT INTO failedlogin(id, ip, time)
VALUES ('".rand(1, 99999)."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d', $t)."')";
    $conn->query($sql);
    $conn->close();

if ('admin' == $_POST['user']) {
    require 'includes/classes/mail.class.php';
    sendemailuser('Failed login attempt for admin', '
    <b>The administrator account has had a failed login attempt<b><br>
    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was
    '.date('Y-m-d', $t).".
    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>
    
    ");
}

  header('Location: '.$webroot.'/?error');
    die();
