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

/* footer.tpl */
class __TwigTemplate_46c7d9e2b50c371202696395b2578029540c928d26278e586fccd3ca974ee873 extends \Twig\Template
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
        echo "   </div><!-- row -->

        </div><!-- col-md-9 -->
        <div class=\"col-md-2 col-lg-2 dash-right\">
          <div class=\"row\">
            <div class=\"col-sm- col-md-12 col-lg-12\">
                ";
        // line 7
        if ((($context["hide_nav"] ?? null) == false)) {
            // line 8
            echo "                <form class=\"navbar-form\" role=\"search\">
                <div class=\"input-group\">
             <h1>";
            // line 10
            echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
            echo "</h1>
             
                </div>
            </form>
                        </div>
                        
                    <div class=\"list list-info\">
\t\t\t\t\t<div class=\"panel panel-primary list-announcement\">
\t\t\t\t\t      <div class=\"panel-body\">
                                    ";
            // line 19
            echo ($context["header"] ?? null);
            echo " 
\t\t\t\t\t\t\t\t\t  </div>
                    </div>
                    </div>
                        <div class=\"list list-info\">
    <div class=\"account-information\">
  <div class=\"panel panel-default\">
  <div class=\"panel-heading\">Server Info</div>
  <div class=\"panel-body\">
        <table id=\"account-information\">
          <ul style=\"list-style-type: none; padding-left:0px;\">
              <li>Hostname: <span class=\"tag is-dark pull-right\">";
            // line 30
            echo twig_escape_filter($this->env, ($context["hostname"] ?? null), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, ($context["port"] ?? null), "html", null, true);
            echo "
              \t</span>
\t\t\t</li>
\t\t\t<li>IP Address: <span class=\"tag is-dark pull-right\">";
            // line 33
            echo twig_escape_filter($this->env, ($context["ip"] ?? null), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, ($context["port"] ?? null), "html", null, true);
            echo "</li>
\t\t\t<li>MySQL Hostname: <span class=\"tag is-info pull-right\">localhost</span></li>
\t\t\t\t<li>MySQL Username: <span class=\"tag is-info pull-right\">";
            // line 35
            echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
            echo "</span></li>
\t\t\t\t<li>MySQL Password: <span class=\"tag is-info pull-right\">Same as CP</span></li>
   \t<li>Database: <span class=\"tag is-info pull-right\">";
            // line 37
            echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
            echo "</span></li>
   \t
   \t  <li>FTP Hostname: <span class=\"tag is-info pull-right\">";
            // line 39
            echo twig_escape_filter($this->env, ($context["ip"] ?? null), "html", null, true);
            echo ":21</li>
    <li>FTP Username: <span class=\"tag is-info pull-right\">";
            // line 40
            echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
            echo "</span></li>
       <li>FTP Password: <input type=\"text\" class=\"pull-right\"  style=\"width:100px\" value=\"";
            // line 41
            echo twig_escape_filter($this->env, ($context["ftppass"] ?? null), "html", null, true);
            echo "\" disabled></li><li><br></li>
<li><br></li>
<li>Status: ";
            // line 43
            echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
            echo " </li>
 <li>MySQL Status: <i class=\"fa fa-check pull-right\" aria-hidden=\"true\"></i></li>
\t   <li>IntISP Status: <i class=\"fa fa-check pull-right\" aria-hidden=\"true\"></i></li>
\t   <style>
\t   .progress, .progress-bar-striped, .progress-bar {height: 10px !important;}
\t   </style>
\t     <li>\tDisk Space (";
            // line 49
            echo twig_escape_filter($this->env, ($context["disk"] ?? null), "html", null, true);
            echo "%):<br>
      


<progress class=\"progress is-small\" value=\"";
            // line 53
            echo twig_escape_filter($this->env, ($context["disk"] ?? null), "html", null, true);
            echo "\" max=\"100\">";
            echo twig_escape_filter($this->env, ($context["disk"] ?? null), "html", null, true);
            echo "%</progress>
            </li>
            <li>

 <table class=\"table table-hover\">
                                            <thead>
                                                <tr>
                                                  
                                                    <th>IP</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ";
            // line 66
            echo ($context["failed_login"] ?? null);
            echo "
                                                       </tbody>
                                        </table>
        </table>
            </li>
                </ul>
          </div>
         
    </div>
   
</div>       
<div class=\"list list-info\">
<div class=\"row\">

 \t\t<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
\t";
            // line 81
            echo ($context["microsoft"] ?? null);
            echo "
\t</div>
  
</div> 
                </div>
              </div>
            </div><!-- col-md-12 -->
       

        </div><!-- col-md-3 -->
      </div><!-- row -->

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>
<!-- Modal -->
              ";
        }
        // line 100
        echo "                <div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
    <div class=\"modal-dialog\">
    
      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Change My Password</h4>
        </div>
        <form method=\"POST\" action=\"action.php?action=pass\">
        <div class=\"modal-body\">
             <form class=\"form-horizontal\" role=\"form\">
                  <div class=\"form-group\">
                  \t<input type=\"hidden\" name=\"username\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "\">
                    <label  class=\"col-sm-2 control-label\" for=\"inputEmail3\">Password</label>
                    <div class=\"col-sm-10\">
                        <input type=\"password\" name=\"password\" class=\"form-control\" id=\"inputEmail3\" placeholder=\"password\">
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <div class=\"col-sm-offset-2 col-sm-10\">
                      <button type=\"submit\" class=\"btn btn-default\">Change Password</button>
                    </div>
                  </div>
        </div></form>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
                                                  

<script src=\"";
        // line 136
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/jquery/jquery.js\"></script>
<script src=\"";
        // line 137
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/jquery-ui/jquery-ui.js\"></script>
<script src=\"";
        // line 138
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/bootstrap/js/bootstrap.js\"></script>
<script src=\"";
        // line 139
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/jquery-toggles/toggles.js\"></script>


<script src=\"";
        // line 142
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/raphael/raphael.js\"></script>

<script src=\"";
        // line 144
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/flot/jquery.flot.js\"></script>
<script src=\"";
        // line 145
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/flot/jquery.flot.resize.js\"></script>
<script src=\"";
        // line 146
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/flot-spline/jquery.flot.spline.js\"></script>

<script src=\"";
        // line 148
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/lib/jquery-knob/jquery.knob.js\"></script>

<script src=\"";
        // line 150
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/js/custom.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 151
        echo twig_escape_filter($this->env, ($context["template_dir"] ?? null), "html", null, true);
        echo "/public/textedit/scripts/jHtmlArea-0.8.js\"></script>
<script>
    \$('textarea').htmlarea();
</script>
</body>
</html> ";
    }

    public function getTemplateName()
    {
        return "footer.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 151,  271 => 150,  266 => 148,  261 => 146,  257 => 145,  253 => 144,  248 => 142,  242 => 139,  238 => 138,  234 => 137,  230 => 136,  204 => 113,  189 => 100,  167 => 81,  149 => 66,  131 => 53,  124 => 49,  115 => 43,  110 => 41,  106 => 40,  102 => 39,  97 => 37,  92 => 35,  85 => 33,  77 => 30,  63 => 19,  51 => 10,  47 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.tpl", "/var/www/html/panel/templates/default/footer.tpl");
    }
}
