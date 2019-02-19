<?php

/* login/header.twig */
class __TwigTemplate_f998606a0db11d8cfd442f6b7549a2fbec43520b4202d1177dd03ce85306411e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"container\">

<noscript>
";
        // line 5
        echo call_user_func_array($this->env->getFunction('Message_error')->getCallable(), array(_gettext("Javascript must be enabled past this point!")));
        echo "
</noscript>

<div class=\"hide\" id=\"js-https-mismatch\">
";
        // line 9
        echo call_user_func_array($this->env->getFunction('Message_error')->getCallable(), array(_gettext("There is mismatch between HTTPS indicated on the server and client. This can lead to non working phpMyAdmin or a security risk. Please fix your server configuration to indicate HTTPS properly.")));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "login/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "login/header.twig", "/home/ubuntu/workspace/thirdparty/phpmyadmin/templates/login/header.twig");
    }
}
