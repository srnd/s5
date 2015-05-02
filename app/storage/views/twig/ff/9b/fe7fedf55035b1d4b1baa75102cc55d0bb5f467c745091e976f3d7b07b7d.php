<?php

/* admin/invites/edit */
class __TwigTemplate_ff9bfe7fedf55035b1d4b1baa75102cc55d0bb5f467c745091e976f3d7b07b7d extends TwigBridge\Twig\Template
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
        echo "Editing ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "name", array()), "html", null, true);
        echo " // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin invite edit";
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
        echo "    <h1>Editing ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "code", array()), "html", null, true);
        echo "</h1>
    <form method=\"post\" autocomplete=\"off\">
        <input type=\"text\" name=\"only_for_description\" id=\"only_for_description\" placeholder=\"Only For... (e.g. staff members)\" required value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "only_for_description", array()), "html", null, true);
        echo "\" autocomplete=\"off\" />
        <input type=\"checkbox\" name=\"gapps\" id=\"gapps\" value=\"1\" ";
        // line 9
        if ($this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "gapps", array())) {
            echo "checked";
        }
        echo " />
        <label for=\"gapps\">Create GApps*</label>
        <input type=\"submit\" value=\"Update\" />
    </form>
    <p><a href=\"/admin/invites/";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "id", array()), "html", null, true);
        echo "/delete\">Want to delete this invite?</a></p>
    <p><a href=\"/invite/";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "code", array()), "html", null, true);
        echo "\">Invite link</a></p>

    <h1>Groups</h1>
    <ul>
        ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "groups", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 19
            echo "            <li>
                ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "name", array()), "html", null, true);
            echo "
                <form action=\"/admin/invites/";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "id", array()), "html", null, true);
            echo "/removegroup\" method=\"post\">
                    <input type=\"hidden\" name=\"groupID\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "\" />
                    <input type=\"submit\" value=\"remove\" />
                </form>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </ul>
    <form action=\"/admin/invites/";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["invite"]) ? $context["invite"] : null), "id", array()), "html", null, true);
        echo "/addgroup\" method=\"post\">
        <select name=\"groupID\">
            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["all_unadded_groups"]) ? $context["all_unadded_groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 31
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "name", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </select>
        <input type=\"submit\" value=\"Add\" />
    </form>
    <p>
      * When checked, this invite will create a Google Apps account (which includes a @studentrnd.org email) for each user
      that registers with it.
    </p>
";
    }

    public function getTemplateName()
    {
        return "admin/invites/edit";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 33,  130 => 31,  126 => 30,  121 => 28,  118 => 27,  107 => 22,  103 => 21,  99 => 20,  96 => 19,  92 => 18,  85 => 14,  81 => 13,  72 => 9,  68 => 8,  62 => 6,  59 => 5,  53 => 4,  47 => 3,  39 => 2,  11 => 1,);
    }
}
