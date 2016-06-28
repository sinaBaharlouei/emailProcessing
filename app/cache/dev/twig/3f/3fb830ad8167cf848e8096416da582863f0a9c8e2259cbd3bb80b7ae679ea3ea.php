<?php

/* @User/User/target.html.twig */
class __TwigTemplate_85ab3f92d761b3014d8ecec859b6b4aeaabe617011f23b78c81c803774f37160 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_be6b6c034fa02000d6222e988ca3cb3eb650b167be5d77ab5d613067620dc4ee = $this->env->getExtension("native_profiler");
        $__internal_be6b6c034fa02000d6222e988ca3cb3eb650b167be5d77ab5d613067620dc4ee->enter($__internal_be6b6c034fa02000d6222e988ca3cb3eb650b167be5d77ab5d613067620dc4ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/User/target.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Elegant Login Form</title>
    <script src=\"http://s.codepen.io/assets/libs/modernizr.js\" type=\"text/javascript\"></script>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/login/reset.css"), "html", null, true);
        echo "\">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/login/style.css"), "html", null, true);
        echo "\">
</head>
<body>
";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        
        $__internal_be6b6c034fa02000d6222e988ca3cb3eb650b167be5d77ab5d613067620dc4ee->leave($__internal_be6b6c034fa02000d6222e988ca3cb3eb650b167be5d77ab5d613067620dc4ee_prof);

    }

    public function block_body($context, array $blocks = array())
    {
        $__internal_3a40e77404faeb12c47e0a215872b0ee73a3cde7b2f75a904131b579e8327278 = $this->env->getExtension("native_profiler");
        $__internal_3a40e77404faeb12c47e0a215872b0ee73a3cde7b2f75a904131b579e8327278->enter($__internal_3a40e77404faeb12c47e0a215872b0ee73a3cde7b2f75a904131b579e8327278_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 13
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("user_login_check");
        echo "\" method=\"post\" class=\"login\">

    <fieldset>

        <legend class=\"legend\">Login</legend>

        <div class=\"input\">
            <input type=\"email\" placeholder=\"Email\" id=\"username\" name=\"_username\" required/>
            <span><i class=\"fa fa-envelope-o\"></i></span>
        </div>

        <div class=\"input\">
            <input type=\"password\" placeholder=\"Password\" id=\"password\" name=\"_password\" required/>
            <span><i class=\"fa fa-lock\"></i></span>
        </div>

        <button type=\"submit\" class=\"submit\"><i class=\"fa fa-long-arrow-right\"></i></button>

    </fieldset>

    <div class=\"feedback\">
        login successful <br/>
        redirecting...
    </div>

</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/login/index.js"), "html", null, true);
        echo "\"></script>
</body>
</html>
";
        
        $__internal_3a40e77404faeb12c47e0a215872b0ee73a3cde7b2f75a904131b579e8327278->leave($__internal_3a40e77404faeb12c47e0a215872b0ee73a3cde7b2f75a904131b579e8327278_prof);

    }

    public function getTemplateName()
    {
        return "@User/User/target.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 41,  54 => 13,  42 => 12,  36 => 9,  31 => 7,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>Elegant Login Form</title>*/
/*     <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>*/
/*     <link rel="stylesheet" href="{{ asset('css/login/reset.css') }}">*/
/*     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>*/
/*     <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">*/
/* </head>*/
/* <body>*/
/* {% block body %}*/
/* <form action="{{ path('user_login_check') }}" method="post" class="login">*/
/* */
/*     <fieldset>*/
/* */
/*         <legend class="legend">Login</legend>*/
/* */
/*         <div class="input">*/
/*             <input type="email" placeholder="Email" id="username" name="_username" required/>*/
/*             <span><i class="fa fa-envelope-o"></i></span>*/
/*         </div>*/
/* */
/*         <div class="input">*/
/*             <input type="password" placeholder="Password" id="password" name="_password" required/>*/
/*             <span><i class="fa fa-lock"></i></span>*/
/*         </div>*/
/* */
/*         <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>*/
/* */
/*     </fieldset>*/
/* */
/*     <div class="feedback">*/
/*         login successful <br/>*/
/*         redirecting...*/
/*     </div>*/
/* */
/* </form>*/
/* <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>*/
/* */
/* <script src="{{ asset('js/login/index.js') }}"></script>*/
/* </body>*/
/* </html>*/
/* {% endblock %}*/
