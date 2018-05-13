<br>  <br>  <br>  <br>  <br>  <br>  <br>         
                       
                    </section>
                    <section class="col-lg-3" data-step="6" data-intro="This will show info about your server and the way it works.">
                        <div class="list list-info" >

   
 <form class="navbar-form" role="search">
                <div class="input-group">
             <h1><?php echo $_SESSION['user']; ?></h1>
             
                </div>
            </form>
                        </div>
                    <div class="list list-info">
                                      <?php echo file_get_contents('data/head'); ?>
                    </div>
                        <div class="list list-info">
    <div class="account-information">
        <div class="head">Client Information</div>
        <table id="account-information">
          <ul>
          				<li class="ts-label">Status of Server</li>
			 <li>Hostname: <span class="badge"><?php echo gethostname(); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></span></li>
			 <li>IP Address: <span class="badge"><?php echo gethostbyname(gethostname()); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $mm = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></li>
    <li>MySQL Status: <i class="fa fa-check" aria-hidden="true"></i></li>
			<li>MySQL Hostname: <span class="badge">localhost</span></li>
   <li>MySQL Username: <span class="badge"><?php echo $_SESSION['user']; ?></span></li>
   <li>MySQL Password: <span class="badge">Same as CP</span></li>
   <li>Database: <span class="badge"><?php echo $_SESSION['user']; ?></span></li>
   <li>Webister Status: <i class="fa fa-check" aria-hidden="true"></i></li>
    <li>FTP Hostname: <span class="badge"><?php echo gethostbyname(gethostname()); ?></li>
    <li>FTP Username: <span class="badge"><?php echo $_SESSION['user']; ?></span></li>
    <li>FTP Password: :<span class="badge"><?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[2];
  
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></span></li>
   <li>Status: 
       <?php


     if (Connect($mm)) {
         echo '<i class="fa fa-check" aria-hidden="true"></i>';
     } else {
         echo '<i class="fa fa-times" aria-hidden="true"></i>';
     }
    ?> </li>
    <li>	Disk Space (<?php echo GetDirectorySize('/var/webister/'.$myp); ?>/<?php echo $quote; ?>):<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo GetDirectorySize('/var/webister/'.$myp); ?>"
  aria-valuemin="0" aria-valuemax="<?php 
  if ($quote == "∞") {echo "99999999999999999";} else {
  echo $quote;
  }
  ?>" style="width:<?php echo GetDirectorySize('/var/webister/'.$myp); ?>%">
    <span class="sr-only"><?php echo GetDirectorySize('/var/webister/'.$myp); ?>% Complete</span>
  </div>
</div></li>
<li>
    Data Folder (
    <?php
    
    function scan_dir($path){
    $ite=new RecursiveDirectoryIterator($path);
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
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $files['total_files']; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $files['total_files']; ?>%">
    <span class="sr-only"><?php echo $files['total_files']; ?>% Complete</span>
  </div>
</div>
</li>

          </ul>
          
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
    $con = mysqli_connect("$host", "$user", "$pass", "$data"); $sql = "SELECT * \n"
    ."FROM `FailedLogin` \n"
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
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="H7P5P7PY5C4EL">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt=""  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
</form>
 <div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div><script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=undefined&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
        </div>
</div> 
 
</section>
                </div>
            </section>
        </div>
           
        <script src="cpanel/bootpanel/js/bootstrap.min.js" type="text/javascript"></script>
        <div id="branding">
        
    Copyright Adaclare Technologies | Powered By Bing Translate
    
</div>

	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>

	<script src="js/main.js"></script>
<script src="js/tour.js"></script>

		</body>
</html>