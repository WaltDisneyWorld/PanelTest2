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
                        <table class="table">
    <thead>
      <tr>
        <th><?php echo $lang_55; ?></th>
        <th><?php echo $lang_56; ?></th>
      </tr>
    </thead>
    <tbody>
            <?php

            $con    = mysqli_connect($host, $user, $pass, $data);
            $sql    = 'SELECT * FROM users';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
                echo ' <tr>
        <td>'.$row[1].'</td>
        <td>'.$row[5].'</td>
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
  
<?php require 'includes/classes/footer.class.php'; ?>