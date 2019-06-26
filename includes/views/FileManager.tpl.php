<?php if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php'; ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                     
                    <h2 class="page-title">File Manager</h2>
                        
                        <iframe src="thirdparty/mftp/index.php" style="width:1000px;border:0;" scrolling="no" onload="resizeIframe(this)"></iframe>
   <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script> </div>
  </div>
  </div>


<?php
require 'includes/classes/footer.class.php'; ?>
