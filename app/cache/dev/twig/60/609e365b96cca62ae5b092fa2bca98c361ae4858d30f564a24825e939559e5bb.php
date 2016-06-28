<?php

/* @User/Profile/Users.html.twig */
class __TwigTemplate_42ca92f5a489e43a5cb7f6bdf24c5303734981e3fb998f177468802457bee16f extends Twig_Template
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
        $__internal_facd86833b63d8b0f062e5dfb704737f240dc735bc5ef811a5fe148183d0bee8 = $this->env->getExtension("native_profiler");
        $__internal_facd86833b63d8b0f062e5dfb704737f240dc735bc5ef811a5fe148183d0bee8->enter($__internal_facd86833b63d8b0f062e5dfb704737f240dc735bc5ef811a5fe148183d0bee8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/Profile/Users.html.twig"));

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
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/Users.css"), "html", null, true);
        echo ">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
</head>
<body>
    ";
        // line 10
        if ((isset($context["message"]) ? $context["message"] : $this->getContext($context, "message"))) {
            // line 11
            echo "        <p>";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
    ";
        }
        // line 13
        echo "
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 15
            echo "        ";
            if (($this->getAttribute((isset($context["me"]) ? $context["me"] : $this->getContext($context, "me")), "id", array()) != $this->getAttribute($context["user"], "id", array()))) {
                // line 16
                echo "        <div class=\"person\">
            <img src=\"\"><br>
            <span>First Name: </span>
            <span >";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true);
                echo "</span><br>
            <span>Last Name: </span>
            <span>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
                echo "</span><br>
            <span>Email: </span>
            <span class=\"email\">";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
                echo "</span><br>
            <a href=";
                // line 24
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("profile_add_contact", array("user_id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
                echo ">
                <button type=\"button\" class=\"add\">Add to my contacts</button>
            </a>
        </div>
        ";
            }
            // line 29
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</body>
</html>
    <script src=";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery-1.12.0.js"), "html", null, true);
        echo "></script>
    <script type=\"text/javascript\">
        \$(document).ready(function(){
            \$.ajax({
                type:\"GET\",
                url : ";
        // line 37
        echo $this->env->getExtension('routing')->getPath("profile_get_users");
        echo ",
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {
                    var data=\$(xml).children('users');

                    contacts.children('user').each(function(){
                        var person='<div class=\"person\"><img src=\"'+\$(this).children('img').text()+'\"><br><span>First Name: </span><span >'+\$(this).children('first').text()+'</span><br><span>Last Name: </span><span>'+\$(this).children('last').text()+'</span><br><span>Email: </span><span>'+\$(this).children('username').text()+'</span><br><button type=\"button\">Add to my contacts</button></div>';
                        \$('body').append(person);
                    });
                    \$(document).on('click','.add',function(){
                        var x=\$(this);
                        var username=x.parent().children(\"email\").text();
                        \$.ajax({
                            method: 'get',
                            url: '../server.php?add='+username,
                            success: function(data){
                                 alert(\"successfuly added to your contacts.\");
                                 x.css('background-color', 'green');
                            },error: function(jqXHR, textStatus, errorThrown)
                            {
                             // Handle errors here
                             console.log('ERRORS: ' + textStatus);
                             console.log(jqXHR.responseText);
                             // STOP LOADING SPINNER
                             }
                            });
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }
            });

    
    </script>";
        
        $__internal_facd86833b63d8b0f062e5dfb704737f240dc735bc5ef811a5fe148183d0bee8->leave($__internal_facd86833b63d8b0f062e5dfb704737f240dc735bc5ef811a5fe148183d0bee8_prof);

    }

    public function getTemplateName()
    {
        return "@User/Profile/Users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 37,  94 => 32,  90 => 30,  84 => 29,  76 => 24,  72 => 23,  67 => 21,  62 => 19,  57 => 16,  54 => 15,  50 => 14,  47 => 13,  41 => 11,  39 => 10,  32 => 6,  28 => 5,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <title>IE Project 4</title>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/Profile.css') }}>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/Users.css') }}>*/
/*     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/* </head>*/
/* <body>*/
/*     {% if message %}*/
/*         <p>{{ message }}</p>*/
/*     {% endif %}*/
/* */
/*     {% for user in users %}*/
/*         {% if me.id != user.id %}*/
/*         <div class="person">*/
/*             <img src=""><br>*/
/*             <span>First Name: </span>*/
/*             <span >{{ user.name }}</span><br>*/
/*             <span>Last Name: </span>*/
/*             <span>{{ user.lastName }}</span><br>*/
/*             <span>Email: </span>*/
/*             <span class="email">{{ user.email }}</span><br>*/
/*             <a href={{  path( 'profile_add_contact', { 'user_id': user.id }) }}>*/
/*                 <button type="button" class="add">Add to my contacts</button>*/
/*             </a>*/
/*         </div>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* </body>*/
/* </html>*/
/*     <script src={{ asset('js/jquery-1.12.0.js') }}></script>*/
/*     <script type="text/javascript">*/
/*         $(document).ready(function(){*/
/*             $.ajax({*/
/*                 type:"GET",*/
/*                 url : {{ path('profile_get_users') }},*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/*                     var data=$(xml).children('users');*/
/* */
/*                     contacts.children('user').each(function(){*/
/*                         var person='<div class="person"><img src="'+$(this).children('img').text()+'"><br><span>First Name: </span><span >'+$(this).children('first').text()+'</span><br><span>Last Name: </span><span>'+$(this).children('last').text()+'</span><br><span>Email: </span><span>'+$(this).children('username').text()+'</span><br><button type="button">Add to my contacts</button></div>';*/
/*                         $('body').append(person);*/
/*                     });*/
/*                     $(document).on('click','.add',function(){*/
/*                         var x=$(this);*/
/*                         var username=x.parent().children("email").text();*/
/*                         $.ajax({*/
/*                             method: 'get',*/
/*                             url: '../server.php?add='+username,*/
/*                             success: function(data){*/
/*                                  alert("successfuly added to your contacts.");*/
/*                                  x.css('background-color', 'green');*/
/*                             },error: function(jqXHR, textStatus, errorThrown)*/
/*                             {*/
/*                              // Handle errors here*/
/*                              console.log('ERRORS: ' + textStatus);*/
/*                              console.log(jqXHR.responseText);*/
/*                              // STOP LOADING SPINNER*/
/*                              }*/
/*                             });*/
/*                     });*/
/*                 },error: function(jqXHR, textStatus, errorThrown)*/
/*                          {*/
/*                          // Handle errors here*/
/*                          console.log('ERRORS: ' + textStatus);*/
/*                          console.log(jqXHR.responseText);*/
/*                          // STOP LOADING SPINNER*/
/*                          }*/
/*             });*/
/* */
/*     */
/*     </script>*/
