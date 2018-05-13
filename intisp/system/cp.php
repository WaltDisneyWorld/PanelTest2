<?php require 'include/head.php';
?>

        <?php if ($_SESSION['user'] == 'admin') {
    ?>
<style>
  .btn {
    border-style: none;
  }
  
</style>
 
                      <div data-step="1" data-intro="Welcome to Webister Platform, this is where you can see info about different versions." style="   margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 100px;
    margin-left: 100px; text-align:center;" class="jumbotron">
  <h1>News</h1>
  <p><?php 
  
    $news = file_get_contents("https://dl.adaclare.com/intisp.MESSAGES"); 
    if (strlen($news) > "190") {
        echo substr($news, 0, 190) . "...</p>";
        ?>
    
        <p><a class="btn btn-primary btn-lg" href="https://dl.adaclare.com/intisp.MESSAGES" role="button">Learn more</a><a class="btn btn-primary btn-lg" href="javascript:void(0);" onclick="javascript:introJs().start();" role="button">Take The Tour</a></p>
        <?php
    } else {
        echo $news . "</p>";
    }
  
    ?>
  
</div>  
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
  <li class="list-group-item"><a id="baahide"><i class="fa fa-list" aria-hidden="true"></i></a><a id="baashow"><i class="fa fa-list" aria-hidden="true"></i></a> | Status</li>
  <li class="list-group-item">  
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count = 0;
                                            $con = mysqli_connect($host, $user, $pass, $data);
                                            $sql = 'SELECT * FROM Users';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h1><hr> Users</a>
                                          <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                            $count = 0;
                                            $con = mysqli_connect($host, $user, $pass, $data);
                                            $sql = 'SELECT * FROM FailedLogin';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_row($result)) {
                                                $count = $count + 1;
                                            }
                                            mysqli_free_result($result);
                                            mysqli_close($con);
                                            echo $count;
    ?></h1><hr> Failed Logins</a>
                                                                                <a type="button" href="" class="aasvr btn btn-default"><h1 style="font-size: 60px;"><?php
                                                                                $count = 0;
                                                                                $con = mysqli_connect($host, $user, $pass, $data);
                                                                                $sql = 'SELECT * FROM Users';
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
                                                                                                                            $scan = scandir("plugins");
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
  <li class="list-group-item"><a id="chide"><i class="fa fa-list" aria-hidden="true"></i></a><a id="cshow"><i class="fa fa-list" aria-hidden="true"></i></a> | Power Management</li>
  <li class="list-group-item">            
                                      <a type="button" href="action.php?act=restart" class="csys btn btn-default"><i class="fa fa-5x fa-refresh"></i><hr>Restart</a>
                                      <a type="button" href="action.php?act=server" class="csys btn btn-default"><i class="fa fa-5x fa-server"></i><hr>Restart</a>
                                      <a type="button" href="action.php?act=mysql" class="csys btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Restart</a></li>
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
  <li class="list-group-item"><a id="bhide"><i class="fa fa-list" aria-hidden="true"></i></a><a id="bshow"><i class="fa fa-list" aria-hidden="true"></i></a> | Servers</li>
  <li class="list-group-item">  

                                        <a type="button" href="newserv.php" class="svr btn btn-default"><i class="fa fa-5x fa-plus"></i><hr>New Server</a>
                                            <?php
                                            if (ismasterreseller()) {
                                            ?>
                                             <a type="button" href="newresell.php" class="svr btn btn-default"><i class="fa fa-5x fa-plus"></i><hr>New Reseller</a>
                                            <?php
                                            } ?>
                                        <?php if (file_get_contents("data/cloudflare") != "") {
                                            ?>
                                        
                                          <a type="button" href="cloudflare.php" class="svr btn btn-default"><i class="fa fa-5x fa-cloud"></i><hr>Cloudflare</a>
                                        <?php } ?>
                                        <a type="button" href="index.php?page=list#" class="svr btn btn-default"><i class="fa fa-5x fa-user"></i><hr>Users</a>
                                        <a type="button" href="plans.php" class="svr btn btn-default"><i class="fa fa-5x fa-columns" aria-hidden="true"></i><hr>Plans</a>
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
  <li class="list-group-item"><a id="ahide"><i class="fa fa-list" aria-hidden="true"></i></a><a id="ashow"><i class="fa fa-list" aria-hidden="true"></i></a> | System</li>
  <li class="list-group-item">  
<?php
if (ismasterreseller()) {
    ?>
                                <a type="button" href="settings.php" class="sys btn btn-default"><i class="fa fa-5x fa-sliders"></i><hr>Settings</a> 
                                <a type="button" href="update.php" class="sys btn btn-default"><i class="fa fa-5x fa-upload"></i><hr>Update</a> <?php
} ?>
                                  <a type="button" href="plug.php" class="sys btn btn-default"><i class="fa fa-5x fa-puzzle-piece"></i><hr>Plugins</a>
                                        <a type="button" href="terminal.php" class="sys btn btn-default"><i class="fa fa-5x fa-terminal"></i><hr>Terminal</a>
                                                                                <a type="button" href="mail.php" class="sys btn btn-default"><i class="fa fa-5x fa-envelope-o"></i><hr>Messages</a>
                                      
                                        <a type="button" href="http://adaclare.com/errtrck/bug_report_page.php" class="sys btn btn-default"><i class="fa fa-5x fa-life-ring"></i><hr>Bugs</a>
                                       
                                        <?php
                                        $scan = scandir("plugins/");
                                        foreach ($scan as $file) {
                                            include "plugins/" . $file;
                                            if ($menu) {
                                                echo '<a type="button" class="sys btn btn-large btn-default" href="plpage.php?pl=' . urlencode($file) . '" class="btn btn-default"><i class="fa fa-5x fa-puzzle-piece"></i><hr>' . $menu_name . '</a>';
                                            }
                                        }
                                        ?>
                                       
                                         </li>
  </ul>  
                               
            <?php 
        } ?>

<br>
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
  <li class="list-group-item"><a id="hide"><i class="fa fa-list" aria-hidden="true"></i></a><a id="show"><i class="fa fa-list" aria-hidden="true"></i></a> | My Server</li>
  <li class="list-group-item">  

                                        <a  type="button" href="FileManager.php" class="serv btn btn-default"><i class="fa fa-5x fa-file"></i><hr>Files</a>
    
                                        <a    type="button" href="adminer-4.2.4.php?server=localhost" class="serv btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Database</a>
                                        <a  type="button" href="wp.php" class="serv btn btn-default"><i class="fa fa-5x fa-wordpress"></i><hr>Wordpress</a>
                                        <a  type="button" href="phpinfo.php" class="serv btn btn-default"><i class="fa fa-5x fa-code"></i><hr>PHP Info</a>
                                        <a  type="button" href="ucreate.php" class="serv btn btn-default"><i class="fa fa-5x fa-university"></i><hr>Webister U</a>
                                        <a  type="button" href="mobiapp.php" class="serv btn btn-default"><i class="fa fa-5x fa-mobile"></i><hr>Mobile App</a>
                                          <a id="serv"  type="button" href="<?php echo file_get_contents("data/forum"); ?>" class="serv btn btn-large btn-warning"><i class="fa fa-5x fa-file"></i><hr>Forum</a>
                                        <a type="button" href="<?php echo file_get_contents("data/support"); ?>" class="serv btn btn-large btn-danger"><i class="fa fa-5x fa-life-ring"></i><hr>Support</a>
                                    
                                                         </li>
  </ul>  
                      
 <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="memberModalLabel">Thank you for signing in!</h4>
      </div>
      <div class="modal-body">
        <p>We thank you for trying our software. We hope you enjoy our new interface.<BR>
        We recommend that you do the welcome tour so you can understand all the features of webisters.</p>

        <p>Once this box closes you will never see this again, unless you update this software.</p>
        <p>Please recommend this software to others, so we can spread the word.</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary"  href="javascript:void(0);" onclick="javascript:introJs().start();" data-dismiss="modal">You Welcome</a>
      </div>
    </div>
  </div>
</div>
<?php
if (!file_exists("data/lock")) { 
    file_put_contents("data/lock", "data/lock");
?>
         <script type="text/javascript">
    $(window).load(function(){
        $('#memberModal').modal('show');
    });
</script>
<?php
}
?>

        

          
<?php require 'include/footer.php'; ?>
