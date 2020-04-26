<?php
if (!isset($HOME)) {
    die();
}
session_start();
$session = new Session();
/*

    if (!$failsafe_offline) {
        if (false == getEdition($keys)) {
            throw new Exception($lang_1.$license.$lang_2.$lang_3);
            die();
        }
    }
*/
$permissions = new intispPermissions();
$permissions->isLoggedin();
$communications = new communications;
$intisp_ver = $communications->getIntISPVersion();
$disk_quota = $communications->getDiskLimit($_SESSION["user"]);
if (100 == $communications->getDiskPercentage()) {
    $_SESSION["preventative"] = true;
}
$autoload_recalled = new IntISP();
$site_title = $autoload_recalled->getValueFromSetting("title");
$usertype = $permissions->whoami();
$whmurl = $autoload_recalled->getValueFromSetting("whmurl");

$menu_builder = '';
 

   if ($permissions->isAdmin()) {
       $menu_builder .= '<h5 class="sidebar-title">'.$lang_14.'</h5>';
       $menu_builder .= '<ul class="nav nav-pills nav-stacked nav-quirk">';
       $menu_builder .= '<li><a href="'.$webroot.'/newserv"><i class="fa fa fa-plus"></i> <span>'.$lang_15.'</span></a></li>';
       $menu_builder .= '<li><a href="'.$webroot.'/list#"><i class="fa fa fa-user"></i> <span>'.$lang_18.'</span></a></li>';
       $menu_builder .= ' </ul>
                      <h5 class="sidebar-title">System</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';
       $menu_builder .= '<li><a href="'.$webroot.'/settings"><i class="fa fa fa-sliders"></i> <span>'.$lang_21.'</span></a></li>';
       $menu_builder .= '<li><a href="'.$webroot.'/fman"><i class="fa fa fa-sliders"></i> <span>Root File Manager</span></a></li>';
       $menu_builder .= '<li><a href="'.$webroot.'/update"><i class="fa fa fa-upload"></i> <span>'.$lang_22.'</span></a></li>';

       $menu_builder .= '<li><a href="'.$webroot.'/plug"><i class="fa fa fa-puzzle-piece"></i> <span>'.$lang_23.'</span></a></li>';
       $menu_builder .= '<li><a href="'.$webroot.'/terminal"><i class="fa fa fa-terminal"></i> <span>'.$lang_24.'</span></a></li>';


       $menu_builder .= '<li><a href="'.$webroot.'/mail"><i class="fa fa fa-envelope-o"></i> <span>'.$lang_25.'</span></a></li>';

       $menu_builder .= '</ul>';
   }
                     $menu_builder .= ' <h5 class="sidebar-title">My Server</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">';

                   $menu_builder .= '<li><a href="'.$webroot.'/cron"><i class="fa fa fa-clock-o"></i> <span>'.$lang_27.'</span></a></li>';
           $menu_builder .= '    <li><a href="vendor/phpmyadmin/phpmyadmin/"><i class="fa fa fa-database"></i> <span>'.$lang_28.'</span></a></li>
             <li><a href="'.$webroot.'/phpinfo"><i class="fa fa fa-code"></i> <span>'.$lang_29.'</span></a></li>
             <li><a href="'.$webroot.'/domain"><i class="fa fa fa-plus"></i> <span>Domains</span></a></li>
                     </ul>';
                 
        if ($CP) {
            $page = 'cp';
        } else {
            $page = $_GET['page'];
        }
echo $twig->render('head.tpl', ['template_dir' => 'templates/'.$template_name,
'intisp_ver' => $intisp_ver,
'site_title' => $site_title,
'edition' => $edition,
'usertype' => $usertype,
'username' => $_SESSION['user'],
'page' => $page,
'lang_8' => $lang_8,
'lang_9' => $lang_9,
'lang_10' => $lang_10,
'lang_11' => $lang_11,
'lang_12' => $lang_12,
'lang_13' => $lang_13,
'whmurl' => $whmurl,
'menu' => $menu_builder,
'webroot' => $webroot, ]);


        if ($permissions->isAdmin()) {
            if (isset($_GET['con'])) {
                function rrmdir($dir)
                {
                    if (is_dir($dir)) {
                        $objects = scandir($dir);
                        foreach ($objects as $object) {
                            if ('.' != $object && '..' != $object) {
                                if (is_dir($dir.'/'.$object)) {
                                    rrmdir($dir.'/'.$object);
                                } else {
                                    unlink($dir.'/'.$object);
                                }
                            }
                        }
                        rmdir($dir);
                    }
                }
                rrmdir('install');
            }
          
            if (file_exists('install')) {
                ?>
           <div class="alert alert-warning" role="alert">
 <h4 class="alert-heading">The Install Folder Needs to be deleted</h4>
<p>Your installation folder needs to be deleted. Please delete the folder or press the button below. Failing to do so will cause your system to be at risk.</p>
<a href="<?php echo $webroot; ?>/?con" class="btn btn-primary">Delete Install Folder</a>
</div>
          <?php
            }
        }
if (isset($_SESSION["preventative"])) {
    ?>
 <div class="alert alert-warning" role="alert">
<b>You have reached your disk limit</b>
<p>To ensure you will not go over your disk limit, functions have been disabled. Please contact your web hosting service or delete some files.<Br>You may also want to upgrade your plan to allow for more storage.</p>
 </div>
    <?php
}
                      
                           ?> 
               <div class="contentpanel">

      <div class="row">
        <div class="col-md-10 col-lg-10 dash-left">
            
        

  
   
              
