<?php
if (!defined('HOMEBASE')) {
    die('Direct Access is Not Allowed');
}
?>
<h1 class="title">Our End User License Agreement</h1>
<?php
if (isset($_GET['c'])) {
    if ('no' == $_POST['agree']) {
        ?>
    <div class="notification is-danger">
 You cannot use this program if you do not accept the EULA.
</div>
    <?php
    } else {
        $_SESSION['install_db'] = true; ?>
        <script>window.location.href = "index.php?pg=db";</script>
        <a href="index.php?pg=db">Click here</a> if you are not redirected.
        <?php
    }
}
?>
<p>Please read the below EULA and select that you accept our terms and conditions.</p><br>
<textarea style="margin: 0px; height: 345px; width: 744px;" disabled>
IntISP Web Hosting Suite <?php echo $intisp_ver; ?>

Copyright (c) 2007-2019 Adaclare Technologies
*** END USER LICENSE AGREEMENT ***
IMPORTANT: PLEASE READ THIS LICENSE CAREFULLY BEFORE USING THIS SOFTWARE.
1. LICENSE
By receiving, opening the file package, and/or using IntISP Web Hosting Suite <?php echo $intisp_ver; ?>("Software") containing this software, you agree that this End User User License Agreement(EULA) is a legally binding and valid contract and agree to be bound by it. You agree to abide by the intellectual property laws and all of the terms and conditions of this Agreement.
Unless you have a different license agreement signed by Adaclare Technologies your use of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> indicates your acceptance of this license agreement and warranty.
Subject to the terms of this Agreement, Adaclare Technologies grants to you a limited, non-exclusive, non-transferable license, without right to sub-license, to use IntISP Web Hosting Suite <?php echo $intisp_ver; ?> in accordance with this Agreement and any other written agreement with Adaclare Technologies. Adaclare Technologies does not transfer the title of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> to you; the license granted to you is not a sale. This agreement is a binding legal agreement between Adaclare Technologies and the purchasers or users of IntISP Web Hosting Suite <?php echo $intisp_ver; ?>.
If you do not agree to be bound by this agreement, remove IntISP Web Hosting Suite <?php echo $intisp_ver; ?> from your computer now and, if applicable, promptly return to Adaclare Technologies by mail any copies of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> and related documentation and packaging in your possession.
2. DISTRIBUTION
IntISP Web Hosting Suite <?php echo $intisp_ver; ?> and the license herein granted shall not be copied, shared, distributed, re-sold, offered for re-sale, transferred or sub-licensed in whole or in part except that you may make one copy for archive purposes only. For information about redistribution of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> contact Adaclare Technologies.
3. USER AGREEMENT
3.1 Use
Your license to use IntISP Web Hosting Suite <?php echo $intisp_ver; ?> is limited to the number of licenses purchased by you. You shall not allow others to use, copy or evaluate copies of IntISP Web Hosting Suite <?php echo $intisp_ver; ?>.
3.2 Use Restrictions
You shall use IntISP Web Hosting Suite <?php echo $intisp_ver; ?> in compliance with all applicable laws and not for any unlawful purpose. Without limiting the foregoing, use, display or distribution of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> together with material that is pornographic, racist, vulgar, obscene, defamatory, libelous, abusive, promoting hatred, discriminating or displaying prejudice based on religion, ethnic heritage, race, sexual orientation or age is strictly prohibited.
Each licensed copy of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> may be used on one single computer location by one user. Use of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> means that you have loaded, installed, or run IntISP Web Hosting Suite <?php echo $intisp_ver; ?> on a computer or similar device. If you install IntISP Web Hosting Suite <?php echo $intisp_ver; ?> onto a multi-user platform, server or network, each and every individual user of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> must be licensed separately.
You may make one copy of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> for backup purposes, providing you only have one copy installed on one computer being used by one person. Other users may not use your copy of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> . The assignment, sublicense, networking, sale, or distribution of copies of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> are strictly forbidden without the prior written consent of Adaclare Technologies. It is a violation of this agreement to assign, sell, share, loan, rent, lease, borrow, network or transfer the use of IntISP Web Hosting Suite <?php echo $intisp_ver; ?>. If any person other than yourself uses IntISP Web Hosting Suite <?php echo $intisp_ver; ?> registered in your name, regardless of whether it is at the same time or different times, then this agreement is being violated and you are responsible for that violation!
3.3 Copyright Restriction
This Software contains copyrighted material, trade secrets and other proprietary material. You shall not, and shall not attempt to, modify, reverse engineer, disassemble or decompile IntISP Web Hosting Suite <?php echo $intisp_ver; ?>. Nor can you create any derivative works or other works that are based upon or derived from IntISP Web Hosting Suite <?php echo $intisp_ver; ?> in whole or in part.
Adaclare Technologies's name, logo and graphics file that represents IntISP Web Hosting Suite <?php echo $intisp_ver; ?> shall not be used in any way to promote products developed with IntISP Web Hosting Suite <?php echo $intisp_ver; ?> . Adaclare Technologies retains sole and exclusive ownership of all right, title and interest in and to IntISP Web Hosting Suite <?php echo $intisp_ver; ?> and all Intellectual Property rights relating thereto.
Copyright law and international copyright treaty provisions protect all parts of IntISP Web Hosting Suite <?php echo $intisp_ver; ?>, products and services. No program, code, part, image, audio sample, or text may be copied or used in any way by the user except as intended within the bounds of the single user program. All rights not expressly granted hereunder are reserved for Adaclare Technologies.
3.4 Limitation of Responsibility
You will indemnify, hold harmless, and defend Adaclare Technologies , its employees, agents and distributors against any and all claims, proceedings, demand and costs resulting from or in any way connected with your use of Adaclare Technologies's Software.
In no event (including, without limitation, in the event of negligence) will Adaclare Technologies , its employees, agents or distributors be liable for any consequential, incidental, indirect, special or punitive damages whatsoever (including, without limitation, damages for loss of profits, loss of use, business interruption, loss of information or data, or pecuniary loss), in connection with or arising out of or related to this Agreement, IntISP Web Hosting Suite <?php echo $intisp_ver; ?> or the use or inability to use IntISP Web Hosting Suite <?php echo $intisp_ver; ?> or the furnishing, performance or use of any other matters hereunder whether based upon contract, tort or any other theory including negligence.
Adaclare Technologies's entire liability, without exception, is limited to the customers' reimbursement of the purchase price of the Software (maximum being the lesser of the amount paid by you and the suggested retail price as listed by Adaclare Technologies ) in exchange for the return of the product, all copies, registration papers and manuals, and all materials that constitute a transfer of license from the customer back to Adaclare Technologies.
3.5 Warranties
Except as expressly stated in writing, Adaclare Technologies makes no representation or warranties in respect of this Software and expressly excludes all other warranties, expressed or implied, oral or written, including, without limitation, any implied warranties of merchantable quality or fitness for a particular purpose.
3.6 Governing Law
This Agreement shall be governed by the law of the United States applicable therein. You hereby irrevocably attorn and submit to the non-exclusive jurisdiction of the courts of United States therefrom. If any provision shall be considered unlawful, void or otherwise unenforceable, then that provision shall be deemed severable from this License and not affect the validity and enforceability of any other provisions.
3.7 Termination
Any failure to comply with the terms and conditions of this Agreement will result in automatic and immediate termination of this license. Upon termination of this license granted herein for any reason, you agree to immediately cease use of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> and destroy all copies of IntISP Web Hosting Suite <?php echo $intisp_ver; ?> supplied under this Agreement. The financial obligations incurred by you shall survive the expiration or termination of this license.
4. DISCLAIMER OF WARRANTY
THIS SOFTWARE AND THE ACCOMPANYING FILES ARE SOLD "AS IS" AND WITHOUT WARRANTIES AS TO PERFORMANCE OR MERCHANTABILITY OR ANY OTHER WARRANTIES WHETHER EXPRESSED OR IMPLIED. THIS DISCLAIMER CONCERNS ALL FILES GENERATED AND EDITED BY IntISP Web Hosting Suite <?php echo $intisp_ver; ?> AS WELL.
5. CONSENT OF USE OF DATA
You agree that Adaclare Technologies may collect and use information gathered in any manner as part of the product support services provided to you, if any, related to IntISP Web Hosting Suite <?php echo $intisp_ver; ?>.Adaclare Technologies may also use this information to provide notices to you which may be of use or interest to you.</textarea><br> <form method="POST" action="?pg=license&c"> 
  <label><input id="349" type="radio"  name="agree" value="no" checked> I do not agree to the EULA</label>
       <br>
         <label><input id="349" type="radio" name="agree" value="yes"> I have read and I agree to the EULA</label>
         
         
         
<br><br>
<div class="buttons has-addons">
    <a href="?pg=req" class="button">Return</a>
  <input type="submit" class="button" value="Next">
</div>
</form>