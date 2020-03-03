<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
onlyadmin();
?>


        <iframe  frameborder="0" src="thirdparty/manage7" scrolling="no" style="width:100%;overflow:hidden;" onload="resizeIframe(this)"></iframe>
   <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>