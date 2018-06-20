<br>  <br>  <br>  <br>  <br>  <br>  <br>         
                       
                    </section>
                    <section class="col-lg-3" data-step="6" data-intro="This will show info about your server and the way it works.">
                        <div class="list list-info" style="padding-left:0px">

   
 <form class="navbar-form" role="search">
                <div class="input-group">
             <h1><?php echo $_SESSION['user']; ?></h1>
             
                </div>
            </form>
                        </div>
                    <div class="list list-info">
					<div class="panel panel-default">
  <div class="panel-heading">Notice</div>
  <div class="panel-body">
                                      <?php echo file_get_contents('data/head'); ?>
									  </div>
                    </div>
                        <div class="list list-info">
    <div class="account-information">
  <div class="panel panel-default">
  <div class="panel-heading">Server Info</div>
  <div class="panel-body">
        <table id="account-information">
          <ul style="list-style-type: none; padding-left:0px;">
          			
			 <li>Hostname: <span class="badge pull-right"><?php echo gethostname(); ?>:<?php
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></span></li>
			 <li>IP Address: <span class="badge pull-right"><?php echo gethostbyname(gethostname()); ?>:<?php
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $mm = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></li>
	<li>MySQL Hostname: <span class="badge pull-right">localhost</span></li>
   <li>MySQL Username: <span class="badge pull-right"><?php echo $_SESSION['user']; ?></span></li>
   <li>MySQL Password: <span class="badge pull-right">Same as CP</span></li>
   <li>Database: <span class="badge pull-right"><?php echo $_SESSION['user']; ?></span></li>

    <li>FTP Hostname: <span class="badge pull-right"><?php echo gethostbyname(gethostname()); ?></li>
    <li>FTP Username: <span class="badge pull-right"><?php echo $_SESSION['user']; ?></span></li>
    <li>FTP Password: <input type="text" class="pull-right"  style="width:100px" value="<?php
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[2];
  
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>" disabled></li><li><br></li>
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
    <li>	Disk Space (<?php echo GetDirectorySize('/var/webister/'.$myp); ?>/<?php echo $quote; ?>):<div class="progress">
  <div class="progress-bar progress-bar-striped"  role="progressbar" aria-valuenow="<?php echo GetDirectorySize('/var/webister/'.$myp); ?>"
  aria-valuemin="0" aria-valuemax="<?php 
  if ($quote == "∞") {$quote="1"; echo "1"; } else {
  echo $quote;
  }
  ?>" style="width:<?php echo GetDirectorySize('/var/webister/'.$myp) / $quote * 100; ?>%">
    <span class="sr-only"><?php echo GetDirectorySize('/var/webister/'.$myp) / $quote * 100; ?>% Complete</span>
  </div>
</div></li>
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
<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $files['total_files']; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $files['total_files']; ?>%">
    <span class="sr-only"><?php echo $files['total_files']; ?>% Complete</span>
  </div>
</div>
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
                                            
<?php  $mysqli = new mysqli();
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
  <div class="col-md-6">      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="H7P5P7PY5C4EL">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt=""  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
</form></div>
  <div class="col-md-6">
 <div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div><script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=undefined&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
       </div>
</div>
  
</div> 
 
</section>
                </div>
            </section>
        </div>
           
          <div id="branding">
        
    Copyright Adaclare Technologies | Powered By Bing Translate
    
</div>


	<script src="public/assets/js/bootstrap.min.js"></script>

		</body>
</html>