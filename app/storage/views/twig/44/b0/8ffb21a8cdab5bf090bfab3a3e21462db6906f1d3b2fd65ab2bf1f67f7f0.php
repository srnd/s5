<?php

/* admin/users/new */
class __TwigTemplate_44b08ffb21a8cdab5bf090bfab3a3e21462db6906f1d3b2fd65ab2bf1f67f7f0 extends TwigBridge\Twig\Template
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
        echo "New User // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin users new";
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
        echo "    <h1>Create New User</h1>
    <form method=\"post\" autocomplete=\"off\">
        <p>This will create a new user and send them a welcome email. (In general, users should be created by a
           third-party service using the API rather than directly.)</p>

        <h2>Basic Details</h2>
        <section>
            <input type=\"text\" name=\"first_name\" id=\"first_name\" placeholder=\"First Name\" required value=\"\" autocomplete=\"off\" />
            <input type=\"text\" name=\"last_name\" id=\"last_name\" placeholder=\"Last Name\" required value=\"\" autocomplete=\"off\" />
            <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" required value=\"\" autocomplete=\"off\" />
        </section>

        <h2>Login Details</h2>
        <section>
            <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Username\" required value=\"\" pattern=\"[a-zA-Z0-9\\._]{1,50}\" autocomplete=\"off\" />
            <select name=\"password_type\" id=\"password_type\">
                <option value=\"generate\">Generate a password</option>
                <option value=\"set\">Set a password</option>
            </select>
            <input type=\"password\" style=\"display:none\" name=\"password\" id=\"password\" placeholder=\"Password\" value=\"\" autocomplete=\"off\" />
            <input type=\"submit\" value=\"Create\" />
        </section>
    </form>
";
    }

    // line 30
    public function block_scripts($context, array $blocks = array())
    {
        // line 31
        echo "    <script type=\"text/javascript\">
        (function(){
            var user_create_form = {
                field_name_first: document.getElementById('first_name'),
                field_name_last: document.getElementById('last_name'),
                field_email: document.getElementById('email'),
                field_username: document.getElementById('username'),
                field_password: document.getElementById('password'),
                field_password_type: document.getElementById('password_type'),

                username_has_been_updated: false,

                suggestUsername: function()
                {
                    if (!this.username_has_been_updated) {
                        this.field_username.value =   this.field_name_first.value.toLowerCase()
                                                    + this.field_name_last.value.toLowerCase();

                        this.checkUsername();
                    }
                },

                checkUsername: function()
                {
                    if (this.field_username.value !== '') {
                        window['_util'].ajax('POST',
                            '/api/user/exists',
                            {username: this.field_username.value},
                            function(data) {

                                user_create_form.field_username.classList.remove('taken');
                                user_create_form.field_username.classList.remove('available');

                                if (data.exists) {
                                    user_create_form.field_username.classList.add('taken')
                                } else {
                                    user_create_form.field_username.classList.add('available');
                                }
                            }
                        );
                    } else {
                        user_create_form.field_username.classList.remove('taken');
                        user_create_form.field_username.classList.remove('available');
                    }
                },

                checkEmail: function()
                {
                    var re = /^(([^<>()[\\]\\\\.,;:\\s@\\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\\"]+)*)|(\\\".+\\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))\$/;
                    if (re.test(this.field_email.value)) {
                        window['_util'].ajax('POST',
                            '/api/user/registered',
                            {email: this.field_email.value},
                            function(data) {

                                user_create_form.field_email.classList.remove('used');
                                user_create_form.field_email.classList.remove('unused');

                                if (data.exists) {
                                    user_create_form.field_email.classList.add('used')
                                } else {
                                    user_create_form.field_email.classList.add('unused');
                                }
                            }
                        );
                    } else {
                        user_create_form.field_email.classList.remove('used');
                        user_create_form.field_email.classList.remove('unused');
                    }
                },

                showHidePassword: function()
                {
                    if (this.field_password_type.value == 'set') {
                        this.field_password.style.display = 'block';
                        this.field_password.value = '';
                        this.field_password.required = true;
                    } else {
                        this.field_password.style.display = 'none';
                        this.field_password.value = '';
                        this.field_password.required = false;
                    }
                },

                usernameOnChange: function()
                {
                    if (   this.field_username.value == ''
                        || this.field_username.value == (  this.field_name_first.value.toLowerCase()
                                                         + this.field_name_last.value.toLowerCase())) {
                        this.username_has_been_updated = false;
                        this.suggestUsername();
                    } else {
                        this.username_has_been_updated = true;
                    }

                    this.checkUsername();
                },

                setup: function()
                {
                    this.field_name_first.addEventListener('input', function(){user_create_form.suggestUsername()});
                    this.field_name_last.addEventListener('input', function(){user_create_form.suggestUsername()});
                    this.field_username.addEventListener('change', function(){user_create_form.usernameOnChange()});
                    this.field_username.addEventListener('input', function(){user_create_form.usernameOnChange()});
                    this.field_email.addEventListener('input', function(){user_create_form.checkEmail()});

                    setTimeout(function(){
                        user_create_form.field_username.value = '';
                        user_create_form.field_password.value = '';
                        user_create_form.username_has_been_updated = false;
                    }, 750);
                }
            };
            user_create_form.setup();
        })();
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/users/new";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 31,  88 => 30,  61 => 6,  58 => 5,  52 => 4,  46 => 3,  40 => 2,  11 => 1,);
    }
}
