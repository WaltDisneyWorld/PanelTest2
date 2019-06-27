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

                        <h2 class="page-title"><?php echo $lang_54; ?></h2>

<?php if(isset($_GET["dc"])) {
  if ($_GET["dc"] == $_SESSION["user"]) die();
  if ($_GET["dc"] == "admin") die();
  require_once 'includes/classes/communication.class.php';
  deprovision($_GET["dc"]);

require_once("config.php");
  $con = mysqli_connect($host, $user, $pass, $data);
  $sql = 'delete from users where id = '.$_GET['dc'];
  $result = mysqli_query($con, $sql);

  echo "<div class='alert alert-warning'>User has been deleted!</div>";
}
?>

<?php if(isset($_GET["d"])) { ?>

<div class="alert alert-warning"><b>All userdata will be lost</b><br>
<p>Please confirm that this is actually what you want to do.</p>
<a href="list">No</a><br>
<?php
$s = array('<a href="list">No</a>','<a href="list">No</a>','<a href="list">No</a>','<a href="list">No</a>','<a href="list">No</a>','<a href="list?dc=' . $_GET["d"] . '">Yes</a>');
shuffle($s);
foreach ($s as $n) {
  echo $n . "<Br>";
}
?>
<a href="list">No</a>
</div>
<?php } ?>



                        <table class="table">
    <thead>
      <tr>
        <th><?php echo $lang_55; ?></th>
        <th><?php echo $lang_56; ?></th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
            <?php

            $con = mysqli_connect($host, $user, $pass, $data);
            $sql = 'SELECT * FROM users';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
if ($row[1] == $_SESSION["user"]) {
  echo ' <tr>
  <td>'.$row[1].'</td>
  <td>'.$row[5].'</td>
  <td></td>
</tr>';
} else {
  echo ' <tr>
  <td>'.$row[1].'</td>
  <td>'.$row[5].'</td>
  <td><a href="list?d=' . $row[0] . '"><i class="fa fa-times-circle-o fa-5x" aria-hidden="true"></i></a></td>
</tr>';
}


           
            }
            mysqli_free_result($result);
            mysqli_close($con);

    ?>
     
   
    </tbody>
  </table>
  </div>
  </div>
  </div>
  
<?php require 'includes/classes/footer.class.php'; ?>