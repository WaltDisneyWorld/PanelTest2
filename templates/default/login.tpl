
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
		    <h3 class="form-signin-heading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAR4AAABOAQAAAADeS0Q4AAAAAnRSTlMAAQGU/a4AAAAJcEhZcwAAAEgAAABIAEbJaz4AAAJlSURBVEjH3dZLEqMgEADQtliw5AhcZGq42FS0ai7mUTgCSxaUDP0B2kST1CxmMS5ao09b0O4I9fNS4J+jFBK0JdQacb3U4mrNbctQXAhFT8jWuuMa1tw3K5+NaHOJr1DJQIimHsyJOkRgKQ3IEQg7ZiC0UQqNVoWSQqbg+YICnw5+W6rsobho5AWFhmQIvKOhApZ3+SyojYHywOMVOYVAo1+InCBJt4KRIRyvyE5UTujHBapgOPEyUQbHt2l5X8slqJ91Qjwm11A6zQkhnL02x+2xHhISOH5H2mpTqGgUwQ8Un1EZKJxRAo+vyTEQze6KKCNKHZmB3B0KiIpCbeIqIz/SfYFiR06unxFRuoRox2cX4edbtDF6YCY57insPAWE4B5R9aTx0mmUFGoZJ8Ibs3KRJIGQl3JYXlCYyJ5QGZkEBTpqBJlvkNWI2gojaQ6xF0ibrHxGURBIiXpBfqCVUNYIW8+2yHOcaC2q8+CvS6TbExbdRCs+cUZVIYMIlnRGGHZuLzyniAzdsxyvHPJE4RZVfI8IUSFNVM9op27GldWKOg60jUDDhWu03CFLA9smWgSt3yHzjPAQ3KBe1BNJkr29+9fI3CEuapjICKIe8heI2o9Cm0LUVzU6BioKUTc8RiPr52O9fUIFkXtGqvkevSg7uuqrXCwmv0Vcdlaj15YZO/Jv0PiTfEHuGfmJrvoq/2uFdIO8QqtGj3E7va8y4h5yRv4JGYVSqzw3UMCtIC0zc8tH1D4CPB3CsFKQ5pvlC6w9O1O3gDNeZ4jcxsvSUfvs2nHrNwbDgT/DarUd1c/Lf47+ADSdLFwWBKuHAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE4LTA5LTAyVDExOjA1OjAxLTA1OjAwe5kqXQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOC0wOS0wMlQxMTowNTowMS0wNTowMArEkuEAAAAASUVORK5CYII=" width="200px" height="40px"><br>{{ site_title }}
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
</div><center><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAR4AAABOAQAAAADeS0Q4AAAAAnRSTlMAAQGU/a4AAAAJcEhZcwAAAEgAAABIAEbJaz4AAAJlSURBVEjH3dZLEqMgEADQtliw5AhcZGq42FS0ai7mUTgCSxaUDP0B2kST1CxmMS5ao09b0O4I9fNS4J+jFBK0JdQacb3U4mrNbctQXAhFT8jWuuMa1tw3K5+NaHOJr1DJQIimHsyJOkRgKQ3IEQg7ZiC0UQqNVoWSQqbg+YICnw5+W6rsobho5AWFhmQIvKOhApZ3+SyojYHywOMVOYVAo1+InCBJt4KRIRyvyE5UTujHBapgOPEyUQbHt2l5X8slqJ91Qjwm11A6zQkhnL02x+2xHhISOH5H2mpTqGgUwQ8Un1EZKJxRAo+vyTEQze6KKCNKHZmB3B0KiIpCbeIqIz/SfYFiR06unxFRuoRox2cX4edbtDF6YCY57insPAWE4B5R9aTx0mmUFGoZJ8Ibs3KRJIGQl3JYXlCYyJ5QGZkEBTpqBJlvkNWI2gojaQ6xF0ibrHxGURBIiXpBfqCVUNYIW8+2yHOcaC2q8+CvS6TbExbdRCs+cUZVIYMIlnRGGHZuLzyniAzdsxyvHPJE4RZVfI8IUSFNVM9op27GldWKOg60jUDDhWu03CFLA9smWgSt3yHzjPAQ3KBe1BNJkr29+9fI3CEuapjICKIe8heI2o9Cm0LUVzU6BioKUTc8RiPr52O9fUIFkXtGqvkevSg7uuqrXCwmv0Vcdlaj15YZO/Jv0PiTfEHuGfmJrvoq/2uFdIO8QqtGj3E7va8y4h5yRv4JGYVSqzw3UMCtIC0zc8tH1D4CPB3CsFKQ5pvlC6w9O1O3gDNeZ4jcxsvSUfvs2nHrNwbDgT/DarUd1c/Lf47+ADSdLFwWBKuHAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE4LTA5LTAyVDExOjA1OjAxLTA1OjAwe5kqXQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOC0wOS0wMlQxMTowNTowMS0wNTowMArEkuEAAAAASUVORK5CYII=" width="100px" height="20px">
<div class="a">Copyright Adaclare Technologies All Rights Reserved</div>
</center>
   </body>
</html>
