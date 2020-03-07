
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>IntISP Login</title>

  <link rel="stylesheet" href="{{ template_dir }}/public/lib/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="{{ template_dir }}/public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ template_dir }}/public/css/login.css">

  <script src="{{ template_dir }}/public/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="{{ template_dir }}/public/lib/html5shiv/html5shiv.js"></script>
  <script src="{{ template_dir }}/public/lib/respond/respond.src.js"></script>
  <![endif]-->

</head>
<body>
    <div class = "container">
	<div class="wrapper">
   
		<form action="{{ action_url }}" method="post" name="Login_Form" class="form-signin">   
       {{ alerts | raw }}
		    <h3 class="form-signin-heading"><img src="includes/img/logo.png" width="200px" height="40px"><br>{{ site_title }}
</h3>
			  {{ lang_55 }}<br>
			  <input type="text" class="form-control" name="user" placeholder="Enter your Username" required="" autofocus="" /><br>
      {{ lang_58 }}<br>
			  <input type="password" class="form-control" name="pass" placeholder="Enter your Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">{{ lang_70 }}</button>  	
   <br>   {{ oauth | raw }}
		</form>	
    <center>
       <ul>
         <li><a href="?en">English</a></li>
         <li><a href="?es">Spanish</a></li>
         <li><a href="?de">German</a></li>
      </ul>
    </center>
	</div>
</div><center><img src="includes/img/logo.png" width="100px" height="20px">
<div class="a">Copyright Adaclare Technologies All Rights Reserved</div>
</center>
   </body>
</html>
