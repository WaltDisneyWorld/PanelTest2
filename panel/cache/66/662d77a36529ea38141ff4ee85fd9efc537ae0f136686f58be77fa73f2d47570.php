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

/* login.tpl */
class __TwigTemplate_6b986492f785530d2e1f2eea25a3fc14ee244efdff5ceacae5321b63a9c4ffbb extends \Twig\Template
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
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">
  <!--<link rel=\"shortcut icon\" href=\"../images/favicon.png\" type=\"image/png\">-->

  <title>IntISP Login</title>

  <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/fontawesome/css/font-awesome.css\">
<link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/assets/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/css/login.css\">

  <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/modernizr/modernizr.js\"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/html5shiv/html5shiv.js\"></script>
  <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/respond/respond.src.js\"></script>
  <![endif]-->

</head>
<body>
    <div class = \"container\">
\t<div class=\"wrapper\">
   
\t\t<form action=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["action_url"] ?? null), "html", null, true);
        echo "\" method=\"post\" name=\"Login_Form\" class=\"form-signin\">   
       ";
        // line 30
        echo ($context["alerts"] ?? null);
        echo "
\t\t    <h3 class=\"form-signin-heading\"><img src=\"includes/img/logo.png\" width=\"200px\" height=\"40px\"><br>";
        // line 31
        echo twig_escape_filter($this->env, ($context["site_title"] ?? null), "html", null, true);
        echo "
</h3>
\t\t\t  ";
        // line 33
        echo twig_escape_filter($this->env, ($context["lang_55"] ?? null), "html", null, true);
        echo "<br>
\t\t\t  <input type=\"text\" class=\"form-control\" name=\"user\" placeholder=\"Enter your Username\" required=\"\" autofocus=\"\" /><br>
      ";
        // line 35
        echo twig_escape_filter($this->env, ($context["lang_58"] ?? null), "html", null, true);
        echo "<br>
\t\t\t  <input type=\"password\" class=\"form-control\" name=\"pass\" placeholder=\"Enter your Password\" required=\"\"/>     \t\t  
\t\t\t 
\t\t\t  <button class=\"btn btn-lg btn-primary btn-block\"  name=\"Submit\" value=\"Login\" type=\"Submit\">";
        // line 38
        echo twig_escape_filter($this->env, ($context["lang_70"] ?? null), "html", null, true);
        echo "</button>  \t
   <br>   ";
        // line 39
        echo ($context["oauth"] ?? null);
        echo "
\t\t</form>\t
    <center>
       <ul>
         <li><a href=\"?en\">English</a></li>
         <li><a href=\"?es\">Spanish</a></li>
         <li><a href=\"?de\">German</a></li>
      </ul>
    </center>
\t</div>
</div><center><img src=\"includes/img/logo.png\" width=\"100px\" height=\"20px\">
<div class=\"a\">Copyright Adaclare Technologies All Rights Reserved</div>
</center>
   </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 39,  109 => 38,  103 => 35,  98 => 33,  93 => 31,  89 => 30,  85 => 29,  74 => 21,  70 => 20,  64 => 17,  59 => 15,  55 => 14,  51 => 13,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.tpl", "/var/www/html/panel/templates/default/login.tpl");
    }
}
