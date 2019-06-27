
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

  <link rel="stylesheet" href="{{ template_dir }}/public/css/styles.css">

  <script src="{{ template_dir }}/public/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="{{ template_dir }}/public/lib/html5shiv/html5shiv.js"></script>
  <script src="{{ template_dir }}/public/lib/respond/respond.src.js"></script>
  <![endif]-->

</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
           <h1><img src="{{ template_dir }}/public/assets/img/image.png"></h1>
           <h4 class="panel-title">{{ site_title }}</h4>
            </div>
    <div class="panel-body">
        {{ alerts | raw }}
         <form action="{{ action_url }}" method="post">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" name="user" placeholder="{{ lang_55 }}">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="password" class="form-control" name="pass" placeholder="{{ lang_58 }}">
          </div>
        </div>
        <div><br></div>
        <div class="form-group">
          <button class="btn btn-success btn-quirk btn-block">{{ lang_70 }}</button>
        </div>
        {{ oauth | raw }}
          </form>
      
     
      
      
    </div><center>
      <a href="?en">English</a>
  <a href="?es">Spanish</a>
<a href="?de">German</a>
</center>
  </div><!-- panel -->

</body>
</html>