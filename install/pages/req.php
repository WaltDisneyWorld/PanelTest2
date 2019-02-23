<?php
if (!defined('HOMEBASE')) {
    die("Direct Access is Not Allowed");
}
?>
<h1 class="title">IntISP Requirements</h1>
<p>Before installing IntISP we need to make sure that your system meets our basic requirements. This is very important because it prevents a lot of bugs from happening.</p>
<table class="table">
  <thead>
    <tr>
     <th>Requirement</th>
     <th>Your Server</th>
      <th>Status</th>
         </tr>
  </thead>
  <tfoot>
      <tr>
         <th>Requirement</th>
     <th>Your Server</th>
      <th>Status</th>
         </tr>
       </tfoot>
  <tbody>
      <?php
      $failedreq=0;
      function displayReq($title, $server, $ok)
      {
          global $failedreq; ?>
            <tr>
      <td><?php echo $title; ?></td>
      <td><?php echo $server; ?></td>
      <td><?php if ($ok) {
              echo "PASS!";
          } else {
              echo "<b>FAIL!</b>";
              $failedreq = 1;
          } ?></td>
      </tr>
          <?php
      }
      if (is_writable("../config.php")) {
          displayReq("Writable Configuration File", "config.php can be written.", true);
      } else {
          displayReq("Writable Configuration File", "config.php cannot be written. Please try creating a config.php file", false);
      }
if (is_writable("../cache")) {
    displayReq("Writable Cache Directory", "The cache folder can be written to.", true);
} else {
    displayReq("Writable Cache Directory", "The cache folder cannot be written to. Please verify the permissions and make sure the directory cache exists.", false);
}

        if (file_exists("../vendor")) {
            displayReq("Composer Installation", "Composer has been installed and setup.", true);
        } else {
            displayReq("Composer Installation", "Composer has not been installed. Please make sure you extract the vendor.zip or run composer install", false);
        }
    preg_match("#^\d+(\.\d+)*#", PHP_VERSION, $match);
if (version_compare($match[0], '7.0.0', '>=')) {
    displayReq("PHP VERSION", "Your php version " . $match[0] . " matched the requirement.", true);
} else {
    displayReq("PHP VERSION", "Your php version " .$match[0] . " does not match the requirement. Please update", false);
}
if (function_exists('mysqli_connect')) {
    displayReq("MySQLi", "Your php version has MySQLi.", true);
} else {
    displayReq("MySQLi", "Your php version does not have MySQLi.", false);
}
if (function_exists('mail')) {
    displayReq("PHP Mail", "PHP Mail is installed.", true);
} else {
    displayReq("MySQLi", "PHP Mail may not be working right now.", false);
}
if (function_exists('curl_version')) {
    displayReq("PHP CURL", "PHP CURL is installed.", true);
} else {
    displayReq("PHP CURL", "PHP CURL is not installed. Please install it before continuing.", false);
}
      ?>
      
     
      
    
      
</tbody>
</table>
<?php if ($failedreq) {
          ?>
    <div class="notification is-danger">
 The requirements did not pass. Please make sure that you meet all the requirements.
</div>
<?php
      } ?>
<br><br>
<div class="buttons has-addons">
    <a href="index.php" class="button">Back</a>
    <?php if (!$failedreq) {
          ?>
 <a href="?pg=license" class="button">Continue</a>
 <?php
      } ?>
</div>