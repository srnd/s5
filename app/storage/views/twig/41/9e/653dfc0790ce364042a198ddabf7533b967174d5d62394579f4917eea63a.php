<?php

/* admin/invites/new */
class __TwigTemplate_419e653dfc0790ce364042a198ddabf7533b967174d5d62394579f4917eea63a extends TwigBridge\Twig\Template
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
        echo "New Invite // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin invites new";
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
        echo "    <h1>Create New Invite</h1>
    <form method=\"post\" autocomplete=\"off\">
        <input type=\"text\" name=\"only_for_description\" id=\"only_for_description\" placeholder=\"Only For... (e.g. staff members)\" required value=\"\" autocomplete=\"off\" />
        <input type=\"checkbox\" name=\"gapps\" id=\"gapps\" value=\"1\" />
        <label for=\"gapps\">Create GApps*</label>
        <input type=\"submit\" value=\"Create\" />
    </form>
    <p>
      * When checked, this invite will create a Google Apps account (which includes a @studentrnd.org email) for each user
      that registers with it.
    </p>
";
    }

    public function getTemplateName()
    {
        return "admin/invites/new";
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
