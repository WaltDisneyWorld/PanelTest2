<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
onlyadmin();
if (isset($_GET['a'])) {
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'delete from mail where id = '.$_GET['a'];
    $result = mysqli_query($con, $sql);
}

?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title"><?php echo $lang_25; ?></h2>
                        <table class="table">
    <thead>
      <tr>
     <?php echo $lang_57; ?>
      </tr>
    </thead>
    <tbody>
            <?php

            $con = mysqli_connect($host, $user, $pass, $data);
            $sql = 'SELECT * FROM mail';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
                echo ' <tr>
        <td>'.$row[1].'</td>
        <td>'.$row[2].'</td>
        <td><a href="?page=mail&a='.$row[0].'">Delete
</a></td>
      </tr>';
            }
            mysqli_free_result($result);
            mysqli_close($con);

    ?>
     
   
    </tbody>
  </table>
  </div>
  </div>
  </div>
  
<?php
require 'includes/classes/footer.class.php';
?>