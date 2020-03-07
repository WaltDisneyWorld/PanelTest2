<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* head.tpl */
class __TwigTemplate_3fa2af2f1dce4543d42bd4d1e9b1fdf39e2f97d20bd6f05ccb2ec9fbb4e4de65 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\">
  <meta name=\"description\" content=\"Hosting Control Panel\">
  <meta name=\"author\" content=\"Adaclare\">
  <meta name=\"robots\" content=\"noindex\">
  <meta name=\"googlebot\" content=\"noindex\">
  <!--<link rel=\"shortcut icon\" href=\"../images/favicon.png\" type=\"image/png\">-->

  <title>IntISP Control Panel</title>
  <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/assets/js/jquery.min.js\"></script>
  <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/Hover/hover.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/fontawesome/css/font-awesome.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/weather-icons/css/weather-icons.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/ionicons/css/ionicons.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/jquery-toggles/toggles-full.css\">

  <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/css/styles.css\">

  <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/modernizr/modernizr.js\"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/html5shiv/html5shiv.js\"></script>
  <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/respond/respond.src.js\"></script>
  <![endif]-->
  
<link rel=\"Stylesheet\" type=\"text/css\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/textedit/style/jHtmlArea.css\" />
<style>
.btn-group .btn-group+.btn-group, .btn-group .btn-group+.btn:not(.btn-default), .btn-group .btn:not(.btn-default)+.btn-group, .btn-group .btn:not(.btn-default)+.btn:not(.btn-default) {
border: 0px;              
}
.page-title {
    border-top: 0px;
    border-bottom: 0px;
}
</style>
</head>

<body>
<header>
 
  <div class=\"headerpanel\">

    <div class=\"logopanel\" style=\"background-color:#262b36; text-align: center;\">
       
      <h2><a href=\"cp\" >IntISP ";
        // line 49
        echo twig_escape_filter($this->env, ($context["intisp_ver"] ?? null), "html", null, true);
        echo "</a></h2>

    </div><!-- logopanel -->

    <div class=\"headerbar\">
    
    
      <div class=\"header-right\">
        <ul class=\"headermenu\">
            <li style=\"padding-left: 20px; padding-right: 20px;\"><h2 style=\"color:White;\">";
        // line 58
        echo twig_escape_filter($this->env, ($context["site_title"] ?? null), "html", null, true);
        echo " </h2></li>
          <li>
            <div id=\"noticePanel\" class=\"btn-group\">
                       <button onclick=\"location.href='";
        // line 61
        echo twig_escape_filter($this->env, ($context["webroot"] ?? null), "html", null, true);
        echo "/cp';\" class=\"btn btn-notice\" data-toggle=\"dropdown\">
             <i style=\"color:white\" class=\"fa fa-home\"></i>
              </button>
          
              <button data-toggle=\"modal\" data-target=\"#myModal\" class=\"btn btn-notice\" data-toggle=\"dropdown\">
             <i style=\"color:white\" class=\"fa fa-user\"></i>
              </button>
            <button onclick=\"location.href='action.php?action=exit';\" class=\"btn btn-notice\" data-toggle=\"dropdown\">
             <i style=\"color:white\" class=\"fa fa-sign-out\"></i>
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

  <div class=\"leftpanel\">
    <div class=\"leftpanelinner\">

      <!-- ################## LEFT PANEL PROFILE ################## -->
          <div class=\"media leftpanel-profile\" >
        <div class=\"media-left\" >
     <i class=\"fa fa fa-user fa-4x\" style=\"color:white;\"></i>
        </div>
       
      
             <div class=\"media-body\" style=\"text-align:center;\">
          <h4 class=\"media-heading\" >";
        // line 92
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo " </h4>
          <span>";
        // line 93
        echo twig_escape_filter($this->env, ($context["usertype"] ?? null), "html", null, true);
        echo "</span>
        </div>
      </div><!-- leftpanel-profile -->


          </li>
        </ul>
      </div><!-- leftpanel-userinfo -->
       <div class=\"tab-content\">
            <!-- ################# MAIN MENU ################### -->

        <div class=\"tab-pane active\" id=\"mainmenu\">
                   <ul class=\"nav nav-pills nav-stacked nav-quirk\">
           ";
        // line 106
        if ((($context["page"] ?? null) == "cp")) {
            // line 107
            echo "   <li class=\"active\"><a href=\"";
            echo twig_escape_filter($this->env, ($context["webroot"] ?? null), "html", null, true);
            echo "/cp\"><i class=\"fa fa-home\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_8"] ?? null), "html", null, true);
            echo "</span></a></li>
   ";
        } else {
            // line 109
            echo "   <li><a href=\"";
            echo twig_escape_filter($this->env, ($context["webroot"] ?? null), "html", null, true);
            echo "/cp\"><i class=\"fa fa-home\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_8"] ?? null), "html", null, true);
            echo "</span></a></li>
";
        }
        // line 111
        echo "</ul>
";
        // line 112
        if (( !($context["whmurl"] ?? null) == "")) {
            // line 113
            echo "  <h5 class=\"sidebar-title\">";
            echo twig_escape_filter($this->env, ($context["lang_9"] ?? null), "html", null, true);
            echo "</h5>
       <ul class=\"nav nav-pills nav-stacked nav-quirk\">
               <li><a href=\"";
            // line 115
            echo twig_escape_filter($this->env, ($context["whmurl"] ?? null), "html", null, true);
            echo "/clientarea.php\"><i class=\"fa fa fa-newspaper-o\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_10"] ?? null), "html", null, true);
            echo "</span></a></li>
               <li><a href=\"";
            // line 116
            echo twig_escape_filter($this->env, ($context["whmurl"] ?? null), "html", null, true);
            echo "/clientarea.php\"><i class=\"fa fa fa-credit-card\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_11"] ?? null), "html", null, true);
            echo "</span></a></li>
               <li><a href=\"";
            // line 117
            echo twig_escape_filter($this->env, ($context["whmurl"] ?? null), "html", null, true);
            echo "/index.php?rp=/knowledgebase\"><i class=\"fa fa-question-circle\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_12"] ?? null), "html", null, true);
            echo "</span></a></li>
               <li><a href=\"";
            // line 118
            echo twig_escape_filter($this->env, ($context["whmurl"] ?? null), "html", null, true);
            echo "/clientarea.php?action=emails\"><i class=\"fa fa fa-envelope-o\"></i> <span>";
            echo twig_escape_filter($this->env, ($context["lang_13"] ?? null), "html", null, true);
            echo "</span></a></li>
               </ul>
";
        }
        // line 121
        echo "
";
        // line 122
        echo ($context["menu"] ?? null);
        echo "

               </div>
              </div>
              </div>
              
            </div>
     </div><!-- tab-pane -->


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  <div class=\"mainpanel\">
";
    }

    public function getTemplateName()
    {
        return "head.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 122,  247 => 121,  239 => 118,  233 => 117,  227 => 116,  221 => 115,  215 => 113,  213 => 112,  210 => 111,  202 => 109,  194 => 107,  192 => 106,  176 => 93,  172 => 92,  138 => 61,  132 => 58,  120 => 49,  98 => 30,  92 => 27,  88 => 26,  81 => 22,  76 => 20,  71 => 18,  67 => 17,  63 => 16,  59 => 15,  55 => 14,  51 => 13,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "head.tpl", "/var/www/html/panel/templates/default/head.tpl");
    }
}
