<?php 
session_start();
require 'include/head.php';
if (isset($_POST["domain"])) {
    if (file_exists("data/u/names/" . $_POST["domain"])) {
        echo "<div class='alert alert-danger'>Domain is taken</div>";
    } else {
        if (file_exists("data/u/users/" . $_SESSION['user'])) {
            echo "<div class='alert alert-danger'>You already have a domain</div>";
        } else {
        
            $con = mysqli_connect($host, $user, $pass, $data);
            $sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($result)) {
                $port = $row[5];
            }
            mysqli_free_result($result);
            mysqli_close($con);
    
            file_put_contents("data/u/names/" . $_POST["domain"], $port);
            file_put_contents("data/u/users/" . $_SESSION['user'], $_POST["domain"]);
            echo "<div class='alert alert-warning'>You now own " . $_POST["domain"] . "</div>";
        }
    }
}
?>

<h1>Welcome to Webister U</h1>
<p>Since your web hosting organization has choose webister. You may not like the port numbers. This tool will allow you to change your url from (Ex: example.com:8432/) to (example.com/u.php&i=watever). Once you reserved one, it will remain permanent.</p>
<p>Your host may decide to place ads on your site though.</p>
<div class="container">
    <div class="row">
        <div class="span12">
            <form id="custom-search-form" method="POST" action="#" class="form-search form-horizontal pull-right">
                <div class="input-append span12">
                    <input type="text" name="domain" class="search-query" placeholder="">
                    <button type="submit" class="btn">Claim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require 'include/footer.php';
?>