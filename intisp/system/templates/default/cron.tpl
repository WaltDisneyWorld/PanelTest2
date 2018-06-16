<?php session_start(); require 'include/head.php'; 
$loggedin = $_SESSION['user'];
if (isset($_GET["yes"]))
{
	$time = $_POST["time"];
	$command = $_POST["command"];
  $conn = mysqli_connect("$host", "$user", "$pass", "$data");

        $sql = "INSERT INTO cron (id, user, time, value)
VALUES ('".rand(10000, 99999)."', '".$loggedin."', '".$time."','".$command."')";
$conn->query($sql);
echo "Cron Job has been Created";
	}
?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Cron Jobs</h2>
  
                                                <form method="POST" action="?page=cron&yes">

    <div class="form-group">
  <label for="sel1">Time</label>
  <select class="form-control" name="time" id="sel1">
    <option value="1">1. Every 5 Min</option>
    <option value="2">2. Every Hour</option>
    <option value="3">3. Every Day</option>
    <option value="4">4. Every Month</option>
	<option value="5">5. Every Year</option>
  </select>
</div>
  <fieldset class="form-group">
    <label for="formGroupExampleInput">PHP File</label>
    <input type="text" class="form-control" name="command" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add Cron Job</button>
</form>
                                    <table class="table">
    <thead>
      <tr>
        <th>Time</th>
        <th>Command</th>
      </tr>
    </thead>
    <tbody>
    
	  <?php

            $con    = mysqli_connect($host, $user, $pass, $data);
            $sql    = 'SELECT * FROM cron WHERE user = "' . $loggedin . '"';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
				
                echo ' <tr>
        <td>'.$row[2].'</td>
        <td>'.$row[3].'</td>
      </tr>';
            }
            mysqli_free_result($result);
            mysqli_close($con);

    ?>
	
	</tbody></table>

<?php require 'include/footer.php'; ?>