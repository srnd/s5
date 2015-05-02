<?php

/* admin/invites/delete */
class __TwigTemplate_6f258cd5c0e1c388beade75779c9cc065b326a7084202424f6c54ebe0c469fc1 extends TwigBridge\Twig\Template
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
        echo "Deleting ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "code", array()), "html", null, true);
        echo " // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin invites delete";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "admin";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Delete ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "code", array()), "html", null, true);
        echo "?</h1>
    <p>There is no undo.</p>
    <form method=\"post\" autocomplete=\"off\">
        <input type=\"submit\" value=\"Delete it!\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "admin/invites/delete";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 6,  59 => 5,  53 => 4,  47 => 3,  39 => 2,  11 => 1,);
    }
}
