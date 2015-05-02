<?php

/* login/2fa */
class __TwigTemplate_a151cff45614c7714ddc05c487079fcf6c7915b8e3eb2d03546d036b7ccd3d4a extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("template.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'page' => array($this, 'block_page'),
            'section' => array($this, 'block_section'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "login 2fa";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "login";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Two-Factor Login Required</h1>
    <p>Please enter the code from your Google Authenticator app or YubiKey to continue with login.</p>
    <form method=\"post\">
        <input type=\"hidden\" name=\"username\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" name=\"password\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : null), "html", null, true);
        echo "\"/>
        <section>
            <input type=\"text\" name=\"code\" id=\"code\" placeholder=\"Second Factor\" required />
        </section>
        <input type=\"submit\" value=\"Login\" />
        ";
        // line 15
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
    </form>
";
    }

    // line 18
    public function block_scripts($context, array $blocks = array())
    {
        // line 19
        echo "    <script type=\"text/javascript\">
        document.getElementById('code').focus();
    </script>
";
    }

    public function getTemplateName()
    {
        return "login/2fa";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 19,  85 => 18,  78 => 15,  70 => 10,  66 => 9,  61 => 6,  58 => 5,  52 => 4,  46 => 3,  40 => 2,  11 => 1,);
    }
}
