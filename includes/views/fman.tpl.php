<?php 
if (!isset($HOME)) die();
require 'includes/classes/head.class.php';
onlyadmin();
?>


                        <h2 class="page-title">Root File Manager</h2>
                        
                        <iframe src="thirdparty/terminal/Fileman.php" style="width:100%;" onload="resizeIframe(this)"></iframe>
   <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
     