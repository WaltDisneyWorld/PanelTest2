<?php
if (!defined('HOMEBASE')) {
    die('Direct Access is Not Allowed');
}

if (!defined('DOC_ROOT')) {
    define('DOC_ROOT', dirname(dirname(__DIR__)));
}
if (isset($_GET["config"])) {
    touch("../config.php");
    if (!file_exists("../config.php")) {
        ?>
       <div class="notification is-danger">
        Failed To Touch, Please manually create the file.
        </div>
        <?php
    }
}
?>
<h1 class="title">IntISP Requirements</h1>
<p>Before we can install IntISP on your server, we need to make sure that the system meets the basic requirements. These requirements are put in place because it can help stop many bugs from occuring in your installation.</p>
<table class="table">
  <thead>
    <tr>
     <th>Requirement</th>
     <th>What we have detected</th>
      <th>Status</th>
         </tr>
  </thead>
  <tfoot>
      <tr>
         <th>Requirement</th>
     <th>What we have detected</th>
      <th>Status</th>
         </tr>
       </tfoot>
  <tbody>
      <?php
      $failedreq = 0;
      /**
       * @param
       * @param
       * @param
       */
      function displayReq($title, $server, $ok)
      {
          global $failedreq; ?>
            <tr>
      <td><?php echo $title; ?></td>
      <td><?php echo $server; ?></td>
      <td><?php if ($ok) {
              echo '<span class="icon has-text-success">
  <i class="fas fa-check-square"></i>
</span> ';
          } else {
              echo '<span class="icon has-text-warning">
  <i class="fas fa-exclamation-triangle"></i>
</span> ';
              $failedreq = 1;
          } ?></td>
      </tr>
          <?php
      }

        if (is_writable(DOC_ROOT.DIRECTORY_SEPARATOR.'config.php')) {
            displayReq('Writable Configuration', 'config.php exists and can be written to.', true);
        } else {
            displayReq('Writable Configuration', DOC_ROOT.DIRECTORY_SEPARATOR.'config.php does not exist. Please create a config.php file and check permissions. <a href="?pg=req&config">Touch Config File</a>', false);
        }

        if (is_writable(DOC_ROOT.DIRECTORY_SEPARATOR.'cache')) {
            displayReq('Writable Cache Directory', DOC_ROOT.DIRECTORY_SEPARATOR.'cache folder exists and can be written to.', true);
        } else {
            displayReq('Writable Cache Directory', 'The cache folder cannot be written to. Please verify the permissions and make sure the directory cache exists.', false);
        }

        if (file_exists(DOC_ROOT.DIRECTORY_SEPARATOR.'vendor')) {
            displayReq('Composer Installation', 'Composer has been installed and setup.', true);
        } else {
            displayReq('Composer Installation', "Composer has not been installed. Please make sure you extract the vendor.zip or run composer install. <a href='installVendor'>Try running automated Install</a>", false);
        }
    preg_match("#^\d+(\.\d+)*#", PHP_VERSION, $match);
    
if (version_compare($match[0], '7.0.0', '>=')) {
    displayReq('PHP VERSION', 'Your php version '.$match[0].' matched the requirement.', true);
} else {
    displayReq('PHP VERSION', 'Your php version '.$match[0].' does not match the requirement. Please update', false);
}
if (function_exists('mysqli_connect')) {
    displayReq('MySQLi', 'Your php version has MySQLi.', true);
} else {
    displayReq('MySQLi', 'Your php version does not have MySQLi.', false);
}
if (function_exists('mail')) {
    displayReq('PHP Mail', 'PHP Mail is installed.', true);
} else {
    displayReq('MySQLi', 'PHP Mail may not be working right now.', false);
}
if (function_exists('curl_version')) {
    displayReq('PHP CURL', 'PHP CURL is installed.', true);
} else {
    displayReq('PHP CURL', 'PHP CURL is not installed. Please install it before continuing.', false);
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
    <a href="index.php" class="button">Cancel</a>
    <?php if (!$failedreq) {
          ?>
 <a href="?pg=license" class="button">Next</a>
 <?php
      } ?>
</div>