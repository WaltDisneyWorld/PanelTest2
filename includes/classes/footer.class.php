               <?php
                  if (!isset($HOME)) {
                      die();
                  }
             
               require 'config.php';
       
$con    = mysqli_connect($host, $user, $pass, $data);
$sql    = 'SELECT * FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);


    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'head' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $header = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
 
     $con    = mysqli_connect("$host", "$user", "$pass", "$data");
$sql    = 'SELECT password FROM users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $ftppass = $row[0];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    $key = "";
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'register' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $key = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
    $failed_login = "";
    $con       = mysqli_connect("$host", "$user", "$pass", "$data"); $sql       = "SELECT * \n"
    ."FROM `failedlogin` \n"
    .'LIMIT 0 , 5';

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        $failed_login .= '
    <tr>
													<td>'.$row[1].'</td>
													<td>'.$row[2].'</td></tr>';
    }
}
$microsoft = "	<script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=undefined&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
     ";
     $con    = mysqli_connect("$host", "$user", "$pass", "$data");
               echo $twig->render('footer.tpl', ['template_dir' => 'templates/' . $template_name,
               "hide_nav" => isset($noshow),
               "username" => $_SESSION["user"],
               "header" => $header,
               "hostname" => gethostname(),
               "port" => $myp,
               "ip" => gethostbyname(gethostname()),
               "ftppass" => $ftppass,
               "status" => getStatus(),
               "disk" => getDiskPercentage(),
               "failed_login" => $failed_login,
            "microsoft" => $microsoft]);

          ?>


