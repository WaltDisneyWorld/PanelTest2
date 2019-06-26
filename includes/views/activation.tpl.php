<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
onlyadmin();
?>
  <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">IntISP Activation</h2>
                        <p>Connection to IntISP Activation Servers
                        
                        
                        <?php
                        if (!$failsafe_offline) {
                            ?>
                        <i class="fa fa-check"></i>
                        <?php
                        } else {
                            ?>
                       
                        [ERROR]<?php
                        }?>
</p>
   <p>Connection to IntISP Update Servers
                        
                        
                        <?php
                        if (!$failsafe_offline) {
                            ?>
                        <i class="fa fa-check"></i>
                        <?php
                        } else {
                            ?>
                       
                        [ERROR]<?php
                        }?>
</p>
<center><h1><?php
include 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection
    $sql = "SELECT value FROM settings WHERE code =  'register' LIMIT 0 , 30";
if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        printf($row[0]);
    }
    // Free result set
    mysqli_free_result($result);
}
mysqli_close($con);
?></h1><p>The license is currently activated under a <?php echo $edition; ?> of IntISP <?php echo $intisp_ver; ?>.</p></center>
<?php
if (isset($_GET['debug'])) {
    ?>
<h1>Debug</h1>
<textarea style="margin: 0px; height: 345px; width: 744px;" disabled>
Running Activation Server Debugger...
<?php
function is_connected($addr)
    {
        if (!$socket = @fsockopen($addr, 80, $num, $error, 5)) {
            return false;
        } else {
            return true;
        }
    }
    if (is_connected('example.com')) {
        echo "Detected a valid internet connection [OK]\n";
    } else {
        echo "COULD NOT CONNECT TO THE INTERNET [FAIL]\n";
    }
    $ip = gethostbyname('www.enyrx.com');
    echo "Detected Enyrx is pointing to $ip\n";
    if (is_connected('enyrx.com')) {
        echo "Stable connection to Enyrx Servers [OK]\n";
    } else {
        echo "COULD NOT CONNECT TO ENYRX [FAIL]\n";
    }
    echo 'The Debug process has completed.'; ?>
</textarea>
<br><?php
}
?>
<a href="" class="btn btn-danger">Update License Key</a>
<a href="?page=activation&debug" class="btn btn-danger">Run Activation Server Debugger</a>
<a href="https://www.enyrx.com/httpupdate/speedtest/" class="btn btn-danger">Determine Activation Server Network Speed Test</a>
<a href="?page=cp&rec" class="btn btn-danger">Reset Activation Server Check</a>
<br><center>
<img src="public/assets/img/a.png"><br>
<img src="public/assets/img/logo.png"></center>

                </div>
                </div>
                </div>
<?php require 'includes/classes/footer.class.php'; ?>