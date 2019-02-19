<?php
     use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
require "vendor/autoload.php";
if (!isset($HOME)) die();

if (isset($_GET['yes'])) {
    function newserv($port, $disk, $username, $password)
    {


        $returnval = '';
    
        $returnval = $returnval.'<br>Creating User '.$username;
        
        include 'config.php';
         $key = Key::loadFromAsciiSafeString($salt);
        $con    = mysqli_connect($host, $user, $pass, $data);
        $sql    = 'SELECT * FROM users';
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_row($result)) {
            if ($username == $row[1]) {
                die("Error Username is not Unique");
            }
            if ($port == $row[5]) {
                die("Port number is not unique");
            }
        }
 
        mysqli_free_result($result);
        mysqli_close($con);
   
        $conn = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".Crypto::encrypt($password, $key) ."','0','".$disk."','".$port."')";

   $con = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".Crypto::encrypt($password, $key) . "','0','".$disk."','".$port."')";
$con->query($sql);
        if ($conn->query($sql) === TRUE) {
        }  
        
        $conn->close();
require_once("includes/classes/communication.class.php");
provserverclient($port, $disk, $username, $password);
      
        $returnval = $returnval.'<br>Done!';
        header('Location: index.php?page=newserv&pa='.urlencode($returnval));
    }
    newserv($_POST['pstart'], $_POST['disk'], $_POST['username'], $_POST['pend']);
    
       require("includes/classes/mail.class.php");
            sendemailuser(
                "New User", "
    <b>A new user has been added to Webister</b>
    <p>There username is " . $_POST['username'] . "</p>
    <p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.</p>
    "
            );
}
require 'includes/classes/head.class.php';
onlyadmin();
?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title"><?php echo $lang_15; ?></h2>
                        <p><?php if (isset($_GET['pa'])) {
                            echo ''.$_GET['pa'].'';
} ?></p>
              <?php echo $lang_60; ?>  <form method="POST" action="?page=newserv&yes">
  <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_55; ?></label>
    <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="" required="required">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_59; ?></label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_56; ?></label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_58; ?></label>
    <input type="text" class="form-control" name="pend" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add User</button>
</form>	
</div></div></div>
<?php
require 'includes/classes/footer.class.php';
?>
