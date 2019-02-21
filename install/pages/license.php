<?php
if (!defined('HOMEBASE')) die("Direct Access is Not Allowed");
?>
<h1 class="title">Our License</h1>
<?php
if (isset($_GET["c"])) {
    if ($_POST["agree"] == "no") {
        ?>
    <div class="notification is-danger">
 You cannot use this program if you do not accept the EULA.
</div>
    <?php  
    } else {
        $_SESSION["install_db"] = true;
        ?>
        <script>window.location.href = "index.php?pg=db";</script>
        <a href="index.php?pg=db">Click here</a> if you are not redirected.
        <?php
    }
  
}
?>
<p>Please read the below EULA and select that you accept our terms and conditions.</p><br>
<textarea style="margin: 0px; height: 345px; width: 744px;" disabled>
This End-User License Agreement ("EULA") is a legal agreement between you and Enyrx Technologies
This EULA agreement governs your acquisition and use of our IntISP software ("Software") directly from Enyrx Technologies or indirectly through a Enyrx Technologies authorized reseller or distributor (a "Reseller").
Please read this EULA agreement carefully before completing the installation process and using the IntISP software. It provides a license to use the IntISP software and contains warranty information and liability disclaimers.
If you register for a free trial of the IntISP software, this EULA agreement will also govern that trial. By clicking "accept" or installing and/or using the IntISP software, you are confirming your acceptance of the Software and agreeing to become bound by the terms of this EULA agreement.
If you are entering into this EULA agreement on behalf of a company or other legal entity, you represent that you have the authority to bind such entity and its affiliates to these terms and conditions. If you do not have such authority or if you do not agree with the terms and conditions of this EULA agreement, do not install or use the Software, and you must not accept this EULA agreement.
This EULA agreement shall apply only to the Software supplied by Enyrx Technologies herewith regardless of whether other software is referred to or described herein. The terms also apply to any Enyrx Technologies updates, supplements, Internet-based services, and support services for the Software, unless other terms accompany those items on delivery. If so, those terms apply. 
Enyrx Technologies hereby grants you a personal, non-transferable, non-exclusive licence to use the IntISP software on your devices in accordance with the terms of this EULA agreement.
You are permitted to load the IntISP software (for example a PC, laptop, mobile or tablet) under your control. You are responsible for ensuring your device meets the minimum requirements of the IntISP software.
You are not permitted to:
Edit, alter, modify, adapt, translate or otherwise change the whole or any part of the Software nor permit the whole or any part of the Software to be combined with or become incorporated in any other software, nor decompile, disassemble or reverse engineer the Software or attempt to do any such things
Reproduce, copy, distribute, resell or otherwise use the Software for any commercial purpose
Allow any third party to use the Software on behalf of or for the benefit of any third party
Use the Software in any way which breaches any applicable local, national or international law
use the Software for any purpose that Enyrx Technologies considers is a breach of this EULA agreement
Intellectual Property and Ownership
Enyrx Technologies shall at all times retain ownership of the Software as originally downloaded by you and all subsequent downloads of the Software by you. The Software (and the copyright, and other intellectual property rights of whatever nature in the Software, including any modifications made thereto) are and shall remain the property of Enyrx Technologies.
Enyrx Technologies reserves the right to grant licences to use the Software to third parties.
This EULA agreement is effective from the date you first use the Software and shall continue until terminated. You may terminate it at any time upon written notice to Enyrx Technologies.
It will also terminate immediately if you fail to comply with any term of this EULA agreement. Upon such termination, the licenses granted by this EULA agreement will immediately terminate and you agree to stop all access and use of the Software. The provisions that by their nature continue and survive will survive any termination of this EULA agreement.
This EULA agreement, and any dispute arising out of or in connection with this EULA agreement, shall be governed by and construed in accordance with the laws of us.
</textarea><br> <form method="POST" action="?pg=license&c"> <input type="radio" id="agree" name="agree" value="no"
         checked>
         I do not Accept<br>
           <input type="radio" id="agree" name="agree" value="yes"
         > I Accept
<br><br>
<div class="buttons has-addons">
    <a href="?pg=req" class="button">Back</a>
  <input type="submit" class="button" value="Continue">
</div>
</form>