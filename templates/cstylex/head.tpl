
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>IntISP Control Panel</title>
			<link href="{{ template_dir }}/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	
		<link href="{{ template_dir }}/public/css/default.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="{{ template_dir }}/public/js/jquery.js" language="javascript"></script>
					<script type="text/javascript" src="{{ template_dir }}/public/js/bootstrap.js" language="javascript"></script>
						<!-- Anti ClickJacking protection! -->
		<style id="antiClickjack">body{display:none !important;}</style>
		<script type="text/javascript">
			if (self === top) {
				var antiClickjack = document.getElementById("antiClickjack");
				antiClickjack.parentNode.removeChild(antiClickjack);
			} else {
				top.location = self.location;
			}
		</script>
		<!-- End of Anti ClickJacking protection! -->
		

		<!-- End of CstyleX theme javascript -->
	</head>
	<body>
	    <div id="wrapper">
			<div id="inner-wrapper">
				<div id="header" style="width:100%">
					<div id="home_btn"><a href="{{webroot}}/cp" title="Home"></a></div>
					<div id="logout_btn"><a href="action.php?action=exit" title="Log out"></a></div>
					<div id="myaccount_btn"><a  data-toggle="modal" data-target="#myModal" title="My account"></a></div>
					<div id="logo"></div>
				</div>
		<div class="row">
  <div class="col-md-11">
			    