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
IntISP Web Hosting Solutions
Copyright (C) 2020 Adaclare Technologies

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
</textarea><br> <form method="POST" action="?pg=license&c"> 
  <label><input id="349" type="radio"  name="agree" value="no" checked> I do not agree to the EULA</label>
       <br>
         <label><input id="349" type="radio" name="agree" value="yes"> I have read and I agree to the EULA</label>
         
         
         
<br><br>
<div class="buttons has-addons">
    <a href="?pg=req" class="button">Return</a>
  <input type="submit" class="button" value="Next">
</div>
</form>