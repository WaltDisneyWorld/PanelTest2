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

                        <h2 class="page-title"><?php echo $lang_15; ?></h2>
                        <p><?php if (isset($_GET['pa'])) {
    echo ''.$_GET['pa'].'';
} ?></p>
              <?php echo $lang_60; ?>  <form method="POST" action="action.php?action=newserv">
  <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_55; ?></label>
    <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="" required="required">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_59; ?></label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_56; ?></label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_58; ?></label>
    <input type="text" class="form-control" name="pend" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add User</button>
</form>	
</div></div></div>
<?php
require 'includes/classes/footer.class.php';
?>
