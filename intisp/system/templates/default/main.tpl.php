<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <title>Webister</title>    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="public/assets/css/login.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
   
  
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1">
			<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection

    $sql = "SELECT value FROM settings WHERE code =  'title' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

    mysqli_close($con);

?>
  
					</span>
				</div>
    <?php
        if (isset($_GET["error"])) {
              echo "<div class='alert alert-danger'>Wrong Username or Password!</div>";
        }
    ?>
				<form class="login100-form validate-form"  action="index.php?page=val" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="user" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
<br>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn" style="padding-top:40px">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					</form>
	
<form  class="login100-form validate-form" style="padding-top:0px;" method="GET" action="">
				<?php
    if (isset($_SESSION["reseller"])) {
        	?>
	<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required" style="width:75%">
						<span class="label-input100">Server</span>
						<input class="input100" type="text" name="reseller" style="width:75%" placeholder="Enter Server Name" value="<?php echo $_SESSION["reseller"]; ?>" disabled>
						<span class="focus-input100"></span>
						<input type="hidden" name="page" value="logout">
				</div>
				<input type="submit" value="X" class="btn btn-danger" style="width:25%">
	<?php
    } else {
	?>
	<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required" style="width:75%">
						<span class="label-input100">Server</span>
						<input class="input100" type="text" name="reseller" style="width:75%" placeholder="Enter Server Name">
						<span class="focus-input100"></span>
				</div>
				<input type="submit" value="Switch" class="btn btn-primary" style="width:25%">
	<?php
	}
    ?>	

			</form>		
					
				
				
				
			</div>
		</div>
	</div>
	Powered by IntISP. Created By Adaclare Technologies
</body>
</html>