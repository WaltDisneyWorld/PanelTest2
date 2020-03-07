<?php
if (!isset($HOME)) {
    die();
}
require 'includes/classes/head.class.php';
?>

        <?php if ('admin' == $_SESSION['user']) {
    ?>
<style>
  .btn {
    border-style: none;
  }
  
</style>
 
<div>
     <script>
$(document).ready(function(){
  $("#baashow").hide();
    $("#baahide").click(function(){
        $(".aasvr").hide();
        $("#baahide").hide();
        $("#baashow").show();
    });
    $("#baashow").click(function(){
        $(".aasvr").show();
        $("#baahide").show();
        $("#baashow").hide();
    });
});
</script>
<ul class="list-group">
  <li class="list-group-item notification is-dark"><a id="baahide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="baashow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_42; ?></li>
  <li class="list-group-item">  
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count = 0;
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $count = $count + 1;
    }
    mysqli_free_result($result);
    mysqli_close($con);
    echo $count; ?></h1><hr> <?php echo $lang_18; ?></a>
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count = 0;
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'SELECT * FROM failedlogin';
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $count = $count + 1;
    }
    mysqli_free_result($result);
    mysqli_close($con);
    echo $count; ?></h1><hr> <?php echo $lang_40; ?></a>
                                                                                <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                                                                $count = 0;
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'SELECT * FROM domains';
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $count = $count + 1;
    }
    mysqli_free_result($result);
    mysqli_close($con);
    echo $count; ?></h1><hr> Domains</a>
                                                                                                                        <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;">
                                                                                                                            <?php
                                                                                                                            $count = 0;
    $scan = scandir('plugins');
    foreach ($scan as $file) {
        $count = $count + 1;
    }
    $count = $count - 2;
    echo $count; ?>
                                                                                                                          
                                                                                                                        </h1><hr> <?php echo $lang_23; ?></a>
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                          echo $intisp_ver; ?></h1><hr> <?php echo $lang_41; ?></a>
                                        
                                        
  
                                     </li>
  </ul> 
  
 <?php
 $whmurl = '';
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'whmurl' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $whmurl = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
    if ('' != $whmurl) {
        ?>
  <script>
$(document).ready(function(){
  $("#sxxhow").hide();
    $("#hxxide").click(function(){
        $(".sxrv").hide();
        $("#hxxide").hide();
        $("#sxxhow").show();
    });
    $("#sxxhow").click(function(){
        $(".sxrv").show();
        $("#hxxide").show();
        $("#sxxhow").hide();
    });
});
</script>
  <ul class="list-group" data-step="5" data-intro="This is where users manage there servers.">
  <li class="list-group-item notification is-dark"><a id="hxxide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="sxxhow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_9; ?></li>
  <li class="list-group-item">  

                                        <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php" class="sxrv btn btn-default"><i class="fa fa-5x fa-newspaper-o"></i><hr> <?php echo $lang_10; ?></a>
    <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php" class="sxrv btn btn-default"><i class="fa fa-5x fa-credit-card"></i><hr> <?php echo $lang_11; ?></a>
        <a  type="button" href="<?php echo $whmurl; ?>/index.php?rp=/knowledgebase" class="sxrv btn btn-default"><i class="fa fa-5x fa-question-circle"></i><hr> <?php echo $lang_12; ?></a>
             <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php?action=emails" class="sxrv btn btn-default"><i class="fa fa-5x fa-envelope-o"></i><hr> <?php echo $lang_13; ?></a>
                       
                                                         </li>
  </ul>  
  <?php
    } ?>
  
<?php
if (ismasterreseller()) {
        ?>
    <script>
$(document).ready(function(){
  $("#cshow").hide();
    $("#chide").click(function(){
      $(".csys").hide();
      $("#chide").hide();
      $("#cshow").show();
    });
    $("#cshow").click(function(){
      $(".csys").show();
      $("#chide").show();
      $("#cshow").hide();
    });
});
</script>
  <ul id="myUL" class="list-group" data-step="2" data-intro="Here you can control the power options of webister and the computer it's running on.">
  <li class="list-group-item notification is-dark"><a id="chide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="cshow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_43; ?></li>
  <li class="list-group-item">            
                                      <a type="button" href="action.php?action=action&act=restart" class="csys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/pc.svg"><hr><?php echo $lang_44; ?></a>
                                      <a type="button" href="action.php?action=action&act=server" class="csys btn btn-default"><img style="width:50px;height:50px;" src="includes/img/icons/list.svg"><hr><?php echo $lang_44; ?></a>
                                      <a type="button" href="action.php?action=action&act=mysql" class="csys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/db.svg"><hr><?php echo $lang_44; ?></a></li>
  </li>
  </ul>
    <?php
    } ?>
    <script>
   
  
$(document).ready(function(){
  $("#bshow").hide();
    $("#bhide").click(function(){
        $(".svr").hide();
        $("#bhide").hide();
        $("#bshow").show();
    });
    $("#bshow").click(function(){
        $(".svr").show();
        $("#bhide").show();
        $("#bshow").hide();
    });
});
</script>

<ul class="list-group" data-step="3" data-intro="Here is where you can create new servers and control different servers.">
  <li class="list-group-item notification is-dark"><a id="bhide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="bshow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_45; ?></li>
  <li class="list-group-item">  

                                        <a type="button" href="<?php echo $webroot; ?>/newserv" class="svr btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/add.svg"><hr><?php echo $lang_15; ?></a>
                                        
                                        <?php if ('' != file_get_contents('data/cloudflare')) {
                                                ?>
                                        
                                          <a type="button" href="<?php echo $webroot; ?>/cloudflare" class="svr btn btn-default"><i class="fa fa-5x fa-cloud"></i><hr><?php echo $lang_17; ?></a>
                                        <?php
                                            } ?>
                                        <a type="button" href="<?php echo $webroot; ?>/list#" class="svr btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/list.svg"><hr><?php echo $lang_18; ?></a>
                                                                       
                                         </li>
  </ul>
  <script>
$(document).ready(function(){
  $("#ashow").hide();
    $("#ahide").click(function(){
        $(".sys").hide();
        $("#ahide").hide();
        $("#ashow").show();
    });
    $("#ashow").click(function(){
        $(".sys").show();
        $("#ahide").show();
        $("#ashow").hide();
    });
});
</script>
                                      <ul class="list-group" data-step="4" data-intro="Here is you can manage webister, these are the settings of it.">
  <li class="list-group-item notification is-dark"><a id="ahide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="ashow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_46; ?></li>
  <li class="list-group-item">  
<?php
if (ismasterreseller()) {
                                                                                ?>
                                <a type="button" href="<?php echo $webroot; ?>/settings" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/settings.svg"><hr><?php echo $lang_21; ?></a> 
                            <a type="button" href="<?php echo $webroot; ?>/fman" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/file.svg"><hr>Root File Manager</a> 
                                
                                <a type="button" href="<?php echo $webroot; ?>/update" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/update.svg"><hr><?php echo $lang_22; ?></a> <?php
                                                                            } ?>
                                  <a type="button" href="<?php echo $webroot; ?>/plug" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/plugins.svg"><hr><?php echo $lang_23; ?></a>
                                        <a type="button" href="<?php echo $webroot; ?>/terminal" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/term.svg"><hr><?php echo $lang_24; ?></a>
                                        
                                                                                      <a type="button" href="<?php echo $webroot; ?>/mail" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/mail.svg"><hr><?php echo $lang_25; ?></a>
                                      
                                            <?php
                                            if (ismasterreseller()) {
                                                ?>
                                              <a type="button" href="https://host.adaclare.com/submitticket.php" class="sys btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/support.svg"><hr><?php echo $lang_31; ?></a> 
                   
                                            <?php
                                            } ?>
                                        <?php
                                        $scan = scandir('plugins/');
    foreach ($scan as $file) {
        $safe = true;
        include 'plugins/'.$file;
        if ($menu) {
            echo '<a type="button" class="sys btn btn-large btn-default" href="'.$webroot.'/plpage?pl='.urlencode($file).'" class="btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/p.svg"><hr>'.$menu_name.'</a>';
        }
    } ?>
                                       
                                         </li>
  </ul>  
                               
            <?php
} ?>

<br>
<?php


     if ('admin' != $_SESSION['user']) {
         ?>
<div>
<?php
     } ?>
          
<script>
$(document).ready(function(){
  $("#show").hide();
    $("#hide").click(function(){
        $(".serv").hide();
        $("#hide").hide();
        $("#show").show();
    });
    $("#show").click(function(){
        $(".serv").show();
        $("#hide").show();
        $("#show").hide();
    });
});
</script>
  <ul class="list-group" data-step="5" data-intro="This is where users manage there servers.">
  <li class="list-group-item notification is-dark"><a id="hide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="show" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> <?php echo $lang_47; ?></li>
  <li class="list-group-item">  

                                     <a    type="button" href="<?php echo $webroot; ?>/cron" class="serv btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/cron.svg"><hr><?php echo $lang_27; ?></a>
                                        <a    type="button" href="vendor/phpmyadmin/phpmyadmin/" class="serv btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/dx.svg"><hr><?php echo $lang_28; ?></a>
                                              <a  type="button" href="<?php echo $webroot; ?>/phpinfo" class="serv btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/php.svg"><hr><?php echo $lang_29; ?></a>
                                              <a  type="button" href="<?php echo $webroot; ?>/domain" class="serv btn btn-default"><img style="width:50px;height:50px;"  src="includes/img/icons/internet.svg"><hr>Domains</a>
                                                                        
                                                                                 
                                                                                   <a id="serv"  type="button" href="<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'forum' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>" class="serv btn btn-large btn-warning"><img style="width:50px;height:50px;"  src="includes/img/icons/forum.svg"><hr><?php echo $lang_30; ?></a>
                                        <a type="button" href="<?php

    $sql = "SELECT value FROM settings WHERE code =  'support' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
?>" class="serv btn btn-large btn-warning"><img style="width:50px;height:50px;"  src="includes/img/icons/support.svg"><hr><?php echo $lang_31; ?></a>
                                    
                                                         </li>
  </ul>  
  <?php
if ('admin' != $_SESSION['user']) {
   ?>
 <ul class="list-group" data-step="5" data-intro="This is where users manage there servers.">
  <li class="list-group-item notification is-dark">File Manager</li>
  <li class="list-group-item">  
  <iframe src="thirdparty/mftp/index.php" style="width:1000px;border:0;" scrolling="no" onload="resizeIframe(this)"></iframe>
  <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    if (obj.contentWindow.document.body.scrollHeight < "500") {
        obj.style.height = '500px';
    }
  }
</script>
  </li>

 </ul>


   <?php
}
?>

<?php require 'includes/classes/footer.class.php'; ?>
