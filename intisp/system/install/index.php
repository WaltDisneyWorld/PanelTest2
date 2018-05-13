<?php
session_start();
if (isset($_GET["d"])) {
    file_put_contents("/var/www/html/interface/data/installed.txt","");
    die("Installation Complete! Please remove the install part of the url now.");
}
?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
    h4 {margin-bottom:3px;}

.nav-pills>li.active>a, .nav-pills>li.active>a:hover, 
.nav-pills>li.active>a:focus {
color: #fff;
background-color: #ff6633;
}
        
a.list-group-item.active>.badge, 
.nav-pills>.active>a>.badge {
color: #ff6633;
background-color: #fff;
}
.inactiveLink {
   pointer-events: none;
   cursor: default;
}
</style>

<div class="col-md-1">
    
    <div class="" id="myWizard">
        <h1>IntISP</h1>
            <ul class="nav nav-pills">
              <li class="disabled active"><a  class="inactiveLink" data-toggle="tab"><span class="badge">1</span><h4>INTRO</h4></a></li>
              <li class="disabled"><a href="#step2" class="inactiveLink" data-toggle="tab"><span class="badge">2</span><h4>EULA</h4></a></li>
              <li class="disabled"><a href="#step3" class="inactiveLink" data-toggle="tab"><span class="badge">3</span><h4>SYSTEM</h4></a></li>
              <li class="disabled"><a href="#step4" class="inactiveLink" data-toggle="tab"><span class="badge">4</span><h4>VERIFY</h4></a></li>
              <li class="disabled"><a href="#step5" class="inactiveLink" data-toggle="tab"><span class="badge">5</span><h4>FINISH</h4></a></li>
            </ul>
        </div>
</div>
<div class="col-md-11">
    
<br><br><br>
  
   <div class="tab-content">
      <div class="tab-pane active" id="step1">
         <h1>Welcome to your IntISP v6 Post Installation Wizard</h1>
         <p>This post installation tool will allow us to make sure everything has been setup correctly. We will ask you a few questions
         to make sure that you will be running a smooth, clean, and working version of INTisp.</p>
         <h3>What is IntISP?</h3>
         <p>INTisp is a hosting control panel, that will manage your server and allow you to make money. IntISP's new innovative and simple
         control panel allows any user to maintain a server.</p>
         <b>This installation will take approx 5 min.</b><br>
         <a class="btn btn-default next" href="?s=1">Continue</a>
      </div>
      <div class="tab-pane" id="step2">
          <h1>Accept our EULA</h1>
         <p><textarea disabled style="width:500px;height:500px;">
End-User License Agreement (EULA) of IntISP

This End-User License Agreement ("EULA") is a legal agreement between you and Adaclare Technologies

This EULA agreement governs your acquisition and use of our IntISP software ("Software") directly from Adaclare Technologies or indirectly through a Adaclare Technologies authorized reseller or distributor (a "Reseller").

Please read this EULA agreement carefully before completing the installation process and using the IntISP software. It provides a license to use the IntISP software and contains warranty information and liability disclaimers.

If you register for a free trial of the IntISP software, this EULA agreement will also govern that trial. By clicking "accept" or installing and/or using the IntISP software, you are confirming your acceptance of the Software and agreeing to become bound by the terms of this EULA agreement.

If you are entering into this EULA agreement on behalf of a company or other legal entity, you represent that you have the authority to bind such entity and its affiliates to these terms and conditions. If you do not have such authority or if you do not agree with the terms and conditions of this EULA agreement, do not install or use the Software, and you must not accept this EULA agreement.

This EULA agreement shall apply only to the Software supplied by Adaclare Technologies herewith regardless of whether other software is referred to or described herein. The terms also apply to any Adaclare Technologies updates, supplements, Internet-based services, and support services for the Software, unless other terms accompany those items on delivery. If so, those terms apply.

License Grant

Adaclare Technologies hereby grants you a personal, non-transferable, non-exclusive licence to use the IntISP software on your devices in accordance with the terms of this EULA agreement.

You are permitted to load the IntISP software (for example a PC, laptop, mobile or tablet) under your control. You are responsible for ensuring your device meets the minimum requirements of the IntISP software.

You are not permitted to:


- Edit, alter, modify, adapt, translate or otherwise change the whole or any part of the Software nor permit the whole or any part of the Software to be combined with or become incorporated in any other software, nor decompile, disassemble or reverse engineer the Software or attempt to do any such things
- Reproduce, copy, distribute, resell or otherwise use the Software for any commercial purpose
- Allow any third party to use the Software on behalf of or for the benefit of any third party
- Use the Software in any way which breaches any applicable local, national or international law
- use the Software for any purpose that Adaclare Technologies considers is a breach of this EULA agreement


Intellectual Property and Ownership

Adaclare Technologies shall at all times retain ownership of the Software as originally downloaded by you and all subsequent downloads of the Software by you. The Software (and the copyright, and other intellectual property rights of whatever nature in the Software, including any modifications made thereto) are and shall remain the property of Adaclare Technologies.

Adaclare Technologies reserves the right to grant licences to use the Software to third parties.

Termination

This EULA agreement is effective from the date you first use the Software and shall continue until terminated. You may terminate it at any time upon written notice to Adaclare Technologies.

This EULA was created by eulatemplate.com for IntISP

It will also terminate immediately if you fail to comply with any term of this EULA agreement. Upon such termination, the licenses granted by this EULA agreement will immediately terminate and you agree to stop all access and use of the Software. The provisions that by their nature continue and survive will survive any termination of this EULA agreement.

Governing Law

This EULA agreement, and any dispute arising out of or in connection with this EULA agreement, shall be governed by and construed in accordance with the laws of [COUNTRY].</textarea></p>
         <a class="btn btn-default next" href="?s=2">I Accept</a>
      </div>
      <div class="tab-pane" id="step3">
          <h1>Basic Requirements</h1>
          <?php
          $failed = false;
         if(version_compare(PHP_VERSION, '7.0.0') >= 0) {
		echo '<li>You need<strong> PHP 7.0.0</strong> (or greater)</li>';
		$failed = true;
	} else {
	echo '<li>You have<strong> PHP 7.0.0</strong> (or greater)</li>';
	}
	if (extension_loaded('mysql') or extension_loaded('mysqli')) {
	    echo '<li>You have the <strong> MySQLi</strong> extention</li>';
	} else {
	     echo '<li>You need the <strong> MySQLi</strong> extention</li>';
	     $failed = true;
	}



	if (!$failed) {
	    ?><a class="btn btn-default next" href="?s=3">Continue</a>
	    <?php
	} else {
	    ?>
	    <b> Please satisfy the requirements</b>
	    <?php
	}
	?>
         
      </div>
      <div class="tab-pane" id="step4">
         <h1>Verify your License</h1>
         <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3"><?php echo $_SERVER['SERVER_ADDR']; ?></h1>
    <p class="lead">This IP will now be recognized by the License Server. In case we decide to make this project cost money. Nothing actually happens here.</p>
  </div>
</div>
         <a class="btn btn-default next" href="?d=true">Continue</a>
      </div>
      <div class="tab-pane" id="step5">
         <p>This is the last step. You're done.</p>
         <a class="btn btn-success first" href="#">Start over</a>
      </div>
   </div>
</div>

	 <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<?php
if (isset($_GET["s"])) {
    if ($_GET["s"] == "1") {
        ?>
        <script>
 var nextId = $(this).parents('.tab-pane').next().attr("id");
  $('[href=#step2]').tab('show');
</script>
        <?php
    }
    if ($_GET["s"] == "2") {
        ?>
        <script>
 var nextId = $(this).parents('.tab-pane').next().attr("id");
  $('[href=#step3]').tab('show');
</script>
        <?php
    }
    if ($_GET["s"] == "3") {
        ?>
        <script>
 var nextId = $(this).parents('.tab-pane').next().attr("id");
  $('[href=#step4]').tab('show');
</script>
        <?php
    }
    if ($_GET["s"] == "4") {
        ?>
        <script>
 var nextId = $(this).parents('.tab-pane').next().attr("id");
  $('[href=#step5]').tab('show');
</script>
        <?php
    }
}
?>

