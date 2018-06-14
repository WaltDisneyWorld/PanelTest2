<?php

//////////////////////////////////////////////////////////////
//===========================================================
// restore_theme.php
//===========================================================
// SOFTACULOUS 
// Version : 1.1
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Alons
// Date:       10th Jan 2009
// Time:       21:00 hrs
// Site:       http://www.softaculous.com/ (SOFTACULOUS)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
//===========================================================
// (c)Softaculous Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('SOFTACULOUS')){

	die('Hacking Attempt');

}

function restore_theme(){

	global $user, $globals, $l, $theme, $softpanel, $iscripts, $catwise, $error, $scripts, $_insid, $dbexist, $restored, $datadir, $wwwdir;
	global $backups, $deleted, $soft, $backupinfo;
	
	// Give the staus
	if(optGET('ajaxstatus')){
		
		$_status = soft_progress(optGET('ajaxstatus'));
		
		$tmp_status = unserialize($_status[1]);
		$_status[1] = $tmp_status['current_status'];
		
		if(!empty($_status)){
			echo implode('|', $_status);
			return true;
		}
		
		// False call
		echo 0;
		return false;
	
	}
	softheader($l['<title>']);	
	echo '
	<div id="install_win">';
	
		if(!empty($restored)){
			
			echo '
			<div class="bg"><br />
				<div class="alert alert-warning">
					<center><img src="'.$theme['images'].'notice.gif" /> &nbsp; '.$l['restore'].'
					<center><b><a href="'.script_link($soft).'&highlight='.$backupinfo['insid'].'&postact=restore"></a></b></center></center>
				</div>
				<br />
				<center><b><a href="'.script_link($soft).'" class="sai_head">'.$l['return'].'</a></b></center><br /><br />
			</div>
		
			<!--PROC_DONE-->';
			
		}else{
			
			echo '
			<div id="fadeout_div">
				<form accept-charset="'.$globals['charset'].'" name="restore" method="post" action="" onsubmit="return checkform();" id="restore">
				
					<script language="javascript" type="text/javascript"><!-- // --><![CDATA[
					function checkform(dosubmit){
						var conf = confirm(\''.$l['confirm_restore'].'\');
						if(conf){
							$_("restorebtn").disabled = true;
							if(useprog){
						
								// Send a request to check the status
								progressbar.start();
								
								// Return false so that the form is not submitted
								return false;
							
								// This is OLD School !
							}
							
							return true;
						}else{
							return false;
						}
					}	
					
					var progressbar = {
						timer: 0,
						total_width: 0,	
						status_key: "",
						synctimer: 0,
						fadeout_div: "#fadeout_div",
						win_div: "#install_win",
						progress_div: "#progress_bar",
						formid: "#restore",
						frequency: 8000,
						
						current: function(){
							try{
								var tmp_cur = Math.round(parseInt($_("progress_color").width)/parseInt($_("table_progress").width)*100);
								if(tmp_cur > 100){
									tmp_cur = 99;
								}
								return tmp_cur;
							}catch(e){
								return -1;	
							}
						},
						
						reset: function(){ try{
							clearTimeout(this.timer);
							$_("progress_color").width = 1;
						}catch(e){ }},
						
						move: function(dest, speed, todo){ try{
							var cur = this.current();
							if(cur < 0){
								clearTimeout(this.timer);
								return false;
							}
							var cent = cur + 1;
							var new_width = cent/100*this.total_width;
							if(new_width < 1){
								new_width = 1;
							}
							//alert(new_width+" "+dest+" "+cent);
							
							$_("progress_color").width = new_width;
							$_("progress_percent").innerHTML = "("+cent+" %)";
							
							if(cent < dest){
								this.timer = setTimeout("progressbar.move("+dest+", "+speed+")", speed);
							}else{
								eval(todo);	
							}
						}catch(e){ }},
						
						text: function(txt){ try{
							$_("progress_txt").innerHTML = txt;
						}catch(e){ }},
						
						sync: function(){
							if(progressbar.status_key.length < 2){
								return false;
							}
							$.ajax({
								url: window.location+"&ajaxstatus="+progressbar.status_key+"&random="+Math.random(),
								type: "GET",
								success: function(data){
									if(data == 0) return false;
									var tmp = data.split("|");
									var cur = progressbar.current();
									tmp[2] = (3000/(tmp[0]-cur));
									//alert(tmp);
									if(tmp[0] > cur){
										if(parseInt(tmp[2]) == 0){
											tmp[2] = 800;
										}
										progressbar.move(tmp[0], tmp[2]);
									}
									progressbar.text(tmp[1]);
									progressbar.synctimer = setTimeout("progressbar.sync()", progressbar.frequency);
								}
							});
						},
						
						sync_abort: function(){
							clearTimeout(this.synctimer);
						},
						
						start: function(){ try{
							this.post();
							this.reset();
							this.total_width = parseInt($_("table_progress").width);
							this.move(95, 800);
							this.status_key = $("#soft_status_key").attr("value");
							this.sync();
						}catch(e){ }},
						
						post: function(){
							
							// Scroll to the Top and show the progress bar
							goto_top();
							$(progressbar.fadeout_div).fadeOut(500, 
								function(){
									$(progressbar.progress_div).fadeOut(1);
									$(progressbar.progress_div).fadeIn(500);
								}
							);
							
							$.ajax({
								url: window.location+"&jsnohf=1",
								type: "POST",
								data: $(progressbar.formid).serialize(),
								complete: function( jqXHR, status, responseText ) {
									
									progressbar.sync_abort();
									
									// Store the response as specified by the jqXHR object
									responseText = jqXHR.responseText;
									
									try{
										//alert(responseText);
										if(responseText.match(/\<\!\-\-PROC_DONE\-\-\>/gi)){
											progressbar.text("'.addslashes($l['finishing_process']).'");
											progressbar.move(99, 10, "$(progressbar.progress_div).fadeOut(1)");
									
										}else{
											progressbar.reset();
										}
									}catch(e){ }
									
									if ( jqXHR.state() == "resolved" ) {
									
										// #4825: Get the actual response in case
										// a dataFilter is present in ajaxSettings
										jqXHR.done(function( r ) {
											responseText = r;
										});
								
										// Create a dummy div to hold the results
										// inject the contents of the document in, removing the scripts
										// to avoid any "Permission Denied" errors in IE
										var newhtml = jQuery("<div>").append(responseText).find(progressbar.win_div).html();
										
										$(progressbar.win_div).animate({opacity: 0}, 1000, "", function(){
											$(progressbar.win_div).html(newhtml);
											new_theme_funcs_init();
										}).delay(50).animate({opacity: 1}, 500);
										
										//alert(newhtml);
										
									}else{
										alert("Oops ... the connection was lost");
									}
								}
							});
						}
					};
					
						
					// Use the Progress Bar ?
					var useprog = 1;
					try{
						if(BrowserDetect.browser.toLowerCase() == "safari" && BrowserDetect.version.toString().substr(0, 1) == "3"){
							useprog = 0;
						}
					}catch(e){ }
					
					// ]]></script>
				
				
					<div class="bg"><br />
						<div class="row sai_main_head" style="width:100%;" align="center">
							<div class="col-sm-5 col-xs-5" style="padding:0 10px 0 0; text-align:right;">
								<i class="fa sai-restore fa-2x" style="color:#00A0D2;"></i>
							</div>
							<div class="col-sm-7 col-xs-7" style="padding-top:10px; padding-left:0; text-align:left;">'.$l['prog_restoring'].$iscripts[$soft]['name'].'</div>
						</div>
						<hr><br />';
						
						echo error_handle($error, "100%", 0, 1);						
						
						echo '
						<div class="row">
							<div class="col-sm-5">
								<label class="sai_head">'.$l['restore_dir'].'</label><br />
								<span class="sai_exp2">'.$l['restore_dir_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="checkbox" name="restore_dir" '.POSTchecked('restore_dir', true).' />
							</div>
						</div><br />';
						
						// Web directory ?
						if(!empty($wwwdir)){
						
							echo '
							<div class="row">
								<div class="col-sm-5">
									<label class="sai_head">'.$l['restore_wwwdir'].'</label><br />
									<span class="sai_exp2">'.$l['restore_wwwdir_exp'].'</span>
								</div>
								<div class="col-sm-7">
									<input type="checkbox" name="restore_wwwdir" '.POSTchecked('restore_wwwdir', true).' />
								</div>
							</div><br />';		
						}
					
						// Data directory ?
						if(!empty($datadir)){
							
							echo '
							<div class="row">
								<div class="col-sm-5">
									<label class="sai_head">'.$l['restore_datadir'].'</label><br />
									<span class="sai_exp2">'.$l['restore_datadir_exp'].'</span>
								</div>
								<div class="col-sm-7">
									<input type="checkbox" name="restore_datadir" '.POSTchecked('restore_datadir', true).' />
								</div>
							</div><br />';	
						}
					
						if(!empty($dbexist)){
							
							echo '
							<div class="row">
								<div class="col-sm-5">
									<label class="sai_head">'.$l['restore_db'].'</label><br />
									<span class="sai_exp2">'.$l['restore_db_exp'].'</span>
								</div>
								<div class="col-sm-7">
									<input type="checkbox" name="restore_db" '.POSTchecked('restore_db', true).' />
								</div>
							</div><br />';		
						}
						
						echo '<br /><br />
						<p align="center">
							<input type="hidden" name="restore_ins" value="1" />
							<input type="hidden" name="soft_status_key" id="soft_status_key" value="'.POSTval('soft_status_key', generateRandStr(32)).'" />
							<input type="submit" name="restorebtn" class="flat-butt" id="restorebtn" value="'.$l['restore_ins'].'"  />
						</p>
						<br /><br />
						<center><b><a href="'.script_link($soft).'" class="sai_head">'.$l['return'].'</a></b></center><br /><br />				
					</div><br /><!--end of bg class-->
				</form>
			</div>			
			
			<div id="progress_bar" style="display: none; width: 100%;">
				<br />
				<div class="bg">
					<center>
						<div class="row sai_main_head" style="width:100%;" align="center">
							<div class="col-sm-5 col-xs-5" style="padding:0 10px 0 0; text-align:right;">
								<i class="fa sai-restore fa-2x" style="color:#00A0D2;"></i>
							</div>
							<div class="col-sm-7 col-xs-7" style="padding-top:10px; padding-left:0; text-align:left;">'.$l['prog_restoring'].$iscripts[$soft]['name'].'</div>
						</div><br />
					<center>
						<font size="4" color="#222222" id="progress_txt" style="width: 100%;">'.$l['checking_data'].'</font>
						<font style="font-size: 18px;font-weight: 400;color: #444444; width: 100%;" id="progress_percent">(0 %)</font><br /><br />
					</center>
					<table width="500" cellpadding="0" cellspacing="0" id="table_progress" border="0" align="center" height="28" style="border:1px solid #CCC; -moz-border-radius: 5px;
				-webkit-border-radius: 5px; border-radius: 5px; width: 50%;">
						<tr>
							<td id="progress_color" width="1" style="background-image: url('.$theme['images'].'bar.gif); -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;"></td>
							<td id="progress_nocolor">&nbsp;</td>
						</tr>
					</table>
					<br /><center>'.$l['wait_note'].'</center><br />
					<center><b><a href="'.script_link($soft).'">'.$l['return'].'</a></b></center><br /><br />
				</div>
			</div><br /><br />';
		}
	
	echo '
	</div>';
	
	softfooter();

}

?>