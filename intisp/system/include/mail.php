<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

function sendemailuser($subject,$message) {
    include 'config.php';
    
$conn = new mysqli($host, $user, $pass, $data);

// check connection
if ($conn->connect_error) {
    trigger_error('Database connection failed: '.$conn->connect_error, E_USER_ERROR);
}
    $sql = "INSERT INTO mail (id, subject, message) VALUES ('" . rand(1,10000) . "','" . $subject . "','" . $message . "')";
$conn->query($sql);
$to       = file_get_contents("data/mail");
$subject  = 'Webister: ' . $subject;
$from     = 'noreply@awebistersystem.adaclare.com';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers)) {
    return TRUE;
}  
    //die("Cannot Send Email Out Please try again Later.");

}
