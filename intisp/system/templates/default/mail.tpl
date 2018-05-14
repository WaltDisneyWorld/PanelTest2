<?php session_start(); require 'include/head.php';onlyadmin(); 
if (isset($_GET["a"])) {
     $con = mysqli_connect($host, $user, $pass, $data);
            $sql = 'delete from Mail where id = ' . $_GET["a"];
            $result = mysqli_query($con, $sql);
}

?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Messages</h2>
                        <table class="table">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Message</th><th>Delete?</th>
      </tr>
    </thead>
    <tbody>
            <?php

            $con = mysqli_connect($host, $user, $pass, $data);
            $sql = 'SELECT * FROM Mail';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
                echo ' <tr>
        <td>'.$row[1].'</td>
        <td>'.$row[2].'</td>
        <td><a href="?a=' . $row[0] . '"><i class="fa fa-times-circle-o fa-5x" aria-hidden="true"></i>
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
  </div>
<?php
require 'include/footer.php';
?>