<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ template_dir }}/css/onsenui.css">
    <script src="{{ template_dir }}/js/onsenui.min.js"></script>
  <link rel="stylesheet" href="{{ template_dir }}/css/components.css">
 <link rel="stylesheet" href="{{ template_dir }}/assets/css/bootstrap.min.css">
 <script src="{{ template_dir }}/assets/js/jquery.min.js"></script>
<script src="{{ template_dir }}/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{ template_dir }}/lib/bootstrap/js/bootstrap.js"></script>
<style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.sidebar-title {
  color:white;
}
</style>

  <title>IntISP Login</title>
</head>
<body>
<ons-page>
<div id="mySidenav" class="sidenav">
<ul class="nav nav-pills nav-stacked nav-quirk"><li><a href="javascript:void(0)" onclick="closeNav()"><span>Close</span></a></li></ul>

{{ menu | raw }}
</div>
 <ons-toolbar>
      <div class="left">
        <ons-toolbar-button onclick="openNav()">
         Menu
        </ons-toolbar-button>
      </div>
      <div class="center">
      <a href="cp">
        IntISP {{ site_title }}
        </a>
      </div>
       <div class="right">
        <a href="action.php?action=exit" class="btn btn-primary">
         Log out
        </a>
      </div>
    </ons-toolbar>

