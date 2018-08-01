<?php
session_start();
$_SESSION["stp2"] = true;
require("inc/top.php");
?>
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
        if (!isset($_SESSION["stp2"])) { echo "disabled"; 
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
        if (!isset($_SESSION["stp4"])) { echo "disabled"; 
        } else { echo "active"; 
        } ?>" href="#"> Activation</a>
</li>
    </ul>
  </div>
</nav>
<div class="container">
    <?php if (isset($_GET["err"])) {
      ?>
      <div class="alert alert-danger">Cannot connect to the MySQL Details provided. Is MySQL running?</div>
      <?php
    }
    ?>
       <h1>Database Details</h1>
       <p>Please enter the database details below, some fields are already filled in, you may need to create the Database named webister which can be found on our documentation.</p>
       <form method="POST" action="writeConfig.php">
            <div class="form-group">
    <label for="exampleInputtext1">Database Hostname</label>
    <input name="db_host" type="text" class="form-control" value="localhost" disabled required>
 
  </div>
  <div class="form-group">
    <label for="exampleInputtext1">Database Name</label>
    <input name="db_name" type="text" class="form-control" value="webister" disabled required>

  </div>
 <div class="form-group">
    <label for="exampleInputtext1">Database Username</label>
    <input name="db_user" type="text" class="form-control" value="root" disabled required>

  </div>
 <div class="form-group">
    <label for="exampleInputtext1">Database Password</label>
    <input name="db_pass" type="password" class="form-control">
  
  </div>
  <a href="index.php" class="btn btn-primary">Back</a>
  <button type="submit" class="btn btn-primary">Next</button>
</form>
     </div>
<?php
require("inc/bottom.php");
?>