<?php

/* @User/User/LoginRegister.html.twig */
class __TwigTemplate_2aab24b68a772b84003678fc9f8c21c8c731fd5e3e169521563ca4c8a63f2064 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_94bbe800f2a60b4cc258c9782a5cf40eb3d8b14323fe2f77b82d044792f33ce9 = $this->env->getExtension("native_profiler");
        $__internal_94bbe800f2a60b4cc258c9782a5cf40eb3d8b14323fe2f77b82d044792f33ce9->enter($__internal_94bbe800f2a60b4cc258c9782a5cf40eb3d8b14323fe2f77b82d044792f33ce9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/User/LoginRegister.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>IE Project 4</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/LoginRegister.css"), "html", null, true);
        echo ">
</head>
<body>
    <div id=\"container\">
        ";
        // line 9
        if ((isset($context["message"]) ? $context["message"] : $this->getContext($context, "message"))) {
            // line 10
            echo "            <p>";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
        ";
        }
        // line 12
        echo "        <div class=\"forms\">
            <form id=\"registeration\" action=";
        // line 13
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo ">
                <div class=\"titles\">
                    <h5>First Name :</h5>
                    <h5>Last Name :</h5>
                    <h5>Email :</h5>
                    <h5>Password :</h5>
                    <h5>Image :</h5>
                    <input type=\"submit\" value=\"Register\" name=\"Register\">
                </div>
                <div class=\"inputs\">
                    <input type=\"text\" name=\"firstname\">
                    <input type=\"text\" name=\"lastname\">
                    <input type=\"email\" name=\"email\">
                    <input type=\"password\" name=\"pass\">
                    <input type=\"file\" name=\"image\">
                </div>
            </form>
        </div>
        <div class=\"forms\">
            <form id=\"login\" method=\"post\" action=";
        // line 32
        echo $this->env->getExtension('routing')->getPath("user_login_check");
        echo ">
                <div class=\"titles\">
                    <h5>Email :</h5>
                    <h5>Password :</h5>
                    <input type=\"checkbox\" type=\"checkbox\" tabindex=\"3\" class=\"\" name=\"_remember_me\" id=\"remember\"> <h6>Remember me</h6>
                    <input type=\"submit\" value=\"Login\" name=\"login-submit\" id=\"login-submit\">
                </div>
                <div class=\"inputs\">
                    <input type=\"email\" id=\"username\" name=\"_username\">
                    <input type=\"password\" id=\"password\" name=\"_password\">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

 <script type=\"text/javascript\" src=";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery-1.12.0.js"), "html", null, true);
        echo "></script>";
        
        $__internal_94bbe800f2a60b4cc258c9782a5cf40eb3d8b14323fe2f77b82d044792f33ce9->leave($__internal_94bbe800f2a60b4cc258c9782a5cf40eb3d8b14323fe2f77b82d044792f33ce9_prof);

    }

    public function getTemplateName()
    {
        return "@User/User/LoginRegister.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 49,  68 => 32,  46 => 13,  43 => 12,  37 => 10,  35 => 9,  28 => 5,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <title>IE Project 4</title>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/LoginRegister.css') }}>*/
/* </head>*/
/* <body>*/
/*     <div id="container">*/
/*         {% if message %}*/
/*             <p>{{ message }}</p>*/
/*         {% endif %}*/
/*         <div class="forms">*/
/*             <form id="registeration" action={{ path('user_register') }}>*/
/*                 <div class="titles">*/
/*                     <h5>First Name :</h5>*/
/*                     <h5>Last Name :</h5>*/
/*                     <h5>Email :</h5>*/
/*                     <h5>Password :</h5>*/
/*                     <h5>Image :</h5>*/
/*                     <input type="submit" value="Register" name="Register">*/
/*                 </div>*/
/*                 <div class="inputs">*/
/*                     <input type="text" name="firstname">*/
/*                     <input type="text" name="lastname">*/
/*                     <input type="email" name="email">*/
/*                     <input type="password" name="pass">*/
/*                     <input type="file" name="image">*/
/*                 </div>*/
/*             </form>*/
/*         </div>*/
/*         <div class="forms">*/
/*             <form id="login" method="post" action={{ path('user_login_check') }}>*/
/*                 <div class="titles">*/
/*                     <h5>Email :</h5>*/
/*                     <h5>Password :</h5>*/
/*                     <input type="checkbox" type="checkbox" tabindex="3" class="" name="_remember_me" id="remember"> <h6>Remember me</h6>*/
/*                     <input type="submit" value="Login" name="login-submit" id="login-submit">*/
/*                 </div>*/
/*                 <div class="inputs">*/
/*                     <input type="email" id="username" name="_username">*/
/*                     <input type="password" id="password" name="_password">*/
/*                 </div>*/
/*             </form>*/
/*         </div>*/
/*     </div>*/
/* </body>*/
/* </html>*/
/* */
/*  <script type="text/javascript" src={{ asset('js/jquery-1.12.0.js') }}></script>*/
