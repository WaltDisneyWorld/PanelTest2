<?php
     use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require 'vendor/autoload.php';
if (isset($_POST['username'])) {
    function newserv($port, $disk, $username, $password)
    {
        $returnval = '';

        $returnval = $returnval.'<br>Creating User '.$username;

        require 'config.php';
        $key = Key::loadFromAsciiSafeString($salt);
        $con = mysqli_connect($host, $user, $pass, $data);
        $sql = 'SELECT * FROM users';
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_row($result)) {
            if ($username == $row[1]) {
                die('Error Username is not Unique');
            }
            if ($port == $row[5]) {
                // die('Port number is not unique');
                // Ports are now depricated.
            }
        }

        mysqli_free_result($result);
        mysqli_close($con);

        $conn = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".Crypto::encrypt($password, $key)."','0','".$disk."','".$port."')";

        $con = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".Crypto::encrypt($password, $key)."','0','".$disk."','".$port."')";
        $con->query($sql);
        if (true === $conn->query($sql)) {
        }

        $conn->close();
        require_once 'includes/classes/communication.class.php';
        $communications = new communications;
        $communications->provserverclient($port, $disk, $username, $password);

        $returnval = $returnval.'<br>Done!';
        return urlencode($returnval);
    }

    require 'includes/classes/mail.class.php';
    sendemailuser(
        'New User',
        '
    <b>A new user has been added to Webister</b>
    <p>There username is '.$_POST['username'].'</p>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.</p>
    '
    );
    header('Location: '.$webroot.'/newserv?pa='.newserv($_POST['pstart'], $_POST['disk'], $_POST['username'], $_POST['pend']));
}
