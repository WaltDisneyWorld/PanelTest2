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

                     
                    <h2 class="page-title">File Manager</h2>
                        
                        <iframe src="filemanager" style="width:900px;border:0;" scrolling="no" onload="resizeIframe(this)"></iframe>
   <script>
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    if (obj.contentWindow.document.body.scrollHeight < "600") {
        obj.style.height = '600px';
    }
  }
</script> </div>
  </div>
  </div>


<?php
require 'includes/classes/footer.class.php'; ?>