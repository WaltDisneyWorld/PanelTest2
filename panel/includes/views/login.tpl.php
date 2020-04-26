<?php
if (!defined("HOMEBASE")) {
    die();
}

if (isset($_GET['de'])) {
    $_SESSION['lang'] = 'de';
}
if (isset($_GET['es'])) {
    $_SESSION['lang'] = 'es';
}
if (isset($_GET['en'])) {
    $_SESSION['lang'] = 'en';
}


define("site_title", $this->getValueFromSetting("title"));

    $alerts = '';
        if (isset($_GET['error'])) {
            $alerts .= "<div class='alert alert-danger'>".$lang_71.'</div>';
        }

        if (isset($_GET['errorx'])) {
            $alerts .= "<div class='alert alert-danger'>Login has been established from the oauth server. However no account has been linked to this user. Please link the account before logging in using oauth.</div>";
        }

   $github = false;
        $google = false;
        $twitter = false;
        $facebook = false;
        
    if ($this->getValueFromSetting("github_public") != "") {
        $github = true;
    }
    if ($this->getValueFromSetting("facebook_public") != "") {
        $facebook = true;
    }
    if ($this->getValueFromSetting("google_public") != "") {
        $google = true;
    }
    if ($this->getValueFromSetting("twitter_public") != "") {
        $twitter = true;
    }
   
        $oauth_cred = '';

   if ($facebook) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=facebook" class="btn btn-danger" style="background-color:#3b5998;width:100%;"><i class="fa fa-facebook"></i> Facebook</a>  <br> <br>';
   } if ($github) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=github" class="btn btn-danger" style="background-color:#4183c4;width:100%;"><i class="fa fa-github"></i> Github</a>  <br> <br>';
   } if ($twitter) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=twitter" class="btn btn-danger" style="background-color:#00aced;width:100%;"><i class="fa fa-twitter"></i> Twitter</a>  <br> <br>';
   } if ($google) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=google" class="btn btn-danger" style="background-color:#dd4b39;width:100%;"><i class="fa fa-google"></i> Google</a>';
   }
       if (isset($_SESSION['reseller'])) {
           $reseller = $_SESSION['reseller'];
       } else {
           $reseller = '';
       }
     $twig_settings = array('template_dir' => 'templates/'.constant("template_name"),
'site_title' => constant("site_title"),
'alerts' => $alerts,
'action_url' => 'index.php?action=login',
'lang_55' => $lang_55,
'lang_58' => $lang_58,
'lang_70' => $lang_70,
'oauth' => $oauth_cred,
'reseller' => isset($_SESSION['reseller']),
'the_reseller' => $reseller);
 die($twig->render('login.tpl', $twig_settings));
