<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';

$permissions->onlyadmin();
if (isset($_GET["inactive"])) {
    ?>
  
  <div class="alert alert-danger">
    <b>If this is your first time installing IntISP</b>
    <p>Welcome, in order to use this software, you need a license. You can get a free license by scrolling down and clicking on Generate Community License.
    If you have paid for a premium license, you can scroll down and click on "Enter paid License".</p>
    <b>If this isn't your first time installing IntISP</b>
    <p>Your license may have expired or was installed incorrectly.</p>
  </div>
  
  <?php
}

$protection = new protection;
$protection->Init();
if (isset($_GET["remove"])) {
    unlink("license.lisc");
    echo "<div class='alert alert-danger'>License uninstalled from this server.</div>";
}
if (isset($_GET["paid"])) {
    if (isset($_GET["license"])) {
        $license = $_GET["license"];
        $result = $protection->verifyLicenseKey($license);
        if ($result["status"] == "Active") {
            file_put_contents("license.lisc", $license);
            echo "<div class='alert alert-success'>License Installing. Refreshing...</div>"; ?>
<script>
  // Simulate a mouse click:
window.location.href = "license";

// Simulate an HTTP redirect:
window.location.replace("license");
</script>
<?php
        } else {
            echo "<div class='alert alert-danger'>This key is invalid.</div>";
        }
    } ?>

  <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Enter a Paid License</h2>
                        <form method="GET" action="">
                          <input type="hidden" name="paid">
                          <textarea name="license" style="width:500px;height:500px;"><?php
                          if (isset($_GET["license"])) {
                              echo $_GET["license"];
                          } ?></textarea><Br><br>
                            <input type="submit" class="btn btn-primary" value="Activate">
                        </form><br>
                        <a href="license" class="btn btn-danger">Return</a>
                        
                         </div>
  </div>
  </div>
<?php

require 'includes/classes/footer.class.php';
    die();
}
if (isset($_GET["community"])) {
    $features = array("type"=>"Community License",
                    "reseller_enabled"=>0,
                    "license_limit"=>"Unlimited",
                    "license_security"=>0,
                    "license_updates"=>0);
    $key = $protection->generateLicenseKey($protection->generateMachineCertificate(), 365000, $features);
    file_put_contents("license.lisc", $key["License"]);
    echo "<div class='alert alert-success'>Community Edition Key has been Installed. Refreshing...</div>"; ?>
<script>
  // Simulate a mouse click:
window.location.href = "license";

// Simulate an HTTP redirect:
window.location.replace("license");
</script>
<?php
}
?>
  <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Licensing & Activation</h2>
                        <?php
                      
                        if (!file_exists("license.lisc")) {
                            $ok = false;
                            $license_type = '<div style="color:red;">Unlicensed</div>';
                            $license_valid = '<div style="color:red;">No</div>';
                        } else {
                            $result = $protection->verifyLicenseKey(file_get_contents("license.lisc"));
                            if ($result["status"] == "Active") {
                                $ok = true;
                                $license_valid = '<div style="color:green;">Valid</div>';
                                $license_exp = $result["expires"];
                                $license_serial = $result["Serial"];
                                $extras = $result["extra"];
                                $license_type = $extras["type"];
                                $license_limit = $extras["license_limit"];
                                if ($extras["reseller_enabled"]) {
                                    $license_reseller = "Yes";
                                } else {
                                    $license_reseller = "No";
                                }
                                if ($extras["license_security"]) {
                                    $license_security= "Yes";
                                } else {
                                    $license_security = "No";
                                }
                                if ($extras["license_updates"]) {
                                    $license_updates =  "Yes";
                                } else {
                                    $license_updates= "No";
                                }
                            } else {
                                $ok = false;
                                $license_type = '<div style="color:red;">Unlicensed</div>';
                                $license_valid = '<div style="color:red;">No</div>';
                            }
                        }
                    
                        
                        ?>
     <table class="table">
 
    <tbody>
            <tr>
        <th>License Type</th>
        <th><?php echo $license_type; ?></th>

      </tr>
          <tr>
        <th>Serial Number</th>
        <th><?php echo $license_serial; ?></th>

      </tr>
          <tr>
        <th>Machine Unique ID</th>
        <?php
        if (!$ok) { ?>
        <th><textarea style="width:500px;height:500px;"><?php echo $protection->generateMachineCertificate(); ?></textarea></th>
<?php } else { ?>
<th><?php echo $result["MachineID"]; ?></th>
<?php } ?>
      </tr>
          <tr>
        <th>Expiration</th>
        <th><?php echo $license_exp; ?></th>

      </tr>
        <tr>
        <th>Reseller Enabled</th>
        <th><?php echo $license_reseller; ?></th>

      </tr>
        <tr>
        <th>Account Limit</th>
        <th><?php echo $license_limit; ?></th>

      </tr>
        <tr>
        <th>Security Features</th>
        <th><?php echo $license_security; ?></th>

      </tr>
        <tr>
        <th>Private Update Server</th>
        <th><?php echo $license_updates; ?></th>

      </tr>
        <tr>
        <th>Valid</th>
        <th><?php echo $license_valid; ?></th>

      </tr>
        </tbody>
        </table>
        <?php if (!$ok) { ?>
        <a href="?community" class="btn btn-primary">Generate Community License</a>
        <a href="?paid" class="btn btn-success">Enter Paid License</a>
        <?php } else { ?>
        <a href="?remove" class="btn btn-danger">Remove License</a>
        <?php } ?>
 </div>
  </div>
  </div>
<?php
require 'includes/classes/footer.class.php';
?>