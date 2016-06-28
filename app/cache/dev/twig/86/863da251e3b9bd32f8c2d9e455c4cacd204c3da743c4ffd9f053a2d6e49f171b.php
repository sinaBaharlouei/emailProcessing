<?php

/* @User/Profile/Profile.html.twig */
class __TwigTemplate_5974b4c1104da0eda5b75178efc7532de18787b67d5367122f61e02f813a3791 extends Twig_Template
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
        $__internal_e8e4b8bb79e69fe60e562a1afb1979f139cc78ca612ec99e4e300697b31fe8c8 = $this->env->getExtension("native_profiler");
        $__internal_e8e4b8bb79e69fe60e562a1afb1979f139cc78ca612ec99e4e300697b31fe8c8->enter($__internal_e8e4b8bb79e69fe60e562a1afb1979f139cc78ca612ec99e4e300697b31fe8c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/Profile/Profile.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>IE Project 4</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/Profile.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" type=\"text/css\" href=";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/LoginRegister.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" type=\"text/css\" href=";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/Users.css"), "html", null, true);
        echo ">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <script src=";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery-1.12.0.js"), "html", null, true);
        echo "></script>
    <script type=\"text/javascript\">
        \$(document).ready(function() {
            \$.ajax({
                type: \"GET\",
                url: \"/profile/getProfile\",
                dataType: \"xml\",
                cache: false,
                async: false,
                success: function (xml) {
                    var data = \$(xml).children('data');
                    var contacts = data.children('contacts');

                    var it = '<img src=\"' + data.children('img').text() + '\"><br><span>First Name: </span><sapn >' + data.children('first').text() + '</span><br><span>Last Name: </span><span>' + data.children('last').text() + '</span><br><span>Email: </span><span>' + data.children('username').text() + '</span>';
                    contacts.children('contact').each(function () {
                        var person = '<div class=\"person\"><img src=\"' + \$(this).children('img').text() + '\"><br><span>First Name: </span><span >' + \$(this).children('first').text() + '</span><br><span>Last Name: </span><span>' + \$(this).children('last').text() + '</span><br><span>Email: </span><span>' + \$(this).children('username').text() + '</span><br></div>';
                        \$(\"#contacts\").append(it).append(person);
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    console.log(jqXHR.responseText);
                    // STOP LOADING SPINNER
                }
            });
        });


    </script>

</head>
<body>
<div id=\"data\">
    <!--<img src=\"\"><br>
    <span>First Name: </span>
    <sapn >farid</span><br>
    <span>Last Name: </span>
    <span>laya</span><br>
    <span>Email: </span>
    <span>e@gmail.com</span>!-->
</div>
<form id=\"registeration\" style=\"margin-left: auto;margin-right: auto;\">
    <div style=\"width: 70%;height: 300px;margin-left: auto;margin-right: auto;\">
        <div class=\"titles\">
            <h5>First Name :</h5>
            <h5>Last Name :</h5>
            <h5>Email :</h5>
            <h5>Password :</h5>
            <h5>Image :</h5>
        </div>
        <div class=\"inputs\">
            <input type=\"text\" name=\"firstname\">
            <input type=\"text\" name=\"lastname\">
            <input type=\"email\" name=\"email\">
            <input type=\"password\" name=\"pass\">
            <input type=\"file\" name=\"image\">
        </div>
        <input type=\"submit\" value=\"Save Changes\" style=\"background-color: #97d9ff\">
    </div>
</form>
<div id=\"contacts\">
    <!--<div class=\"person\">
        <img src=\"\"><br>
        <span>First Name: </span>
        <span >hasan</span><br>
        <span>Last Name: </span>
        <span>hasani</span><br>
        <span>Email: </span>
        <span>hasan@e.ir</span><br>
        </div>
    <div class=\"person\">
        <img src=\"\"><br>
        <span>First Name: </span>
        <span >hasan</span><br>
        <span>Last Name: </span>
        <span>hasani</span><br>
        <span>Email: </span>
        <span>hasan@e.ir</span><br>
    </div>!-->
</div>
<a href=";
        // line 89
        echo $this->env->getExtension('routing')->getPath("profile_users");
        echo ">Add contacts</a>
</body>
</html>";
        
        $__internal_e8e4b8bb79e69fe60e562a1afb1979f139cc78ca612ec99e4e300697b31fe8c8->leave($__internal_e8e4b8bb79e69fe60e562a1afb1979f139cc78ca612ec99e4e300697b31fe8c8_prof);

    }

    public function getTemplateName()
    {
        return "@User/Profile/Profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 89,  41 => 9,  36 => 7,  32 => 6,  28 => 5,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <title>IE Project 4</title>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/Profile.css') }}>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/LoginRegister.css') }}>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/Users.css') }}>*/
/*     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/*     <script src={{ asset('js/jquery-1.12.0.js') }}></script>*/
/*     <script type="text/javascript">*/
/*         $(document).ready(function() {*/
/*             $.ajax({*/
/*                 type: "GET",*/
/*                 url: "/profile/getProfile",*/
/*                 dataType: "xml",*/
/*                 cache: false,*/
/*                 async: false,*/
/*                 success: function (xml) {*/
/*                     var data = $(xml).children('data');*/
/*                     var contacts = data.children('contacts');*/
/* */
/*                     var it = '<img src="' + data.children('img').text() + '"><br><span>First Name: </span><sapn >' + data.children('first').text() + '</span><br><span>Last Name: </span><span>' + data.children('last').text() + '</span><br><span>Email: </span><span>' + data.children('username').text() + '</span>';*/
/*                     contacts.children('contact').each(function () {*/
/*                         var person = '<div class="person"><img src="' + $(this).children('img').text() + '"><br><span>First Name: </span><span >' + $(this).children('first').text() + '</span><br><span>Last Name: </span><span>' + $(this).children('last').text() + '</span><br><span>Email: </span><span>' + $(this).children('username').text() + '</span><br></div>';*/
/*                         $("#contacts").append(it).append(person);*/
/*                     });*/
/*                 }, error: function (jqXHR, textStatus, errorThrown) {*/
/*                     // Handle errors here*/
/*                     console.log('ERRORS: ' + textStatus);*/
/*                     console.log(jqXHR.responseText);*/
/*                     // STOP LOADING SPINNER*/
/*                 }*/
/*             });*/
/*         });*/
/* */
/* */
/*     </script>*/
/* */
/* </head>*/
/* <body>*/
/* <div id="data">*/
/*     <!--<img src=""><br>*/
/*     <span>First Name: </span>*/
/*     <sapn >farid</span><br>*/
/*     <span>Last Name: </span>*/
/*     <span>laya</span><br>*/
/*     <span>Email: </span>*/
/*     <span>e@gmail.com</span>!-->*/
/* </div>*/
/* <form id="registeration" style="margin-left: auto;margin-right: auto;">*/
/*     <div style="width: 70%;height: 300px;margin-left: auto;margin-right: auto;">*/
/*         <div class="titles">*/
/*             <h5>First Name :</h5>*/
/*             <h5>Last Name :</h5>*/
/*             <h5>Email :</h5>*/
/*             <h5>Password :</h5>*/
/*             <h5>Image :</h5>*/
/*         </div>*/
/*         <div class="inputs">*/
/*             <input type="text" name="firstname">*/
/*             <input type="text" name="lastname">*/
/*             <input type="email" name="email">*/
/*             <input type="password" name="pass">*/
/*             <input type="file" name="image">*/
/*         </div>*/
/*         <input type="submit" value="Save Changes" style="background-color: #97d9ff">*/
/*     </div>*/
/* </form>*/
/* <div id="contacts">*/
/*     <!--<div class="person">*/
/*         <img src=""><br>*/
/*         <span>First Name: </span>*/
/*         <span >hasan</span><br>*/
/*         <span>Last Name: </span>*/
/*         <span>hasani</span><br>*/
/*         <span>Email: </span>*/
/*         <span>hasan@e.ir</span><br>*/
/*         </div>*/
/*     <div class="person">*/
/*         <img src=""><br>*/
/*         <span>First Name: </span>*/
/*         <span >hasan</span><br>*/
/*         <span>Last Name: </span>*/
/*         <span>hasani</span><br>*/
/*         <span>Email: </span>*/
/*         <span>hasan@e.ir</span><br>*/
/*     </div>!-->*/
/* </div>*/
/* <a href={{ path('profile_users') }}>Add contacts</a>*/
/* </body>*/
/* </html>*/
