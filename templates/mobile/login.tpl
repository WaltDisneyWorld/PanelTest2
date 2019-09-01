<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ template_dir }}/css/onsenui.css">
  <link rel="stylesheet" href="{{ template_dir }}/css/components.css">
  <script src="{{ template_dir }}/js/onsenui.min.js"></script>
    <link rel="stylesheet" href="{{ template_dir }}/assets/css/bootstrap.min.css">
  <title>IntISP Login</title>
</head>
<body>
     <ons-page>
      <ons-toolbar>
        <div class="center">IntISP {{ site_title }}</div>
           </ons-toolbar>

{{ alerts | raw }}
      <div class="login-form">
<form action="{{ action_url }}" method="post" name="Login_Form" class="form-signin">   
        <input type="text" name="user" class="text-input--underbar" style="width:100%;" placeholder="Username" value="">
        <input type="password" name="pass" class="text-input--underbar" style="width:100%;" placeholder="Password" value="">
        <br><br>
        <input type="submit" modifier="large" class="login-button" value="Login">
        <br><br>
         </div>
         </form><br>
          {{ oauth | raw }} <br>
          <br>
           <center>
       <ul>
         <li><a href="?en">English</a></li>
         <li><a href="?es">Spanish</a></li>
         <li><a href="?de">German</a></li>
      </ul>
    </center>
    </ons-page>
 </body>
</html>