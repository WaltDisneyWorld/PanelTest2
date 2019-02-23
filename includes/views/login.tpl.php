<?php


if (isset($_GET["de"])) {
    $_SESSION["lang"] = "de";
}
if (isset($_GET["es"])) {
    $_SESSION["lang"] = "es";
}
if (isset($_GET["en"])) {
    $_SESSION["lang"] = "en";
}


if (!isset($HOME)) {
    die();
}
require("config.php");

if (!isset($lang)) {
    $lang = "en";
}
if (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
}

require("includes/lang/" . $lang . ".php");
 require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'title' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $site_title = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
    $alerts = "";
        if (isset($_GET["error"])) {
            $alerts .= "<div class='alert alert-danger'>" . $lang_71 . "</div>";
        }
  
       
        if (isset($_GET["errorx"])) {
            $alerts .= "<div class='alert alert-danger'>Login has been established from the oauth server. However no account has been linked to this user. Please link the account before logging in using oauth.</div>";
        }
  
   $github = false;
        $google = false;
        $twitter = false;
        $facebook = false;
          $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'github_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] != "") {
                $github = true;
            }
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
             $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'facebook_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] != "") {
                $facebook = true;
            }
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
                     $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'google_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] != "") {
                $google = true;
            }
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
                 $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'twitter_public' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] != "") {
                $twitter = true;
            }
        }
        // Free result set
        mysqli_free_result($result);
    }
    mysqli_close($con);
        $oauth_cred = "";
        
   if ($facebook) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=facebook" class="btn btn-danger" style="background-color:#3b5998;width:100%;"><i class="fa fa-facebook"></i> Facebook</a>  <br> <br>';
   } if ($github) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=github" class="btn btn-danger" style="background-color:#4183c4;width:100%;"><i class="fa fa-github"></i> Github</a>  <br> <br>';
   } if ($twitter) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=twitter" class="btn btn-danger" style="background-color:#00aced;width:100%;"><i class="fa fa-twitter"></i> Twitter</a>  <br> <br>';
   } if ($google) {
       $oauth_cred .= '<a href="action.php?action=login&oauth=google" class="btn btn-danger" style="background-color:#dd4b39;width:100%;"><i class="fa fa-google"></i> Google</a>';
   }
       if (isset($_SESSION["reseller"])) {
           $reseller = $_SESSION["reseller"];
       } else {
           $reseller = "";
       }
echo $twig->render('login.tpl', ['template_dir' => 'templates/' . $template_name,
"site_title"=> $site_title,
"alerts"=>$alerts,
"action_url"=>"action.php?action=login",
"lang_55" => $lang_55,
"lang_58" => $lang_58,
"lang_70"=> $lang_70,
"oauth"=> $oauth_cred,
"reseller" => isset($_SESSION["reseller"]),
"the_reseller"=> $reseller]);
