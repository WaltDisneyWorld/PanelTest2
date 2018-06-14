<?php

//////////////////////////////////////////////////////////////
//===========================================================
// import_theme.php
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


function import_theme(){

	global $user, $globals, $l, $theme, $softpanel, $iscripts, $catwise, $error, $scripts;
	global $software, $soft, $info, $settings, $softins, $dbtype, $dbs, $imported, $remote_imported, $__settings, $setupcontinue, $installations, $notes, $protocols, $ajaxhttpsexists, $ajaxhttps, $ajaxdb, $ajaxdbexists, $can_import, $overwrite_option;
	
	if(!empty($ajaxhttps)){
		echo $ajaxhttpsexists;
		return true;
	}

	if(!empty($ajaxdb)){
		echo $ajaxdbexists;
		return true;
	}
	
	softheader($l['<title>'].$software['name']);
	
	//First add the installation info
	if(empty($imported) && empty($remote_imported)){
		
		echo '
		<link rel="stylesheet" type="text/css" href="'.$theme['url'].'/spectrum.css?'.$GLOBALS['globals']['version'].'" />
		<form accept-charset="'.$globals['charset'].'" name="importsoftware" method="post" action="" onsubmit="return checkform();" class="form-horizontal">';
			
			if(!empty($can_import)){
				echo '<script language="javascript" type="text/javascript"><!-- // --><![CDATA[
			
				$(document).ready(function(){
					check_auth_password();
					checkprotocol();
					handle_remote_form();
					var page = "'.$_POST['remote_submit'].'";
					if(page){
						toggle_rimport(1);
					}
				});
				
				function handle_remote_form(){
					$(\'#auth_password\').change(function(){
						if($(this).is(":checked")) {
							hide_sshkey();
						}else{
							show_sshkey();
						}
					});
					
					$("#remote_imp_but").click(function(){
						checkprotocol();
						toggle_rimport(1);
					});
					
					$("#remote_imp_but_res").click(function(){
						checkprotocol();
						toggle_rimport(1);
					});

					$("#local_imp_but").click(function(){
						toggle_rimport();
					});
					
					$("#local_imp_but_res").click(function(){
						toggle_rimport();
					});
					
					$(\'#protocol\').change(function(){
						checkprotocol();
					});
				}

				function checkprotocol(){
					
					$(\'#ftp_user_head\').html($(\'#protocol\').val().toUpperCase()+" "+"'.$l['ftp_user'].'");
					$(\'#ftp_pass_head\').html($(\'#protocol\').val().toUpperCase()+" "+"'.$l['ftp_pass'].'");
					$(\'#ftp_path_head\').html($(\'#protocol\').val().toUpperCase()+" "+"'.$l['ftp_path'].'");
					
					if($(\'#protocol\').val() == \'ftp\'){
						if($(\'#port\').val() == "" || $(\'#port\').val() == "22"){
							$(\'#port\').val(\'21\');
						}
						$(\'#trauthpass\').hide();
						hide_sshkey();
						ftppath();
					}
					if($(\'#protocol\').val() == \'ftps\'){
						
						if($(\'#port\').val() == "" || $(\'#port\').val() == "22"){
							$(\'#port\').val(\'21\');
						}
						$(\'#trauthpass\').hide();
						hide_sshkey();
						ftppath();
					}
					if($(\'#protocol\').val() == \'sftp\'){
						if($(\'#port\').val() == "" || $(\'#port\').val() == "21"){
							$(\'#port\').val(\'22\');
						}
						$(\'#trauthpass\').show();
						if($(\'#auth_password\').is(":checked")){
							hide_sshkey();
						}else{
							show_sshkey();
							
						}
						sftppath();
					}
				}
				
				function toggle_rimport(show){
					if(show){
						$("#local_import").hide();
						$("#remote_import").show();					
						$("#remote_sub_btn").show();
						$("#local_sub_btn").hide();					
					}else{
						$("#remote_import").hide();
						$("#local_import").show();				
						$("#remote_sub_btn").hide();
						$("#local_sub_btn").show();					
					}
				}

				function ftppath(){
					$(\'#ftp_path\').html("'.$l['ftp_path'].'");
					$(\'#ftp_path_exp\').html("'.$l['ftp_path_exp'].'");
					$(\'#backup_path_exp\').html("'.$l['backup_path_exp'].'");
				}

				function sftppath(){
					$(\'#ftp_path\').html("'.$l['sftp_path'].'");
					$(\'#ftp_path_exp\').html("'.$l['sftp_path_exp'].'");
					$(\'#backup_path_exp\').html("'.$l['sbackup_path_exp'].'");
				}
				function toggle_advoptions(ele){
					//alert("#"+ele);
					if ($("#"+ele).is(":hidden")){
						$("#"+ele).slideDown("slow");
						$("#"+ele+"_toggle_plus").attr("src", "'.$theme['images'].'minus_new.gif");
					}
					else{
						$("#"+ele).slideUp("slow");
						$("#"+ele+"_toggle_plus").attr("src", "'.$theme['images'].'plus_new.gif");
					}
				}
				
				function checkdbname(id, alrt){
					try{		
						AJAX("'.$globals['index'].'act=import&soft='.$soft.'&checkdbexists="+$_(id).value, "dbexists(\'"+id+"\', "+alrt+", re)");	
					}catch(e){
						//
					}
					return true;
				};

				function dbexists(id, alrt, re){
					try{
						
						dberror = "";
						
						//Is the length fine
						if($_(id).value.length > '.(empty($softpanel->maxdblen) ? 7 : $softpanel->maxdblen).'){
							dberror = "'.$l['db_name_long'].'";
						}
						
						//There should be only alphanumeric characters
						if(/[^a-zA-Z0-9]/.test($_(id).value) && !'.aefer().'0){
							dberror = "'.$l['db_alpha_num'].'";
						}
						
						//Check if it exists
						if(re == "true"){
							dberror = "'.$l['database_exists'].'";
						}
						
						if(dberror != ""){
							$_(id+"error").style.display = "block";
							$_(id+"error").innerHTML = dberror;
							if(alrt == true){
								alert(dberror);
							}
							return false;
						}else{
							$_(id+"error").style.display = "none";
						}
						
					}catch(e){
						//
					}
					return true;
				}
				
				function check_auth_password(){
					if($("#auth_password").is(":checked")){
						hide_sshkey();
					}else{
						show_sshkey();
					}
				}

				function hide_sshkey(){
						$("#private_key").prop("disabled", true);
						$("#pri").hide();
						$("#passphrase").hide();
						$("#ftp_pass").show();
					}

				function show_sshkey(){
					$("#private_key").prop("disabled", false);
					$("#pri").show();
					$("#passphrase").show();
					$("#ftp_pass").hide();
				}
				// ]]></script>
				
				<script language="JavaScript" src="'.$theme['url'].'/js/tabber.js" type="text/javascript"></script>
				<script type="text/javascript">
					tabs = new tabber;
					tabs.tabs = new Array(\'local_imp_but\', \'remote_imp_but\');
					var page = "'.$_POST['remote_submit'].'";
					if(page){
						tabs.inittab = \'remote_imp_but\';						
					}else{
						tabs.inittab = \'local_imp_but\';						
					}
					addonload(\'tabs.init();\');
				</script>';
			}
			
			echo '<script language="javascript" type="text/javascript"><!-- // --><![CDATA[
			function checkhttps(proto_id, softdomain_id, alrt){ 
				try{
					var id = $_(proto_id);
					var proto = id.options[id.selectedIndex].text;
				
					$("#checkhttps_wait").css("display","inline-block");
					if(proto.indexOf("https") !== -1){
					
						 $.ajax({
							type: "POST",
							url: "'.$globals['index'].'act=import&soft='.$soft.'&checkhttps="+encodeURIComponent(proto+$_(softdomain_id).value),
							timeout:10000,
							// Checking for error
							success: function(data){
								$("#checkhttps_wait").css("display","none");
								is_https(data);
							},
							error: function(jqXHR, status, e) {
								$("#checkhttps_wait").css("display","none");
								is_https(e);
								return false;
							}
						}); 
						
						//AJAX("'.$globals['index'].'act=import&soft='.$soft.'&checkhttps="+id.options[id.selectedIndex].text+$_(softdomain_id).value, "is_https(re)");
					}else{
						$("#checkhttps_wait").css("display","none");
						is_https("true");
					}
					if(alrt == true){
						alert(proto+$_(softdomain_id).value);
					}
				}catch(e){
					//
				}
				return true;
			};
			
			function is_https(re){
				try{
					httpserror = "";
					
					//Check if it exists
					if(re !== "true"){
						httpserror = "'.$l['no_https'].'";
					}
					if(httpserror != ""){
						$_("httpserror").style.display = "block";
						$_("httpserror").innerHTML = httpserror;
						return false;
					}else{
						$_("httpserror").style.display = "none";
					}
					
				}catch(e){
					//
				}
				return true;
			};
			
			function checkform(){
				try{
					if(!formcheck() || !checkdbname(\'softdb\', true)){
						return false;
					}
				}catch(e){
					//Do nothing
				}
				return true;
			};
			// ]]></script>
			
			<div class="bg"><br />
				<div class="row">
					<div class="col-sm-3"></div>
					
					<div class="sai_main_head col-sm-6" align="center">
					<img src="'.$globals['softimages'].'top15/48/'.$scripts[$soft]['softname'].'.png" > '.$l['import_soft'].' - '.$software['name'].'
					</div>			
				</div><br /><br />';
				
				if(!empty($can_import)){
					echo '<div class="old_tab">
						<table width="100%" cellpadding="0" cellspacing="0" border="0" class="sai_tabs">
							<tr>
								<td width="50%"><a class="sai_tab" href="javascript:tabs.tab(\'local_imp_but\')" id="local_imp_but">'.$l['local_btn'].'</a></td>
								<td><a class="sai_tab" href="javascript:tabs.tab(\'remote_imp_but\')" id="remote_imp_but">'.$l['remote_btn'].'</a></td>
							</tr>
						</table><br />
					</div>
					
					<div class="new_tab">
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>                        
								</button>
								<ul class="nav">
									
								</ul>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar" style="position:absolute; z-index:1000; width:100%; background:#F8F8F8;">
								<ul class="nav navbar-nav">
									<li><a href="javascript:tabs.tab(\'local_imp_but\')" id="local_imp_but_res" class="sai_tab2" style="text-decoration:none;" data-toggle="collapse" data-target="#myNavbar">'.$l['local_btn'].'</a></li>
									<li><a href="javascript:tabs.tab(\'remote_imp_but\')" id="remote_imp_but_res" class="sai_tab2" style="text-decoration:none;" data-toggle="collapse" data-target="#myNavbar">'.$l['remote_btn'].'</a></li>
								</ul>
							</div>
						</nav>
					</div>';
				}
				
				if(empty($globals['lictype']) && !empty($scripts[$soft]['force_scripts'])){
					echo '<center class="alert alert-warning">'.lang_vars($l['not_in_free'], array($software['name'])).(!webuzo() ? '&nbsp;&nbsp;'.$l['notify_admin'] : '').'</center>';
				}
				
				error_handle($error, "100%");
				
				if(!empty($can_import)){
				
					$dbname = mysqldbname($software['softname']);
		
					if(method_exists($softpanel, 'mysqldbname')){
						$dbname = $softpanel->mysqldbname();
					}
					
					$install = @implode('', file($software['path'].'/install.xml'));

					if(preg_match('/<db>mysql<\/db>/is', $install)){
						$has_db = 1;
					}
				}
				
				if(empty($softpanel->noprotocol) && empty($globals['hide_protocol'])){
				
					if(empty($can_import)) echo '<hr />';
					
					echo '
					<div class="bg2" id="local_import" '.(isset($_POST['remote_submit']) ? 'style="display:none;"' : '').'><br />
						<div class="row">
							<div class="col-sm-5">
								<label for="softproto" class="sai_head">'.$l['choose_protocol'].'</label>
								<span class="sai_exp">'.$l['choose_protocol_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<select name="softproto" id="softproto" class="form-control" onblur="checkhttps(\'softproto\', \'softdomain\', false)">';
									foreach($protocols as $k => $v){
										echo '<option value="'.$k.'" '.(optPOST('softproto') == $k || ($globals['default_protocol'] == $k && empty($_POST['softproto'])) ? 'selected="selected"' : '').'>'.$v.'</option>';
									}
								echo '
								</select>
								<div style="display:none;" id="checkhttps_wait">&nbsp;&nbsp;<img src="'.$theme['images'].'progress.gif" alt="please wait.."></div><br />
								<div class="row">
									<div class="col-sm-12">
										<span id="httpserror" style="display:none; font-size:12px; padding:10px;" class="alert alert-warning"></span>
									</div>
								</div>
							</div>
						</div>';
					}
					
					echo '
					<div class="row">
						<div class="col-sm-5">
							<label for="softdomain" class="sai_head">'.$l['choose_domain'].'</label>
							<span class="sai_exp">'.$l['choose_domain_exp'].'</span>
						</div>
						<div class="col-sm-7">
							<select name="softdomain" id="softdomain" class="form-control" onblur="checkhttps(\'softproto\', \'softdomain\', false)">';
								foreach($softpanel->domainroots as $domain => $dompath){
									echo '<option value="'.$domain.'" '.((!empty($_POST['softdomain']) && $_POST['softdomain'] == $domain) ? 'selected="selected"' : '').'>'.$domain.'</option>';
								}
								// For PERL Append /cgi-bin/ in front of textbox
								$perl = ($iscripts[$soft]['type'] == 'perl' ? (empty($softpanel->user['cgi-bin']) ? '' : $softpanel->user['cgi-bin']) : '');
							echo '
							</select>
						</div>
					</div><br />
					
					<div class="row">
						<div class="col-sm-5">
							<label for="softdirectory" class="sai_head">'.$l['in_directory'].'</label><br />
							<span class="sai_exp2">'.$l['in_directory_exp'].'</span>
						</div>
						<div class="col-sm-7">
							<span style="font-size: 14px; color: #555;">'.(!empty($perl) ? $perl.'/' : '').'</span><input type="text" name="softdirectory" id="softdirectory" class="form-control" size="30" value="'.POSTval('softdirectory', '').'" />
						</div>
					</div><br />
				</div>
				<p align="center">
					<input type="submit" id="local_sub_btn" class="flat-butt" name="softsubmit" value="'.$l['softsubmit'].'"/><br /><img id="waiting" src="'.$theme['images'].'progress.gif" style="display:none">
				</p>
				<input type="hidden" name="soft_status_key" id="soft_status_key" value="'.POSTval('soft_status_key', generateRandStr(32)).'" />
				</form>
				<form accept-charset="'.$globals['charset'].'" name="importsoftware_r" method="post" action="" onsubmit="return checkform();" class="form-horizontal">';
				if(!empty($can_import)){
					echo '<div id="remote_import" '.(!isset($_POST['remote_submit']) ? 'style="display:none;"' : '').'>
					<div style="padding: 0 25px;">
						<div class="sai_main_head">'.$l['source'].'</div><hr>
						<div class="row">
							<div class="col-sm-5">
								<label for="domain" class="sai_head">'.$l['domain'].'</label><br />
								<span class="sai_exp2">'.$l['domain_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="domain" id="domain" class="form-control" value="'.POSTval('domain', '').'" />
							</div>
						</div><br />
						
						<div class="row">
							<div class="col-sm-5">
								<label for="server_host" class="sai_head">'.$l['server_host'].'</label>
								<span class="sai_exp">'.$l['server_host_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="server_host" id="server_host" class="form-control" value="'.POSTval('server_host', '').'" />
							</div>
						</div><br />
						
						<div class="row">
							<div class="col-sm-5">
								<label for="protocol" class="sai_head">'.$l['protocol'].'</label>
								<span class="sai_exp">'.$l['protocol_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<select name="protocol" class="form-control" id="protocol">
									<option value="ftp" '.(isset($_POST['protocol']) && $_POST['protocol'] == 'ftp' ? 'selected="selected"' : '').'>FTP</option>
									<option value="ftps" '.(isset($_POST['protocol']) && $_POST['protocol'] == 'ftps' ? 'selected="selected"' : '').'>FTPS</option>
									<option value="sftp" '.(isset($_POST['protocol']) && $_POST['protocol'] == 'sftp' ? 'selected="selected"' : '').'>SFTP</option> 
								</select>
							</div>
						</div><br />
					
						<div class="row">
							<div class="col-sm-5">
								<label for="port" class="sai_head">'.$l['port'].'</label>
								<span class="sai_exp">'.$l['port_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="port" id="port" class="form-control" value="'.POSTval('port', '').'" />
							</div>
						</div><br />
						
						<div class="row">
							<div class="col-sm-5">
								<label for="ftp_user" class="sai_head" id="ftp_user_head">'.$l['ftp_user'].'</label><br />
								<span class="sai_exp2">'.$l['ftp_user_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="ftp_user" id="ftp_user" class="form-control" value="'.POSTval('ftp_user', '').'" />
							</div>
						</div><br />
						
						<div class="row" id="ftp_pass">
							<div class="col-sm-5">
								<label for="ftp_passwd" class="sai_head" id="ftp_pass_head">'.$l['ftp_pass'].'</label><br />
								<span class="sai_exp2">'.$l['ftp_pass_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<div class="row">
									<div class="col-sm-11">
									<input type="password" name="ftp_pass" id="ftp_passwd" class="form-control" value="'.POSTval('ftp_pass', '').'" autocomplete="off" />
									</div>
									<div class="col-sm-1" style="margin-left:-20px;">
									<input id="toggle_passwd" type="checkbox" style="display:none;" onclick="toggle_pass(\'show_hide\', \'ftp_passwd\');" /><label for="toggle_passwd" style="margin-top:6px;"><span id="show_hide">Show</span></label>
									</div>
								</div><br />
							</div>
						</div>
		
						<div class="row" id="trauthpass">
							<div class="col-sm-5">
								<label for="auth_password" class="sai_head">'.$l['auth_password'].'</label>
								<span class="sai_exp">'.$l['auth_password_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="radio" name="auth_password" id="auth_password" value="1" onchange="check_auth_password();" '.POSTradio('auth_password', 1, 1).' />&nbsp;'.$l['auth_method_pass'].' &nbsp;&nbsp;
								<input type="radio" name="auth_password" id="auth_password" value="" onchange="check_auth_password();" '.POSTradio('auth_password', '').' />&nbsp;'.$l['auth_method_key'].'<br /><br />
							</div>
						</div>
						
						<div class="row" id="pri">
							<div class="col-sm-5">
								<label for="private_key" class="sai_head">'.$l['private_key'].'</label><br />
								<span class="sai_exp2">'.$l['private_key_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<textarea name="private_key" id="private_key" rows="15" cols="70" class="form-control">'.aPOSTval('private_key').'</textarea><br />
							</div>
						</div>
						
						<div class="row" id="passphrase">
							<div class="col-sm-5">
								<label for="passphrase" class="sai_head">'.$l['passphrase'].'</label><br />
								<span class="sai_exp2">'.$l['passphrase_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="passphrase" id="passphrase" class="form-control" value="'.POSTval('passphrase', '').'" /><br />
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-5">
								<label for="ftp_path" class="sai_head" id="ftp_path_head">'.$l['ftp_path'].'</label><br />
								<span class="sai_exp2" id="ftp_path_exp">'.$l['ftp_path_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="ftp_path" id="ftp_path" class="form-control" value="'.POSTval('ftp_path', '').'" />
							</div>
						</div><br />
						
						<div class="row">
							<div class="col-sm-5">
								<label for="Installed_path" class="sai_head">'.$l['Installed_path'].'</label><br />
								<span class="sai_exp2">'.$l['Installed_path_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<input type="text" name="Installed_path" id="Installed_path" class="form-control" value="'.POSTval('Installed_path', '').'" />
							</div>
						</div><br />
						</div>
						
						<div class="bg">
						<div class="sai_main_head">'.$l['destination'].'</div><hr>
						<div class="row">
							<div class="col-sm-5">
								<label for="softproto" class="sai_head">'.$l['choose_protocol'].'</label>
								<span class="sai_exp">'.$l['choose_protocol_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<select name="softproto" id="softproto" class="form-control" onblur="checkhttps(\'softproto\', \'softdomain\', false)">';
									foreach($protocols as $k => $v){
										echo '<option value="'.$k.'" '.(optPOST('softproto') == $k || ($globals['default_protocol'] == $k && empty($_POST['softproto'])) ? 'selected="selected"' : '').'>'.$v.'</option>';
									}
								echo '
								</select>
								<div style="display:none;" id="checkhttps_wait">&nbsp;&nbsp;<img src="'.$theme['images'].'progress.gif" alt="please wait.."></div><br />
								<div class="row">
									<div class="col-sm-12">
										<span id="httpserror" style="display:none; font-size:12px; padding:10px;" class="alert alert-warning"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
								<label for="softdomain" class="sai_head">'.$l['choose_domain'].'</label>
								<span class="sai_exp">'.$l['choose_domain_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<select name="softdomain" id="softdomain" class="form-control" onblur="checkhttps(\'softproto\', \'softdomain\', false)">';
									foreach($softpanel->domainroots as $domain => $dompath){
										echo '<option value="'.$domain.'" '.((!empty($_POST['softdomain']) && $_POST['softdomain'] == $domain) ? 'selected="selected"' : '').'>'.$domain.'</option>';
									}
									// For PERL Append /cgi-bin/ in front of textbox
									$perl = ($iscripts[$soft]['type'] == 'perl' ? (empty($softpanel->user['cgi-bin']) ? '' : $softpanel->user['cgi-bin']) : '');
								echo '
								</select>
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-5">
								<label for="dest_directory" class="sai_head">'.$l['in_directory'].'</label><br />
								<span class="sai_exp2">'.$l['in_directory_exp'].'</span>
							</div>
							<div class="col-sm-7">
								<span style="font-size: 14px; color: #555;">'.(!empty($perl) ? $perl.'/' : '').'</span><input type="text" name="dest_directory" id="dest_directory" class="form-control" size="30" value="'.POSTval('dest_directory', '').'" />
							</div>
						</div><br />';
						
						if(aefer() && empty($softpanel->auto_managedb) && !empty($has_db)){
							
							echo '<div class="row">
									<div class="col-sm-5">
										<label for="softdb" class="sai_head">'.$l['database_name'].'</label><br />
										<span class="sai_exp2">'.$l['database_name_exp_aefer'].'</span>
									</div>
									<div class="col-sm-7">
										<input type="text" name="softdb" class="form-control" id="softdb" size="30" value="'.POSTval('softdb', $dbname).'" onblur="checkdbname(\'softdb\', false)" />
										<span id="softdberror" style="background: #FDB3B3; display:none; width:200px;"></span>
									</div>
								</div><br />';
						}
						
						if(!empty($softpanel->no_db_create) && !empty($has_db)){
							echo '<div class="row">
									<div class="col-sm-5">
										<label for="dbusername" class="sai_head">'.$l['dbusername'].'</label><br />
										<span class="sai_exp2">'.$l['dbusername_exp'].'</span>
									</div>
									<div class="col-sm-7">
										<input type="text" name="dbusername" class="form-control" id="dbusername" size="30" value="'.POSTval('dbusername', '').'" />
									</div>
								</div><br />
								
								<div class="row">
									<div class="col-sm-5">
										<label for="dbuserpass" class="sai_head">'.$l['dbuserpass'].'</label><br />
										<span class="sai_exp2">'.$l['dbuserpass_exp'].'</span>
									</div>
									<div class="col-sm-7">
										<div class="row">
											<div class="col-sm-11">
												<input type="password" name="dbuserpass" class="form-control" id="dbuserpass" size="30" value="'.POSTval('dbuserpass', '').'" />
											</div>
											<div class="col-sm-1" style="margin-left:-20px;">
												<input id="toggle_pass_db_pass" type="checkbox" style="display:none;" onclick="toggle_pass(\'show_hide_db_pass\', \'dbuserpass\');"/><label for="toggle_pass_db_pass" style="margin-top:6px;"><span id="show_hide_db_pass">Show</span></label>
											</div>
										</div>
									</div>
								</div><br />
								
								<div class="row">
									<div class="col-sm-5">
										<label for="hostname" class="sai_head">'.$l['hostname'].'</label><br />
										<span class="sai_exp2">'.$l['hostname_exp'].'</span>
									</div>	
									<div class="col-sm-7">	
										<input type="text" name="hostname" class="form-control" id="hostname" size="30" value="'.POSTval('hostname', $dbhost).'" />
									</div>	
								</div>';
						}
					
					echo '</div><br />';
					
					if(!empty($has_db) && empty($softpanel->auto_managedb) && !aefer()){
						echo '<div class="bg">
								<div class="sai_head" id="advoptions_toggle" onclick="toggle_advoptions(\'advoptions\');" style="cursor:pointer"><h4><b><img id="advoptions_toggle_plus"  src="'.$theme['images'].'plus_new.gif" style="margin-top:-4px;"/>&nbsp;&nbsp;'.$l['adv_option'].'</b></h4></div>
								<div id="advoptions" style="display:none;"><hr>
									<div class="row">
										<div class="col-sm-5">
											<label for="softdb" class="sai_head">'.$l['database_name'].'</label><br />
											<span class="sai_exp2">'.$l['database_name_exp'].'</span>
										</div>
										<div class="col-sm-7">
											<input type="text" name="softdb" class="form-control" id="softdb" size="30" value="'.POSTval('softdb', $dbname).'" onblur="checkdbname(\'softdb\', false)" /><br />
											<span id="softdberror" style="background: #FDB3B3; display:none; width:200px;"></span>
										</div>
									</div>
								</div>
							</div>';
					}
					echo '</div> <!--end of bg class-->';
				}
				
				echo '				
				<p align="center">
					<input type="submit" id="remote_sub_btn" class="flat-butt" name="remote_submit" value="'.$l['softsubmit'].'" style="display:none;"/><br /><img id="waiting" src="'.$theme['images'].'progress.gif" style="display:none">
				</p><br />
				<input type="hidden" name="soft_status_key" id="soft_status_key" value="'.POSTval('soft_status_key', generateRandStr(32)).'" />
				
				<center><b><a href="'.script_link($soft).'" class="sai_head">'.$l['return'].'</a></b></center><br />
			</div><!--end of bg class--><br />
		</form><br /><br />';
	
	}elseif(!empty($imported)){
	
		// Check if the script supports Sign On
		$has_sign_on = has_sign_on($soft);
	
		// Does the user have custom admin url for their installation
		$software['adminurl'] = !empty($__settings['admin_folder']) ? $__settings['admin_folder'] : @$software['adminurl'];
	
		echo '
		<div class="bg"><h4>'.$l['congrats'].'</h4><br />
			'.$software['name'].' '.$l['succesful'].' : <br />
			<a href="'.$__settings['softurl'].'" target="_blank">'.$__settings['softurl'].'</a>
			'.(!empty($software['adminurl']) ? '<br />'.$l['admin_url'].' : <a href="'.(empty($globals['disable_sign_on']) && !empty($has_sign_on) ? $globals['ind'].'act=sign_on&insid='.$__settings['insid'].'&autoid='.srandstr(32) : $__settings['softurl'].'/'.$software['adminurl']).'" target="_blank">'.$__settings['softurl'].'/'.$software['adminurl'].'</a>' : '').'<br /><br />
			'.$l['enjoy'].'<br /><br />
			'.(!empty($notes) ? $l['import_notes'].' : <br />
			<div class="sai_notes">'.softparse($notes, $soft).'</div><br /><br />' : '').'
			'.$l['please_note'].'<br /><br />
			'.$l['regards'].',<br />
			'.$l['softinstaller'].'
			<br /><br />
			<center><b><a href="'.script_link($soft).'&highlight='.$__settings['insid'].'&postact=import" class="sai_head">'.$l['return'].'</a></b></center>
		</div><!--end of bg class-->';
	
	}elseif(!empty($remote_imported)){
 		echo '<div class="bg"><br />
			<div class="alert alert-warning text-center"><img src="'.$theme['images'].'notice.gif" /> &nbsp; '.$l['remote_import'].'</div><br />
			<center><b><a href="'.script_link($soft).'" class="sai_head">'.$l['return'].'</a></b></center><br />
		</div>';
	}
	
	softfooter();

}

?>