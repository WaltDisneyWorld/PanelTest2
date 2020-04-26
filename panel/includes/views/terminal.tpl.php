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

                        <h2 class="page-title"><?php echo $lang_24; ?></h2>
<iframe src="?webconsole" width="800px" height="500px" frameBorder="0"></iframe>  </div>
  </div>
  </div>
<?php
require 'includes/classes/footer.class.php';
?>