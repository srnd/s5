<?php

/* login/logout_post_redirector */
class __TwigTemplate_0dd7c52f3f41607d11f12dee4b40db5aa55cff21aa9052a29e3e373a798844d9 extends TwigBridge\Twig\Template
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
        echo "<!doctype html>
<html lang=\"en\">
<head><title>Logging Out // s5</title></head>
<body>
<h1>Logging you out...</h1>
<form id=\"logoutform\" method=\"post\">
    <input type=\"submit\" value=\"Click here to log out\" />
    ";
        // line 8
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
</form>
<script type=\"text/javascript\">
    if (window.top === window.self) {
        document.getElementById('logoutform').submit();
    }
</script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login/logout_post_redirector";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 8,  19 => 1,);
    }
}
