<?php if (!isset($HOME)) {
    die();
} require 'includes/classes/head.class.php';onlyadmin();onlymasterreseller(); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12" >

                        <h2 class="page-title"><?php echo $lang_21; ?></h2>
                        <div class="container">
<style>
							.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
								pointer-events: none;
}</style>
  <ul class="nav nav-tabs" style="width:539px">
    <li><a class="isDisabled">System Settings</a></li>
    <li  class="active"><a href="#menu1">Branding</a></li>
    <li><a href="#menu2">Email</a></li>
    <li><a href="#menu3">Misc</a></li>
    <li><a href="#menu4">Oauth</a></li>
  </ul>
   <form method="POST" action="action.php?action=options">
  <div class="tab-content" style="width:70%">

    <div id="menu1" class="tab-pane fade in active">
      <h3>Branding</h3>
   <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_64; ?></label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" value="<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection

    $sql = "SELECT value FROM settings WHERE code =  'title' LIMIT 0 , 30";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

    mysqli_close($con);

?>">
  </fieldset>
    <fieldset class="form-group" style="display:none;">>
    <label for="formGroupExampleInput"><?php echo $lang_65; ?></label>
    <input type="text" class="form-control" name="logos" id="formGroupExampleInput" value="<?php
    require 'config.php';
    $mysqli = new mysqli();
    $con    = mysqli_connect("$host", "$user", "$pass", "$data");
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'logo' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }
   
?>">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_66; ?></label>
    <input type="text" class="form-control" name="forum" id="formGroupExampleInput" value="<?php

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
  
?>">
  </fieldset>
   
   <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $lang_67; ?></label>
    <input type="text" class="form-control" name="support" id="formGroupExampleInput" value="<?php
    // Check connection
    $sql = "SELECT value FROM settings WHERE code =  'support' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>  
  <fieldset class="form-group" style="display:none;">
    <label for="sel1">Select theme (select one):</label>
      <select class="form-control" name="theme" id="sel1">
        <option>default</option>
        <option>modern</option>
        <option>dark</option>
      </select>
      </fieldset>
   <label for="formGroupExampleInput"><?php echo $lang_68; ?></label><Br>
   <textarea style="width:400px;height:500px;" name="head"><?php

    $sql = "SELECT value FROM settings WHERE code =  'head' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?></textarea><Br>
  </fieldset>
  <input type="hidden" name="loginh"> <input type="hidden" name="loginf">
   </fieldset><button type="submit" class="btn btn-primary"><?php echo $lang_69; ?></button>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Email</h3>
        <fieldset class="form-group" style="display:none;">
    <label for="formGroupExampleInput">Navbar color</label>
    <input type="text" class="form-control" name="navbar" id="formGroupExampleInput" value="<?php
 
    $sql = "SELECT value FROM settings WHERE code =  'color' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset> 
    <fieldset class="form-group" style="display:none;">
    <label for="formGroupExampleInput">Upgrade Button Link</label>
    <input type="text" class="form-control" name="upgrade" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'upbutton' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset> <fieldset class="form-group">
    <label for="formGroupExampleInput">System Email</label>
    <input type="text" class="form-control" name="mail" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'mail' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput">SMTP Host</label>
    <input type="text" class="form-control" name="smtp_host" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'smtp_host' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput">SMTP Port</label>
    <input type="text" class="form-control" name="smtp_port" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'smtp_port' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
   <fieldset class="form-group">
    <label for="formGroupExampleInput">SMTP Username</label>
    <input type="text" class="form-control" name="smtp_username" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'smtp_username' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
  
   <fieldset class="form-group">
    <label for="formGroupExampleInput">SMTP Password</label>
    <input type="text" class="form-control" name="smtp_password" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'smtp_password' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
  
     <fieldset class="form-group">
    <label for="formGroupExampleInput">SMTP Security</label><br>
    <?php

    $sql = "SELECT value FROM settings WHERE code =  'smtp_security' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            $wew = $row[0];
        }
        // Free result set
        mysqli_free_result($result);
    }

?>
    <label><input type="radio" name="smtp_security" value="0" <?php
    if ($wew == 0) {
        ?>
      checked="true"
      <?php
    }
    
    ?>> None</label><br>
<label><input type="radio" name="smtp_security" value="1" <?php
    if ($wew == 1) {
        ?>
      checked="true"
      <?php
    }
    
    ?>> SSL</label><br>
<label><input type="radio" name="smtp_security" value="2" <?php
    if ($wew == 2) {
        ?>
      checked="true"
      <?php
    }
    
    ?>> TLS</label>
  </fieldset>
  
  
  
  <button type="submit" class="btn btn-primary"><?php echo $lang_69; ?></button>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Other Settings</h3>

    <fieldset class="form-group">
    <label for="formGroupExampleInput">WHMCS URL</label>
    <input type="text" class="form-control" name="whmurl" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'whmurl' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset>
  
   <fieldset class="form-group">
    <label for="formGroupExampleInput">Cloudflare</label>
    <input type="text" class="form-control" name="cloudflare" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  'cloudflare' LIMIT 0 , 30";
    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
            printf($row[0]);
        }
        // Free result set
        mysqli_free_result($result);
    }

?>">
  </fieldset><button type="submit" class="btn btn-primary"><?php echo $lang_69; ?></button>
    </div>
    <div id="menu4" class="tab-pane fade">
        
        
        
        
        
        
        
        
        
        
        <h3>Open Authentication</h3>
        <?php
        function ae($c, $d)
        {
            require 'config.php';
            $mysqli = new mysqli();
            $con    = mysqli_connect("$host", "$user", "$pass", "$data");
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>
    
        <p>The Authorized Redirect URL should be <?php echo $actual_link; ?> or <?php echo $actual_link; ?>/action.php?action=login&oauth=<?php echo $c; ?> with the actual url.</p>
         <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $d; ?> Secret Key</label>
    <input type="text" class="form-control" name="<?php echo $c; ?>_secret" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  '" . $c . "_secret' LIMIT 0 , 30";

            if ($result = mysqli_query($con, $sql)) {
                // Fetch one and one row
                while ($row = mysqli_fetch_row($result)) {
                    printf($row[0]);
                }
                // Free result set
                mysqli_free_result($result);
            } ?>">
  </fieldset>
               <fieldset class="form-group">
    <label for="formGroupExampleInput"><?php echo $d; ?> Public Key</label>
    <input type="text" class="form-control" name="<?php echo $c; ?>_public" id="formGroupExampleInput" value="<?php

    $sql = "SELECT value FROM settings WHERE code =  '" . $c . "_public' LIMIT 0 , 30";
            if ($result = mysqli_query($con, $sql)) {
                // Fetch one and one row
                while ($row = mysqli_fetch_row($result)) {
                    printf($row[0]);
                }
                // Free result set
                mysqli_free_result($result);
            } ?>">
  </fieldset><br>
      
        <?php
        }
        ae("github", "Github");
        ae("twitter", "Twitter");
        ae("google", "Google");
        ae("facebook", "Facebook");
        ?>
        <button type="submit" class="btn btn-primary"><?php echo $lang_69; ?></button>
        
        
        
        </div>
  </div>
</form>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         
        var y = $(event.relatedTarget).text();  
        $(".act span").text(x);
        $(".prev span").text(y);
    });
});
</script>

                        </div></div>
                        </div>
                       

<?php require 'includes/classes/footer.class.php'; ?>
