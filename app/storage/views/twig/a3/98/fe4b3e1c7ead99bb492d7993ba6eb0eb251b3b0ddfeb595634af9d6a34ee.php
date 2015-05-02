<?php

/* admin/index */
class __TwigTemplate_a398fe4b3e1c7ead99bb492d7993ba6eb0eb251b3b0ddfeb595634af9d6a34ee extends TwigBridge\Twig\Template
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
        echo "Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin";
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
        echo "    <h1>Admin</h1>
    <ul>
        <li><a href=\"/admin/users\">Users</a></li>
        <li><a href=\"/admin/applications\">Applications</a></li>
        <li><a href=\"/admin/groups\">Groups</a></li>
        <li><a href=\"/admin/invites\">Invites</a></li>
    </ul>
";
    }

    public function getTemplateName()
    {
        return "admin/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
