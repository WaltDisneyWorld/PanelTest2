<?php require 'include/head.php';
?>

        <?php if ($_SESSION['user'] == 'admin') {
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
  <li class="list-group-item notification is-dark"><a id="baahide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="baashow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> Status</li>
  <li class="list-group-item">  
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count  = 0;
                                            $con    = mysqli_connect($host, $user, $pass, $data);
                                            $sql    = 'SELECT * FROM users';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h1><hr> users</a>
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count  = 0;
                                            $con    = mysqli_connect($host, $user, $pass, $data);
                                            $sql    = 'SELECT * FROM failedlogin';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h1><hr> Failed Logins</a>
                                                                                <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                                                                $count  = 0;
                                                                                $con    = mysqli_connect($host, $user, $pass, $data);
                                                                                $sql    = 'SELECT * FROM users';
                                                                                $result = mysqli_query($con, $sql);
                                                                                while ($row = mysqli_fetch_row($result)) {
                                                                                    $count = $count + 1;
                                                                                }
                                                                                mysqli_free_result($result);
                                                                                mysqli_close($con);
                                                                                echo $count;
    ?></h1><hr> Servers</a>
                                                                                                                        <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;">
                                                                                                                            <?php
                                                                                                                            $count = 0;
                                                                                                                            $scan  = scandir("plugins");
                                                                                                                            foreach ($scan as $file) {
                                                                                                                                $count = $count +1;
                                                                                                                            }
                                                                                                                            $count = $count - 2;
                                                                                                                            echo $count;
                                                                                                                            ?>
                                                                                                                          
                                                                                                                        </h1><hr> Plugins</a>
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php echo file_get_contents("data/version"); ?></h1><hr> Version</a>
                                        
                                        
  
                                     </li>
  </ul> 
  
 <?php
 $whmurl = "";
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
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
  if ($whmurl != "") {
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
  <li class="list-group-item notification is-dark"><a id="hxxide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="sxxhow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> Billing and Support</li>
  <li class="list-group-item">  

                                        <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php" class="sxrv btn btn-default"><i class="fa fa-5x fa-newspaper-o"></i><hr> News and Announcements</a>
    <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php" class="sxrv btn btn-default"><i class="fa fa-5x fa-credit-card"></i><hr> Billing Info</a>
        <a  type="button" href="<?php echo $whmurl; ?>/index.php?rp=/knowledgebase" class="sxrv btn btn-default"><i class="fa fa-5x fa-question-circle"></i><hr> Assistance</a>
             <a  type="button" href="<?php echo $whmurl; ?>/clientarea.php?action=emails" class="sxrv btn btn-default"><i class="fa fa-5x fa-envelope-o"></i><hr> Email History</a>
                       
                                                         </li>
  </ul>  
  <?php } ?>
  
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
  <li class="list-group-item notification is-dark"><a id="chide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="cshow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> Power Management</li>
  <li class="list-group-item">            
                                      <a type="button" href="index.php?page=action&act=restart" class="csys btn btn-default"><i class="fa fa-5x fa-refresh"></i><hr>Restart</a>
                                      <a type="button" href="index.php?page=action&act=server" class="csys btn btn-default"><i class="fa fa-5x fa-server"></i><hr>Restart</a>
                                      <a type="button" href="index.php?page=action&act=mysql" class="csys btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Restart</a></li>
  </li>
  </ul>
    <?php
}
    ?>
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
  <li class="list-group-item notification is-dark"><a id="bhide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="bshow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> Servers</li>
  <li class="list-group-item">  

                                        <a type="button" href="index.php?page=newserv" class="svr btn btn-default"><i class="fa fa-5x fa-plus"></i><hr>New Server</a>
                                            <?php
                                            if (ismasterreseller()) {
                                            ?>
                                             <a type="button" href="index.php?page=newresell" class="svr btn btn-default"><i class="fa fa-5x fa-plus"></i><hr>New Reseller</a>
                                            <?php
                                            } ?>
                                        <?php if (file_get_contents("data/cloudflare") != "") {
                                            ?>
                                        
                                          <a type="button" href="index.php?page=cloudflare" class="svr btn btn-default"><i class="fa fa-5x fa-cloud"></i><hr>cloudflare</a>
                                        <?php } ?>
                                        <a type="button" href="index.php?page=list#" class="svr btn btn-default"><i class="fa fa-5x fa-user"></i><hr>users</a>
                                        <a type="button" href="index.php?page=plans" class="svr btn btn-default"><i class="fa fa-5x fa-columns" aria-hidden="true"></i><hr>Plans</a>
                                                                            <?php
                                                                            if (ismasterreseller()) {
                                                                            ?>
                                                                                                                  <a type="button" href="adminer-4.2.4.php?server=localhost&username=<?php echo urlencode($user); ?>&password=<?php echo urlencode($pass); ?>" class="svr btn btn-default"><i class="fa fa-5x fa-database" aria-hidden="true"></i><hr> All Database</a>
                                                                            <?php
                                                                            } ?>
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
  <li class="list-group-item notification is-dark"><a id="ahide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="ashow" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> System</li>
  <li class="list-group-item">  
<?php
if (ismasterreseller()) {
    ?>
                                <a type="button" href="index.php?page=settings" class="sys btn btn-default"><i class="fa fa-5x fa-sliders"></i><hr>settings</a> 
                                <a type="button" href="index.php?page=update" class="sys btn btn-default"><i class="fa fa-5x fa-upload"></i><hr>Update</a> <?php
} ?>
                                  <a type="button" href="index.php?page=plug" class="sys btn btn-default"><i class="fa fa-5x fa-puzzle-piece"></i><hr>Plugins</a>
                                        <a type="button" href="index.php?page=terminal" class="sys btn btn-default"><i class="fa fa-5x fa-terminal"></i><hr>Terminal</a>
                                                                                <a type="button" href="index.php?page=mail" class="sys btn btn-default"><i class="fa fa-5x fa-envelope-o"></i><hr>Messages</a>
                                      
                                            <?php
                                            if (ismasterreseller()) {
                                            ?>
                                              <a type="button" href="https://host.adaclare.com/submitticket.php" class="sys btn btn-default"><i class="fa fa-5x fa-life-ring"></i><hr>Support</a> 
                                             <a type="button" href="index.php?page=systemcheck" class="sys btn btn-default"><i class="fa fa-5x fa-info-circle"></i><hr>System Checklist</a>
                                            <?php
                                            } ?>
                                        <?php
                                        $scan = scandir("plugins/");
                                        foreach ($scan as $file) {
                                          $safe = true;
                                            include "plugins/" . $file;
                                            if ($menu) {
                                                echo '<a type="button" class="sys btn btn-large btn-default" href="index.php?page=plpage&pl=' . urlencode($file) . '" class="btn btn-default"><i class="fa fa-5x fa-puzzle-piece"></i><hr>' . $menu_name . '</a>';
                                            }
                                        }
                                        ?>
                                       
                                         </li>
  </ul>  
                               
            <?php 
        } ?>

<br>
<?php
     if ($_SESSION['user'] != 'admin') {   
?>
<div>
<?php } ?>
          
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
  <li class="list-group-item notification is-dark"><a id="hide" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a><a id="show" class="pull-right"><i class="fa fa-list" aria-hidden="true"></i></a> My Server</li>
  <li class="list-group-item">  

                                        <a  type="button" href="index.php?page=FileManager" class="serv btn btn-default"><i class="fa fa-5x fa-file"></i><hr>Files</a>
    <a    type="button" href="index.php?page=cron" class="serv btn btn-default"><i class="fa fa-5x fa-clock-o"></i><hr>Cron Jobs</a>
                                        <a    type="button" href="adminer-4.2.4.php?server=localhost" class="serv btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Database</a>
                                        <a  type="button" href="index.php?page=wp" class="serv btn btn-default"><i class="fa fa-5x fa-wordpress"></i><hr>Wordpress</a>
                                        <a  type="button" href="index.php?page=phpinfo" class="serv btn btn-default"><i class="fa fa-5x fa-code"></i><hr>PHP Info</a>
                                        <a  type="button" href="index.php?page=ucreate" class="serv btn btn-default"><i class="fa fa-5x fa-university"></i><hr>Webister U</a>
                                        <a  type="button" href="index.php?page=mobiapp" class="serv btn btn-default"><i class="fa fa-5x fa-mobile"></i><hr>Mobile App</a>
                                          <a id="serv"  type="button" href="<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
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

?>" class="serv btn btn-large btn-warning"><i class="fa fa-5x fa-file"></i><hr>Forum</a>
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
?>" class="serv btn btn-large btn-danger"><i class="fa fa-5x fa-life-ring"></i><hr>Support</a>
                                    
                                                         </li>
  </ul>  


<?php require 'include/footer.php'; ?>
