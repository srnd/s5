<?php

/* user/edit */
class __TwigTemplate_aaa404df7dc787acd0d090d6e92dc3b466ec8f9f86e0895bab989db9d7652906 extends TwigBridge\Twig\Template
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
        echo "Editing ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "edit user";
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
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
        echo "</h1>
    ";
        // line 7
        if (((isset($context["success_from"]) ? $context["success_from"] : null) == "changepassword")) {
            // line 8
            echo "        <section class=\"success\">
            ";
            // line 9
            if (($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "userID", array()) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "userID", array()))) {
                // line 10
                echo "                Your
            ";
            } else {
                // line 12
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
                echo "'s
            ";
            }
            // line 14
            echo "            password was changed.
        </section>
    ";
        }
        // line 17
        echo "
    ";
        // line 18
        if (((isset($context["error"]) ? $context["error"] : null) == "required")) {
            // line 19
            echo "        <section class=\"error\">
            ";
            // line 20
            if ($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
                // line 21
                echo "                Username,
            ";
            }
            // line 23
            echo "            First Name, Last Name, and Email are all required.
        </section>
    ";
        } elseif ((        // line 25
(isset($context["error"]) ? $context["error"] : null) == "dupeuser")) {
            // line 26
            echo "        <section class=\"error\">
            That username is already in use by <a href=\"/user/";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dupeuser"]) ? $context["dupeuser"] : null), "username", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dupeuser"]) ? $context["dupeuser"] : null), "name", array()), "html", null, true);
            echo "</a>.
        </section>
    ";
        } elseif ((        // line 29
(isset($context["error"]) ? $context["error"] : null) == "dupeemail")) {
            // line 30
            echo "        <section class=\"error\">
            That email is already in
            ";
            // line 32
            if ($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
                // line 33
                echo "                use by <a href=\"/user/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dupeuser"]) ? $context["dupeuser"] : null), "username", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dupeuser"]) ? $context["dupeuser"] : null), "name", array()), "html", null, true);
                echo "</a>.
            ";
            } else {
                // line 35
                echo "                use.
            ";
            }
            // line 37
            echo "        </section>
    ";
        }
        // line 39
        echo "
    <section class=\"photo\">
        <img id=\"previewphoto\" src=\"/photo/";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "_128.jpg\" />
        <form method=\"post\">
            <input type=\"file\" name=\"photo\" id=\"uploadphoto\" style=\"display:none\" />
        </form>
    </section>
    <form method=\"post\">
        <section>
            <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Username\" required pattern=\"[a-zA-Z0-9\\._]{1,50}\" ";
        // line 48
        if ( !$this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
            echo "readonly";
        }
        echo " value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "\" />
            <input type=\"text\" name=\"first_name\" id=\"first_name\" placeholder=\"First Name\" required value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
        echo "\" />
            <input type=\"text\" name=\"last_name\" id=\"last_name\" placeholder=\"Last Name\" required value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name", array()), "html", null, true);
        echo "\" />
            <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" required value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "\" />
            <input type=\"tel\" pattern=\"\\d{10,11}\" name=\"phone\" id=\"phone\" placeholder=\"Phone Number (no dashes)\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone", array()), "html", null, true);
        echo "\" />
        </section>

        <h2>Address</h2>
        <section>
            <input type=\"text\" name=\"address_line_1\" id=\"address_line_1\" placeholder=\"Address Line 1\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address_line_1", array()), "html", null, true);
        echo "\" />
            <input type=\"text\" name=\"address_line_2\" id=\"address_line_2\" placeholder=\"Address Line 2\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address_line_2", array()), "html", null, true);
        echo "\" />
            <input type=\"text\" name=\"city\" id=\"city\" placeholder=\"City\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "city", array()), "html", null, true);
        echo "\" /><input type=\"text\" name=\"state\" id=\"state\" placeholder=\"State\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "state", array()), "html", null, true);
        echo "\" /><input type=\"text\" name=\"postal_code\" id=\"postal_code\" placeholder=\"Postal Code\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "postal_code", array()), "html", null, true);
        echo "\" />
            <input type=\"text\" name=\"country\" id=\"country\" placeholder=\"Country\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "country", array()), "html", null, true);
        echo "\" />
        </section>
        ";
        // line 62
        if ($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
            // line 63
            echo "            <input type=\"checkbox\" name=\"is_admin\" id=\"is_admin\" value=\"1\" ";
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "is_admin", array())) {
                echo "checked";
            }
            echo " />
            <label for=\"is_admin\">Is admin</label>
        ";
        }
        // line 66
        echo "        <input type=\"submit\" value=\"Update\" />
    </form>
    <p><a href=\"/user/";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/password\">Want to change
       ";
        // line 69
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()) == $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "username", array()))) {
            echo "your";
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
            echo "'s";
        }
        echo " password?</a></p>
    ";
        // line 70
        if (($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array()) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()) != $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "username", array())))) {
            // line 71
            echo "        <p><a href=\"/user/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
            echo "/delete\">Trying to delete ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
            echo "?</a></p>
        <p><a href=\"/user/";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
            echo "/impersonate\">Want to impersonate ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
            echo "?</a></p>
    ";
        }
        // line 74
        echo "    <p><a href=\"/user/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "\">Cancel editing</a></p>
";
    }

    // line 76
    public function block_scripts($context, array $blocks = array())
    {
        // line 77
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>
    <script type=\"text/javascript\">
        \$('#previewphoto').click(function(){
            \$('#uploadphoto').click();
        });

        \$('#uploadphoto').change(function(){
            var file = this.files[0];
            name = file.name;
            size = file.size;
            type = file.type;

            if(file.name.length < 1) {

            } else if(file.size > (1024*1024*20)) {
                alert(\"File uploads are limited to 20MB.\");
            } else if(file.type != 'image/png' && file.type != 'image/jpg' && !file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                alert(\"Please upload a PNG, JPG, or GIF file.\");
            } else {
                var formData = new FormData(\$(this).parent()[0]);
                \$.ajax({
                    url: '/user/";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/uploadphoto',  //server script to process data
                    type: 'POST',
                    success: completeHandler = function(data) {
                        \$('#previewphoto').attr('src', '/photo/";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "_128.jpg?'+new Date().getTime());
                    },
                    error: errorHandler = function() {
                        alert(\"Something went wrong.\");
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }, 'json');
            }
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "user/edit";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 101,  283 => 98,  260 => 77,  257 => 76,  250 => 74,  243 => 72,  236 => 71,  234 => 70,  225 => 69,  221 => 68,  217 => 66,  208 => 63,  206 => 62,  201 => 60,  193 => 59,  189 => 58,  185 => 57,  177 => 52,  173 => 51,  169 => 50,  165 => 49,  157 => 48,  147 => 41,  143 => 39,  139 => 37,  135 => 35,  127 => 33,  125 => 32,  121 => 30,  119 => 29,  112 => 27,  109 => 26,  107 => 25,  103 => 23,  99 => 21,  97 => 20,  94 => 19,  92 => 18,  89 => 17,  84 => 14,  78 => 12,  74 => 10,  72 => 9,  69 => 8,  67 => 7,  62 => 6,  59 => 5,  53 => 4,  47 => 3,  40 => 2,  11 => 1,);
    }
}
