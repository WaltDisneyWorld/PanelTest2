<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */


function sendemailuser($subject, $message)
{
    include 'config.php';
    
    $conn = new mysqli($host, $user, $pass, $data);

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: '.$conn->connect_error, E_USER_ERROR);
    }
    $sql = "INSERT INTO mail (id, subject, message) VALUES ('" . rand(1, 10000) . "','" . $subject . "','" . $message . "')";
    $conn->query($sql);


    $mail = new PHPMailer(true);

    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    $sql = "SELECT value FROM settings WHERE code =  'smtp_host' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $smtp_host = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'smtp_username' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $smtp_username = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'smtp_password' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $smtp_password = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'smtp_port' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $smtp_port = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'smtp_security' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $smtp_security = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    $sql = "SELECT value FROM settings WHERE code =  'mail' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $sendto = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    if ($sendto != "") {
        //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $smtp_host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $smtp_username;                 // SMTP username
    $mail->Password = $smtp_password;                           // SMTP password
      if ($smtp_security == "1") {
          $mail->SMTPSecure = 'ssl';
      }
        if ($smtp_security == "2") {
            $mail->SMTPSecure = 'tls';
        }
        $mail->Port = $smtp_port;                                  // TCP port to connect to

        //Recipients
        $mail->setFrom($smtp_username, 'IntISP AutoResponder');
        $mail->addAddress($sendto, $sendto);     // Add a recipient



        //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
        $cont = file_get_contents("includes/mail.html");
        $cont = str_replace("{INSERT_MESSAGE_HERE}", $message, $cont);
        $mail->Body    = $cont;
        $mail->AltBody = $message;

        $mail->send();
    }
    return true;
    //die("Cannot Send Email Out Please try again Later.");
}
