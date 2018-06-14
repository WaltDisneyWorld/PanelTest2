<?php

//////////////////////////////////////////////////////////////
//===========================================================
// help_theme.php
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

function help_theme(){

global $user, $globals, $l, $theme, $softpanel, $iscripts, $catwise, $error;

softheader($l['<title>']);

echo '
<div class="bg">
	<div class="row">
		<div class="col-sm-12">
			<div class="sai_main_head">'.$l['faq'].'</div><hr>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="sai_sub_head">'.$l['help_soft'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_soft_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_install'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_install_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_err_ins'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_err_ins_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_support'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_support_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_rem'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_rem_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_ratings'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_ratings_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_rate'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_rate_ans'].'</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><br />
			<div class="sai_sub_head">'.$l['help_demos'].'</div>
			<hr>
			<div class="sai_ans">'.$l['help_demos_ans'].'</div>
		</div>
	</div>
</div>';

softfooter();

}

?>