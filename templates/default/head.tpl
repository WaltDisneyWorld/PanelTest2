<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>IntISP Control Panel</title>
<script src="public/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ template_dir }}/public/lib/Hover/hover.css">
  <link rel="stylesheet" href="{{ template_dir }}/public/lib/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" href="{{ template_dir }}/public/lib/weather-icons/css/weather-icons.css">
  <link rel="stylesheet" href="{{ template_dir }}/public/lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="{{ template_dir }}/public/lib/jquery-toggles/toggles-full.css">

  <link rel="stylesheet" href="{{ template_dir }}/public/css/styles.css">

  <script src="{{ template_dir }}/public/lib/modernizr/modernizr.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="{{ template_dir }}/public/lib/html5shiv/html5shiv.js"></script>
  <script src="{{ template_dir }}/public/lib/respond/respond.src.js"></script>
  <![endif]-->
  
<link rel="Stylesheet" type="text/css" href="{{ template_dir }}/public/textedit/style/jHtmlArea.css" />
</head>

    <body>

<header>
 
  <div class="headerpanel">

    <div class="logopanel">
       
      <h2><a href="index.php?page=cp">IntISP {{ intisp_ver }} </a></h2>

    </div><!-- logopanel -->

    <div class="headerbar">
    
    <div class="logopanel" ><h2 style="color:White;">{{ site_title }} </h2></div>
     <style>
          .btn-group .btn-group+.btn-group, .btn-group .btn-group+.btn:not(.btn-default), .btn-group .btn:not(.btn-default)+.btn-group, .btn-group .btn:not(.btn-default)+.btn:not(.btn-default) {
border: 0px;              
          }
      </style>
      <div class="header-right">
        <ul class="headermenu">
            
          <li>
            <div id="noticePanel" class="btn-group">
                       <button onclick="location.href='index.php?page=cp';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-home"></i>
              </button>
                          <button onclick="location.href='index.php?page=FileManager';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-file"></i>
              </button>
                <button onclick="location.href='thirdparty/phpmyadmin/index.php';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-database"></i>
              </button>
              <button data-toggle="modal" data-target="#myModal" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-user"></i>
              </button>
            <button onclick="location.href='action.php?action=exit';" class="btn btn-notice" data-toggle="dropdown">
             <i style="color:white" class="fa fa-sign-out"></i>
              </button> 
              </div>
              </li>
              </ul>
              </div>
          </div><!-- header-right -->
    </div><!-- headerbar -->
  </div><!-- header-->
</header>
<section>
    
  <div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->
          <div class="media leftpanel-profile" style="background-color: #262b36;">
        <div class="media-left" style="background-color: #262b36;">
     
        </div>
         <div class="media-body" style="background-color: #262b36;">
          <h4 class="media-heading">
              {{ edition }} 
              </h4>
              </div>
        <br>
             <div class="media-body">
          <h4 class="media-heading">{{ username }} </h4>
          <span>{{ usertype }}</span>
        </div>
      </div><!-- leftpanel-profile -->


          </li>
        </ul>
      </div><!-- leftpanel-userinfo -->
       <div class="tab-content">
            <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
                   <ul class="nav nav-pills nav-stacked nav-quirk">
           {% if page == "cp" %}
   <li class="active"><a href="index.php?page=cp"><i class="fa fa-home"></i> <span>{{ lang_8 }}</span></a></li>
   {% else %}
   <li><a href="index.php?page=cp"><i class="fa fa-home"></i> <span>{{ lang_8 }}</span></a></li>
{% endif %}
</ul>
{% if not whmurl == "" %}
  <h5 class="sidebar-title">{{ lang_9 }}</h5>
       <ul class="nav nav-pills nav-stacked nav-quirk">
               <li><a href="{{ whmurl }}/clientarea.php"><i class="fa fa fa-newspaper-o"></i> <span>{{ lang_10 }}</span></a></li>
               <li><a href="{{ whmurl }}/clientarea.php"><i class="fa fa fa-credit-card"></i> <span>{{ lang_11 }}</span></a></li>
               <li><a href="{{ whmurl }}/index.php?rp=/knowledgebase"><i class="fa fa-question-circle"></i> <span>{{ lang_12 }}</span></a></li>
               <li><a href="{{ whmurl }}/clientarea.php?action=emails"><i class="fa fa fa-envelope-o"></i> <span>{{ lang_13 }}</span></a></li>
               </ul>
{% endif %}

{{ menu | raw }}

               </div>
              </div>
              </div>
              
            </div>
     </div><!-- tab-pane -->


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  <style>
      .page-title {
          border-top: 0px;
          border-bottom: 0px;
      }
  </style>
  <div class="mainpanel">