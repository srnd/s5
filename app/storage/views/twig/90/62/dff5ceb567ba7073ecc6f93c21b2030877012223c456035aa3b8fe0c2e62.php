<?php

/* user/2fa/index */
class __TwigTemplate_9062dff5ceb567ba7073ecc6f93c21b2030877012223c456035aa3b8fe0c2e62 extends TwigBridge\Twig\Template
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
        echo "Changing Password";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "user 2fa index";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "user";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Two-Factor Login Credentials</h1>

    ";
        // line 8
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "second_factors", array())) > 0)) {
            // line 9
            echo "        <table>
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "second_factors", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["factor"]) {
                // line 19
                echo "                    <tr>
                        <td>";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["factor"], "name", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 21
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["factor"], "created_at", array()), "timestamp", array()), "F j, Y"), "html", null, true);
                echo "</td>
                        <td><a href=\"/user/";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
                echo "/2fa/delete/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["factor"], "id", array()), "html", null, true);
                echo "\">Delete</a></td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['factor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 28
            echo "        <p>You do not currently have a second factor authentication device.</p>
    ";
        }
        // line 30
        echo "
    <p><a href=\"/user/";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/2fa/new/yubikey\">New Yubikey</a></p>
    <p><a href=\"/user/";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/2fa/new/totp\">New Google Authenticator</a></p>
";
    }

    public function getTemplateName()
    {
        return "user/2fa/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 32,  115 => 31,  112 => 30,  108 => 28,  103 => 25,  92 => 22,  88 => 21,  84 => 20,  81 => 19,  77 => 18,  66 => 9,  64 => 8,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
