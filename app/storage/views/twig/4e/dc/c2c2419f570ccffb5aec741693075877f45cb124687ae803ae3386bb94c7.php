<?php

/* index */
class __TwigTemplate_4edcc2c2419f570ccffb5aec741693075877f45cb124687ae803ae3386bb94c7 extends TwigBridge\Twig\Template
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
            'page' => array($this, 'block_page'),
            'content' => array($this, 'block_content'),
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
    public function block_page($context, array $blocks = array())
    {
        echo "index";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>s5 is StudentRND's single sign-on system.</h1>
    <p>s5 syncs your information between StudentRND events (such as CodeDay and Labs) and services (like our online
       community). Volunteers can use s5 to log into collaboration apps and email.</p>
    ";
        // line 7
        if ( !(isset($context["me"]) ? $context["me"] : null)) {
            // line 8
            echo "        <p>You can't register for an account directly, you'll register or be invited when you need it.</p>
    ";
        }
        // line 10
        echo "    <p>If you have a question about s5, <a href=\"mailto:tylermenezes@studentrnd.org\">contact us</a>.</p>
";
    }

    public function getTemplateName()
    {
        return "index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 10,  53 => 8,  51 => 7,  46 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}
