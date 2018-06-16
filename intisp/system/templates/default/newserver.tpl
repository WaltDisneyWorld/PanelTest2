<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

function newserv($port, $disk, $username, $password)
{
    mkdir('/var/webister/'.$port);
    include 'config.php';
    $conn = mysqli_connect("$host", "$user", "$pass", 'webister');

    $sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($password . $salt)."','0','".$disk."','".$port."')";

    if ($conn->query($sql) === TRUE) {
    } else {
        die('error');
    }

    $conn->close();
    shell_exec('sudo service webister restart');
}
