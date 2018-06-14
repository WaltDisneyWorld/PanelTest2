<?php

//////////////////////////////////////////////////////////////
//===========================================================
// lets_encrypt_theme.php
//===========================================================
// SOFTACULOUS 
// Version : 2.5.0
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Husain Bhala
// Date:       24th Oct 2016
// Time:       16:00 hrs
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


function lets_encrypt_theme(){

	global $user, $globals, $l, $theme, $softpanel, $error, $done, $domain_lelist, $install_lelist, $domain_name, $le_log;

	// To update domains links
	if(optGET('ajaxdom')){
		showcert();
		return true;
	}

	softheader($l['<title>']);
	
	echo '<style>
	.sai_popup {
		position:absolute;
		background:#FFFFFF;
		border:#666 1px solid;
		display:none;
		z-index:10000;
		min-height:200px;
		padding:5px;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}	
	.heading_a{
		border-radius: 5px;
		border :2px solid  #FFFFFF;			
		background: #FFFFFF;
		padding: 8px;	
		font-size:18px;
		color:#333333;
		margin-top:20px;
		margin-bottom:5px;
		font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
	}
	#panel-heading-part{
		background-color: #FFFFFF;
		border-bottom: 0px solid #DDD;
	}
	#panel-background{
		border-color: #FFFFFF;
		box-shadow: 0px 0px 0px #ffffff;
		height:58px;
		border-bottom: 0px solid #DDD;
		background-color: #DDD;
	}
	.no-border-bottom{
		border-bottom: 0px solid #DDD;
	}
	.tab-center{
		margin: 0 auto;
		background-color: #FFFFFF;
	}
	#panel-body-part{
		border-top:2px solid #DDD; 
		width:100%;
	}
	.innertabs{
		width:100%;
		float: center;				
		padding:20px;
	}
	.with-nav-tabs.panel-default .nav-tabs > li > a,
	.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
	.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
	color: #777;
	}
	.with-nav-tabs.panel-default .nav-tabs > .open > a,
	.with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
	.with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
	.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
	.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
	color: #777;
	background-color: #DDD;
	border-color: transparent;
	}
	.with-nav-tabs.panel-default .nav-tabs > li.active > a,
	.with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
	.with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
	color: #555;
	background-color: #DDD;
	border-color: #ccc;
	}
	@media screen and (min-width:320px) and (max-width: 560px) {
		.sai_popup{
			top: 50%;
			left: 50%;
			width:80%;
		}
		ul li {
			width:100%;
		}
		#panel-body-part{
			margin-top:250px;
		}
	}
	@media screen and (min-width:560px) and (max-width: 1030px) {
		ul li {
			width:50%;
		}
		#panel-body-part{
			margin-top:100px;
		}		
	}			
	</style>';
	
	echo '<div class="bg">';
		echo '<br /><div class="sai_main_head"><center><img src="'.$theme['a_images'].'lets_encrypt.png" />&nbsp;'.$l['lbl_head'].'</center></div>
		
		<div class="panel with-nav-tabs panel-default" id="panel-background"> 
			<div class="panel-heading" id="panel-heading-part">
				<ul class="nav nav-tabs no-border-bottom tab-center">
					<li align="center" id="lecerts_a"><a href="#lecerts" data-toggle="tab" class="heading_a" style="text-decoration:none">'.$l['lecerts'].'</a></li>
					<li align="center" id="lelog_a"><a href="#lelog" data-toggle="tab" class="heading_a" style="text-decoration:none">'.$l['lelog'].'</a></li>
				</ul>
			</div>
		</div>
		<div class="panel-body" id="panel-body-part">
			<div class="tab-content" style="height: auto;"><br/>
				<div class="tab-pane fade" id="lecerts">';
					if(!empty($error['no_domain'])){
						echo '<div class="alert alert-danger " style="width:100%">
							<center style="margin-top:4px; font-size:16px;">'.$l['error_no_domain'].'</center>
						</div>';
					}else{
						echo '<form accept-charset="'.$globals['charset'].'" action="" method="post" id="editformuplode" enctype="multipart/form-data" class="form-horizontal">
							<div class="row">
								<div class="col-sm-5">
									<label class="sai_head" for="selectdomain">'.$l['domain'].'</label>
								</div>
								<div class="col-sm-6 col-xs-9">
									<select class="form-control" name="selectdomain" id="selectdomain">';					
										foreach ($domain_lelist as $key => $value){
											echo '<option value='.$key.'>'.$key.'</option>';
										}
									echo '</select><img id="changedom" src="'.$theme['images'].'progress.gif" style="display:none;"/>
								</div>
							</div><br/>
							<div id="showrectab">';
								showcert();
							echo '  </div>

						</form>';
					}
					
				echo '</div>
				
				<div class="tab-pane fade" id="lelog">
					<div class="row">
						<div class="col-sm-12 innertabs" nowrap="nowrap" style="width:97%;">
						<textarea class="form-control" id="showlog" readonly="readonly"; style="height:400px; width:100%; overflow:auto; resize: none;" wrap="off"; >'.$le_log.'</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-offset-5 col-sm-7">
							<input type="button" class="flat-butt" id="get_log" style="cursor:pointer" value="'.$l['ref_logs'].'" onclick="get_logs();" />
							<input type="button" class="flat-butt" id="clear_log" style="cursor:pointer" value="'.$l['clear_logs'].'" onclick="get_logs(this.id);" />
							<img id="trace_prog" src="'.$theme['images'].'progress.gif" style="display:none">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script language="javascript" type="text/javascript">
	
		// For selecting tab
		try{
			var select_tab = window.location;
			if(select_tab.length > 0){
				$(select_tab+"_a").addClass("active");
				$(select_tab).addClass("in active");
			}else{
				$("#lecerts_a").addClass("active");
				$("#lecerts").addClass("in active");
			}
		}catch(e){}
	
		// For msgbox MboxObject(fYes, fNo)
		var message_box = new MboxObject(install_cert,"");
		
		$(document).ready(function(){	
		
			$("#selectdomain").change(function(){
				$("#changedom").css("display", "");	
				var domain = $(this).val();
				$.ajax({				
					type: "POST",				
					url: window.location+"&ajaxdom=1&domain="+domain,
					success: function(data){
						$("#changedom").css("display", "none");
						$("#showrectab").html(data);
					}															  
				});	
			});	
		});	
		
		function install_cert(domain){
			var ispanel = ($_("ispanel").checked == true ? 1 : 0);
			$.ajax({
				type: "POST",
				url: window.location.toString()+"&api=json",
				data: "install_cert=1&selectdomain="+domain+"&ispanel="+ispanel,
				dataType : "json",
				success: function(data){
					if("done" in data){
						message_box.show_message("Install", \''.$l['act_bg'].'\', 2);
					}else{
						message_box.show_message("Error",data["error"],1);
					}
				},
				error: function(){
					message_box.show_message("Error",\''.$l['connect_error'].'\',1);
				}
			});
		}
		
		function renew_cert(domain){
			$.ajax({
				type: "POST",
				url: window.location.toString()+"&api=json",
				data: "renew_cert=1&selectdomain="+domain,
				dataType : "json",
				success: function(data){
					if("done" in data){
						message_box.show_message("Renew", \''.$l['act_bg'].'\', 2);
					}else{
						message_box.show_message("Error",data["error"],1);
					}
				},
				error: function(){
					message_box.show_message("Error",\''.$l['connect_error'].'\',1);
				}
			});
		}
		
		function revoke_cert(domain){
			$.ajax({
				type: "POST",
				url: window.location.toString()+"&api=json",
				data: "revoke_cert=1&selectdomain="+domain,
				dataType : "json",
				success: function(data){
					if("done" in data){
						message_box.show_message("Revoke", \''.$l['act_bg'].'\', 2);
					}else{
						message_box.show_message("Error",data["error"],1);
					}
				},
				error: function(){
					message_box.show_message("Error",\''.$l['connect_error'].'\',1);
				}
			});
		}
		
		//get backup logs (and clear them if needed)
		function get_logs(id){
			$("#trace_prog").css("display", "");
			if(id == "clear_log"){
				dataval = "clearlog=1";
			}else{
				dataval = "";
			}
			$.ajax({
				type: "POST",
				url: window.location.toString()+"&api=json",
				data: dataval,
				dataType : "json",
				// checking for error
				success: function(data){
					$("#trace_prog").css("display", "none");
					if("done" in data){
						if(id == "clear_log"){
							message_box.show_message("Delete","Logs Cleared",2);
						}
						$("#showlog").text(data["le_log"]);
					}else{
						message_box.show_message("Error",data["error"],1);
					}
				},
				error: function(){
					message_box.show_message("Error",\''.$l['connect_error'].'\',1);
				}
			});
		}
	</script>';
	
	softfooter();
}

function showcert(){
	
	global $user, $globals, $l, $theme, $softpanel, $error , $done, $domain_lelist, $domain_name, $install_lelist;

	// Getting cert files
	$install_lelist = $softpanel->list_lecert();

	echo '<div id="showrectab">';
		if(!empty($install_lelist[$domain_name])){
			echo '<div class="row">
			<table border="0" cellpadding="8" cellspacing="0" width="100%" class="table table-hover table-hover-moz td_font">
				<thead class="sai_head2" style="background:#EFEFEF;"">
					<th colspan=2>'.$l['crt_details'].'</th>
				</thead>
				<tbody>';
					$flag=0;
					foreach($install_lelist[$domain_name]['cert_info'] as $k => $v){
						echo '<tr>
							<td>'.$l[$k].'</td>
								<td id= "'.$k.'" style="text-align: left;">';
							if($k == 'subject' && $flag == 0){
								echo '<div class="endurl"><a href="https://'.$v.'" target="_blank" ><span id="name'.$k.'" >'.$v.'</span></a></div>';
								$flag = 1;
							}else{
								echo $v;
							}
					
							echo '</td>
						</tr>';
					}
				echo '</tbody>
			</table>
			</div><br/>';
		}
		
		if(empty($install_lelist[$domain_name])){
			echo '<div class="row">
				<div class="col-sm-5">
					<label class="sai_head" for="ispanel">'.$l['use_for_panel'].'</label><br/>
					<span class="sai_exp2">'.$l['exp_use_for_panel'].'</span>
				</div>
				<div class="col-sm-7">
					<input type="checkbox" name="ispanel" id="ispanel">
				</div>
			</div><br/>';
		}
		
		echo '<div class="row">
			<center class="col-sm-12">
				<input type="button" class="flat-butt backup" id="'.$domain_name.'" style="cursor:pointer" value="'.$l['install_button'].'" onclick="install_cert(this.id);" '.(empty($install_lelist[$domain_name]) ? '' : 'disabled').'/>
				<input type="button" class="flat-butt backup" id="'.$domain_name.'" style="cursor:pointer" value="'.$l['revoke_button'].'" onclick="revoke_cert(this.id);" '.(!empty($install_lelist[$domain_name]) ? '' : 'disabled').'/>
				<input type="button" class="flat-butt backup" id="'.$domain_name.'" style="cursor:pointer" value="'.$l['renew_button'].'" onclick="renew_cert(this.id);" '.(!empty($install_lelist[$domain_name]) && (strtotime($install_lelist[$domain_name]['cert_info']['next_renew']) < time()) ? '' : 'disabled').'/>&nbsp;<img id="prog_gif" src="'.$theme['images'].'progress.gif" style="display:none">
			</center>
		</div><br/>
		<div class="row text-center sai_notice">
			'.$l['note'].'
		</div><br>';
	echo '</div>';
}

?>
