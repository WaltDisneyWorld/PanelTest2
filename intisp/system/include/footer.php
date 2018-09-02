               <?php
               require 'config.php';
       
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
 
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $quote = $row[4];
     if ($quote == '') {
         $quote = '∞';
     }
 }
   mysqli_free_result($result);
    mysqli_close($con);
     $con    = mysqli_connect("$host", "$user", "$pass", "$data");
               ?>
          </div><!-- row -->

        </div><!-- col-md-9 -->
        <div class="col-md-3 col-lg-4 dash-right">
          <div class="row">
            <div class="col-sm- col-md-12 col-lg-12">
                <?php 
                if (!isset($noshow)) { ?>
              <form class="navbar-form" role="search">
                <div class="input-group">
             <h1><?php echo $_SESSION['user']; ?></h1>
             
                </div>
            </form>
                        </div>
                        
                    <div class="list list-info">
					<div class="panel panel-primary list-announcement">
  
  <div class="panel-body">
                                      <?php echo file_get_contents('data/head'); ?>
									  </div>
                    </div>
                    </div>
                        <div class="list list-info">
    <div class="account-information">
  <div class="panel panel-default">
  <div class="panel-heading">Server Info</div>
  <div class="panel-body">
        <table id="account-information">
          <ul style="list-style-type: none; padding-left:0px;">
          			
			 <li>Hostname: <span class="tag is-dark pull-right"><?php echo gethostname(); ?>:
			<?php
				$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
				$result = mysqli_query($con, $sql);
				 while ($row = mysqli_fetch_row($result)) {
					 echo $row[5];
				 }
   				mysqli_free_result($result);
    			?>
			</span>
			</li>
			<li>IP Address: <span class="tag is-dark pull-right"><?php echo gethostbyname(gethostname()); ?>:
			<?php
			$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
			$result = mysqli_query($con, $sql);
			 while ($row = mysqli_fetch_row($result)) {
				 echo $row[5];
				 $mm = $row[5];
			 }
			 mysqli_free_result($result);
			?>
			</li>
	<li>MySQL Hostname: <span class="tag is-info pull-right">localhost</span></li>
   	<li>MySQL Username: <span class="tag is-info pull-right"><?php echo $_SESSION['user']; ?></span></li>
   	<li>MySQL Password: <span class="tag is-info pull-right">Same as CP</span></li>
   	<li>Database: <span class="tag is-info pull-right"><?php echo $_SESSION['user']; ?></span></li>

    <li>FTP Hostname: <span class="tag is-info pull-right"><?php echo gethostbyname(gethostname()); ?></li>
    <li>FTP Username: <span class="tag is-info pull-right"><?php echo $_SESSION['user']; ?></span></li>
    <li>FTP Password: <input type="text" class="pull-right"  style="width:100px" value="<?php
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[2];  
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>" disabled></li><li><br></li>
		  <?php
		  if ($_SESSION['user'] == 'admin') {
    echo ' <li>Serial Number: <span class="tag is-dark pull-right">' . file_get_contents("data/register") . '</span></li><li><br></li>
<li><br></li>';
}
		  ?>
   <li>Status: 
       <?php


     if (Connect(80)) {
         echo '<i class="fa fa-check pull-right" aria-hidden="true"></i>';
     } else {
         echo '<i class="fa fa-times pull-right" aria-hidden="true"></i>';
     }
    ?> </li>
	
    <li>MySQL Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li>
	   <li>IntISP Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li>
	   <style>
	   .progress, .progress-bar-striped, .progress-bar {height: 10px !important;}
	   </style>
    <li>	Disk Space (<?php echo GetDirectorySize('/var/webister/'.$myp); ?>/<?php echo $quote; ?>):<br>
      


<progress class="progress is-small" value="<?php echo GetDirectorySize('/var/webister/'.$myp); ?>" max="<?php 
  if ($quote == "∞") {$quote="1"; echo "1"; } else {
  echo $quote;
  }
  ?>"><?php echo GetDirectorySize('/var/webister/'.$myp) / $quote * 100; ?>%</progress>
            </li>
<li>
    Data Folder (
    <?php
    
    function scan_dir($path) {
    $ite    =new RecursiveDirectoryIterator($path);
    $nbfiles=0;
    foreach (new RecursiveIteratorIterator($ite) as $filename=>$cur) {
        $filesize=$cur->getSize();
        $nbfiles++;
        $files[] = $filename;
    }

    return array('total_files'=>$nbfiles,'files'=>$files);
}
$files = scan_dir('data');
echo $files['total_files'];
?>
/100):

<progress class="progress is-small" value="<?php echo $files['total_files']; ?>" max="100"><?php echo $files['total_files']; ?>%</progress>
</li>

          </ul>
          </div>
          <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>IP</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
<?php
    $con       = mysqli_connect("$host", "$user", "$pass", "$data"); $sql       = "SELECT * \n"
    ."FROM `failedlogin` \n"
    .'LIMIT 0 , 5';

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        echo '
    <tr><th scope="row">'.$row[0].'</th>
													<td>'.$row[1].'</td>
													<td>'.$row[2].'</td></tr>';
    }
}
    ?>
  
                                            </tbody>
                                        </table>
        </table>
    </div>
   
</div>       
<div class="list list-info">
<div class="row">
  <div class="col-md-6">      
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="H7P5P7PY5C4EL">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt=""  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
	</form>
	</div>
  	<div class="col-md-6">
 		<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
		<script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=undefined&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
     	</div>
	</div>
  
</div> 
                </div>
              </div>
            </div><!-- col-md-12 -->
         <?php
                }?>

        </div><!-- col-md-3 -->
      </div><!-- row -->

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change My Password</h4>
        </div>
        <form method="POST" action="index.php?page=pass">
        <div class="modal-body">
             <form class="form-horizontal" role="form">
                  <div class="form-group">
                  	<input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Change IT</button>
                    </div>
                  </div>
        </div></form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
<script src="public/lib/jquery/jquery.js"></script>
<script src="public/lib/jquery-ui/jquery-ui.js"></script>
<script src="public/lib/bootstrap/js/bootstrap.js"></script>
<script src="public/lib/jquery-toggles/toggles.js"></script>


<script src="public/lib/raphael/raphael.js"></script>

<script src="public/lib/flot/jquery.flot.js"></script>
<script src="public/lib/flot/jquery.flot.resize.js"></script>
<script src="public/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="public/lib/jquery-knob/jquery.knob.js"></script>

<script src="public/js/custom.js"></script>


</body>
</html>
