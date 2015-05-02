<?php

/* admin/users/index */
class __TwigTemplate_9b124cb6c26a1eb46b95763fd9e94ce207b1722d6efa54fcf9e476cbb9df6c3c extends TwigBridge\Twig\Template
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
        echo "Users // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin users";
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
        echo "    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>pic</th>
                <th>id</th>
                <th>username</th>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 19
            echo "                <tr>
                    <td><img src=\"/photo/";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "_16.jpg\"</td>
                    <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "userID", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true);
            echo "</td>
                    <td>
                        <a href=\"/user/";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "/edit\">Edit</a>

                        ";
            // line 27
            if ($this->getAttribute($context["user"], "trashed", array())) {
                // line 28
                echo "                            <a href=\"/admin/users/restore/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
                echo "\">Restore</a>
                        ";
            }
            // line 30
            echo "                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>
    ";
        // line 35
        if ( !(isset($context["show_trashed"]) ? $context["show_trashed"] : null)) {
            // line 36
            echo "        <a href=\"?trashed\">Show trashed</a>
    ";
        }
        // line 38
        echo "
    <a class=\"action\" href=\"/admin/users/new\">Create new</a>
";
    }

    public function getTemplateName()
    {
        return "admin/users/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 38,  125 => 36,  123 => 35,  119 => 33,  111 => 30,  105 => 28,  103 => 27,  98 => 25,  93 => 23,  89 => 22,  85 => 21,  81 => 20,  78 => 19,  74 => 18,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
