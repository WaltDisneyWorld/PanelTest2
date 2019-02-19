<!--
/*
*  PHP+JQuery Temrinal Emulator by Fluidbyte <http://www.fluidbyte.net>
*
*  This software is released as-is with no warranty and is complete free
*  for use, modification and redistribution
*/
-->
<?php
session_start();
function onlymasterreseller() {
  return true;
}
function onlyadmin() {
     if ($_SESSION['user'] == 'admin') {
         
     } else {
         die();
     }
}
onlyadmin();
onlymasterreseller();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Terminal</title>
    <link rel="stylesheet" href="css/screen.css">
</head>

<body>

    
    <div id="terminal">
    IntISP Remote Terminal V1.0.0<br>
    Copyright &copy; Enyrx Technologies All Rights Reserved<br>
    ** Not Real Time **<br>
        <div id="output"></div>
    
        <div id="command">
            <div id="prompt">$</div>
            <input type="text" autocapitalize="off">
        </div>
    
    </div>

    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/system.js"></script>

</body>
</html>
