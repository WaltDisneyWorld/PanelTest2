<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
$permissions->onlyadmin();
?>
  <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">IntISP Post Installation Setup Wizard</h2>
                       
                </div>
                </div>
                </div>
<?php require 'includes/classes/footer.class.php'; ?>