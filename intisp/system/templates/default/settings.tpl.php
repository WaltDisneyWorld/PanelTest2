<?php session_start(); require 'include/head.php';onlyadmin();onlymasterreseller(); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">settings</h2>
                        
                        <form method="POST" action="index.php?page=title">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" value="<?php
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

?>">
  </fieldset>
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Logo</label>
    <input type="text" class="form-control" name="logos" id="formGroupExampleInput" value="<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'logo' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }
   
?>">
  </fieldset>
  
   <fieldset class="form-group">
    <label for="formGroupExampleInput">Forum URL</label>
    <input type="text" class="form-control" name="forum" id="formGroupExampleInput" value="<?php

    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'forum' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }
  
?>">
  </fieldset>
  
   <fieldset class="form-group">
    <label for="formGroupExampleInput">Support URL</label>
    <input type="text" class="form-control" name="support" id="formGroupExampleInput" value="<?php
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'support' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
  
   <fieldset class="form-group">
    <label for="formGroupExampleInput">Navbar color</label>
    <input type="text" class="form-control" name="navbar" id="formGroupExampleInput" value="<?php
 
    $sql = "SELECT value FROM settings WHERE code =  'color' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
  
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Upgrade Button Link</label>
    <input type="text" class="form-control" name="upgrade" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'upbutton' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
    
    <fieldset class="form-group">
    <label for="formGroupExampleInput">System Email</label>
    <input type="text" class="form-control" name="mail" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'mail' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">cloudflare API Key</label>
    <input type="text" class="form-control" name="cloudflare" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'cloudflare' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">WHMCS URL</label>
    <input type="text" class="form-control" name="whmurl" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'whmurl' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?>">
  </fieldset>
  
  <fieldset class="form-group">
    <label for="sel1">Select theme (select one):</label>
      <select class="form-control" name="theme" id="sel1">
        <option>default</option>
        <option>modern</option>
        <option>dark</option>
      </select>
      </fieldset>
   <label for="formGroupExampleInput">Advertising</label><Br>
   <textarea style="width:500px;height:500px;" name="head"><?php

    $sql = "SELECT value FROM settings WHERE code =  'head' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?></textarea><Br>
  </fieldset>
   </fieldset>
   <label for="formGroupExampleInput">Header for Login</label><Br>
   <textarea style="width:500px;height:500px;" name="loginh"><?php

    $sql = "SELECT value FROM settings WHERE code =  'loginhead' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?></textarea><Br>
  </fieldset>
    </fieldset>
   <label for="formGroupExampleInput">Footer for Login</label><Br>
   <textarea style="width:500px;height:500px;" name="loginf"><?php

    $sql = "SELECT value FROM settings WHERE code =  'loginfoot' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
          // Free result set
          mysqli_free_result($result);
    }

?></textarea><Br>
  </fieldset>
<button type="submit" class="btn btn-primary">Change settings</button>

</form>
                        </div></div>
                        </div>
                       

<?php require 'include/footer.php'; ?>
