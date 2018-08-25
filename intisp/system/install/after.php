<?php
session_start();
if (!isset($_SESSION["stp9"])) die();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activate IntISP</title>
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">IntISP V<?php echo file_get_contents("../data/version"); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse pull-right" id="navbarNav">
    <ul class="navbar-nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link <?php
        if (isset($_SESSION["stp2"])) { echo "disabled"; 
        } else { echo "active"; 
        } ?>" href="#"> Welcome</a>
</li>
    <li class="nav-item">
        <a class="nav-link <?php
        if (isset($_SESSION["stp2"])) { echo "disabled"; 
        } else { echo "active"; 
        } ?>" href="#"> Database</a>
</li>
    <li class="nav-item">
        <a class="nav-link <?php
        if (!isset($_SESSION["stp3"])) { echo "disabled"; 
        } else { echo "active"; 
        } ?>" href="#"> Installation</a>
</li>
    <li class="nav-item">
        <a class="nav-link <?php
        if (!isset($_SESSION["stp9"])) { echo "disabled"; 
        } else { echo "active"; 
        } ?>" href="#"> Activation</a>
</li>
    </ul>
  </div>
</nav>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Activate IntISP <?php echo file_get_contents("../data/version"); ?>
      </h1>
      <p class="subtitle">
        IntISP is free software, to activate your copy you will need to grab an open source license. Visit <a href="https://host.adaclare.com/cart.php?a=add&pid=33">here</a>.
      </p>

  <article class="message is-info">
  <div class="message-body">
Please make sure that you accept our terms and conditions found on our <a href="https://www.adaclare.com">site</a>.
  </div>
  
</article>
<?php
if (isset($_GET["e"])) {
  ?>
  Cannot Activate IntISP.<br> <?php echo $_GET["e"]; ?>.
  <Br><Br><Br>
  <?php
}
?>
   <form method="POST" action="authorize.php">
     Serial Number: <input type="text" name="key" placeholder="IntISP-XXXXXXXXXX"><br>
     <input type="submit" value="Activate">
   </form>
  </div>

  </section>
  
   
  </body>
</html>
