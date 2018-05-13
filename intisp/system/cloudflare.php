<?php session_start(); require 'include/head.php'; 
require "include/cloudflare.php";
require "include/mail.php";
if (isset($_POST["email"])) {
    $uniqueid = rand(1, 10000);
    $usernameit = $uniqueid . $_SESSION['user'];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cf = new cloudflare_api(file_get_contents("data/cloudflare"));
    $response = $cf->user_create($email, $password, $usernameit, $uniqueid);
    sendemailuser("New Cloudflare", "A new cloudflare account has been created!!<br>Username: " . $usernameit . "<br>Password:" . $password . "<br>Email: " . $email . "<br>Unique Id: " . $uniqueid . "<br><p>Thank You for using the Cloudflare API</p>");
    $mysqli = new mysqli();
        $conn = mysqli_connect("$host", "$user", "$pass", "$data"); 
         $sql = "INSERT INTO Cloudflare (id, username, email, password)
VALUES ('" .$uniqueid ."','" .$_SESSION['user'] . "','" .$email ."','" . $password."')";
       $conn->query($sql);
       echo "The server responded back<br><br>" . $response . "<br><br>";
}
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Cloudflare Integration</h2>
                    <p>This will allow you to configure your cloudflare DNS settings. However before you do this, you will need to use a free dns Redirection service.</p>
                    <p>This will allow you to use your own domain with Webister. This will also speed up your website.</p>
                    <p>Crontabs may be needed for this to work correctly!</p>
                    <b>This is still very EXPERIMENTAL and may not work correctly.</b>
                    <p>If you already have an account login <a href="https://www.cloudflare.com/a/login">Here</a></p>

                    <form method="POST" action="#">
                        <fieldset class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" class="form-control" name="email" id="formGroupExampleInput" value="<?php echo file_get_contents('data/cloudflare'); ?>" required="required">
                        </fieldset>   
                        <fieldset class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="password" class="form-control" name="password" id="formGroupExampleInput" value="<?php echo file_get_contents('data/cloudflare'); ?>" required="required">
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Submit</button>     
                    </form>
                </div>
            </div>
        </div>
  </div>
<?php
require 'include/footer.php';
?>
