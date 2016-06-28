<?php

/* @User/Profile/Inbox.html.twig */
class __TwigTemplate_d983b73b01bb6a02cf568c38ddd2da1bde103487233c490608bb01ae4bcded6b extends Twig_Template
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
        $__internal_ac6da513e6f53e6fd461963974d22bebdc72c9aeed3e59a7a7dbabf2db3b2a34 = $this->env->getExtension("native_profiler");
        $__internal_ac6da513e6f53e6fd461963974d22bebdc72c9aeed3e59a7a7dbabf2db3b2a34->enter($__internal_ac6da513e6f53e6fd461963974d22bebdc72c9aeed3e59a7a7dbabf2db3b2a34_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/Profile/Inbox.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>IE Project 4</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("Stylesheets/Inbox.css"), "html", null, true);
        echo ">
</head>
<body>
<div id=\"header\">
<h1>
    Inbox
</h1>
<h2 id=\"name_header\" style=\"float: right; margin-top: -4%\">
    <a href=";
        // line 13
        echo $this->env->getExtension('routing')->getPath("profile_profile");
        echo ">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array()), "html", null, true);
        echo "</a>
</h2>
<h2 id=\"logout\" style=\"float: right; margin-top: -4%; margin-right: 8%\">
    <a href=";
        // line 16
        echo $this->env->getExtension('routing')->getPath("user_logout");
        echo ">Logout</a>
</h2>
</div>

<div id=\"box\">
    <h5 id=\"refresh\">Refresh</h5>
    <h5 id=\"compose\">Compose</h5>
    <h5 id=\"inbox\">Inbox</h5>
    <h5 id=\"sent\">Sent</h5>
    Num of Mail:<input type=\"text\" name=\"numOfMail\" id=\"numOfMail\" value=\"4\"><br>
    <input type=\"radio\" name=\"sortby\" id=\"date\" checked=\"checked\" value=\"date\">Sort By Date<br>
    <input type=\"radio\" name=\"sortby\" id=\"sender\" checked=\"checked\" value=\"sender\">Sort By sender<br>
    <input type=\"radio\" name=\"sortby\" id=\"attach\" checked=\"checked\" value=\"attach\">Sort By attachment<br>

</div>
<div id=\"mails\">
    <div class=\"eachMail\">
        <div class=\"from\">ali</div>
        <div class=\"subject\">hello!</div>
        <div class=\"text\">this is my first email...</div>
        <div class=\"date\">3:02 95/4/3</div>
    </div>
    <div class=\"eachMail\">
        <div class=\"from\">zahra</div>
        <div class=\"subject\">back to school email</div>
        <div class=\"text\">Hey! I have to go back the next monday.</div>
        <div class=\"date\">11:34 95/3/2</div>
    </div>
</div>
</body>
</html>
    <script src=";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery-1.12.0.js"), "html", null, true);
        echo "></script>
    <script type=\"text/javascript\">
        \$(document).ready(function(){
            var numOfMail=\$(\"#numOfMail\").val();
            \$.ajax({
                type:\"GET\",
                url : \"../server.php?inbox=true&nom=\"+numOfMail,
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {
                    var all=\$(xml).children('mails').children(\"mail\");
                    all.each(function(){
                        var email='div class=\"eachMail\">'+'<div class=\"from\">'+\$(this).children(\"from\").text();
                        email+='</div><div class=\"subject\">'+\$(this).children(\"subject\").text();
                        email+='</div><div class=\"text\">'+\$(this).children(\"text\").text();
                        email+='</div><div class=\"date\">'+\$(this).children(\"date\").text()+'</div></div>';
                        \$(\"#mails\").append(email);
                        if(\$(this).attr(\"read\")!==undefined){//the email has been read
                            \$(\"mails\").children(\":last\").css('background-color','green');
                        }else if(\$(this).attr(\"spam\")!==undefined){
                            \$(\"mails\").children(\":last\").css('background-color','yellow');
                        }else{
                            \$(\"mails\").children(\":last\").css('background-color','white');
                        }
                    });
                    \$(document).on('click','.eachMail',function(){
                        window.location=\"../server.php?email=true & from=\"+\$(this).children(\".from\").text()+\"& date=\"+\$(this).children(\".date\").text();
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }
            });

            \$(document).on('click','#refresh',function(){
                numOfMail=\$(\"#numOfMail\").val();
                \$.ajax({
                type:\"GET\",
                url : \"../server.php?refresh=true&nom=\"+numOfMail,
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {
                    var all=\$(xml).children('mails').children(\"mail\");
                    all.each(function(){
                        var email='div class=\"eachMail\">'+'<div class=\"from\">'+\$(this).children(\"from\").text();
                        email+='</div><div class=\"subject\">'+\$(this).children(\"subject\").text();
                        email+='</div><div class=\"text\">'+\$(this).children(\"text\").text();
                        email+='</div><div class=\"date\">'+\$(this).children(\"date\").text()+'</div></div>';
                        \$(\"#mails\").append(email);
                        if(\$(this).attr(\"read\")!==undefined){//the email has been read
                            \$(\"mails\").children(\":last\").css('background-color','green');
                        }else if(\$(this).attr(\"spam\")!==undefined){
                            \$(\"mails\").children(\":last\").css('background-color','yellow');
                        }else{
                            \$(\"mails\").children(\":last\").css('background-color','white');
                        }
                    });
                    \$(document).on('click','.eachMail',function(){
                        window.location=\"../server.php?email=true & from=\"+\$(this).children(\".from\").text()+\"& date=\"+\$(this).children(\".date\").text();
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }

                    });
                });

            \$(document).on('click','#compose',function(){
                        window.location=\"../server.php?compose=true\";
                    });

            \$(document).on('click','#inbox',function(){
                numOfMail=\$(\"#numOfMail\").val();
                \$(\"#mails\").empty();
                \$.ajax({
                type:\"GET\",
                url : \"../server.php?inbox=true&nom=\"+numOfMail,
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {
                    var all=\$(xml).children('mails').children(\"mail\");
                    all.each(function(){
                        var email='div class=\"eachMail\">'+'<div class=\"from\">'+\$(this).children(\"from\").text();
                        email+='</div><div class=\"subject\">'+\$(this).children(\"subject\").text();
                        email+='</div><div class=\"text\">'+\$(this).children(\"text\").text();
                        email+='</div><div class=\"date\">'+\$(this).children(\"date\").text()+'</div></div>';
                        \$(\"#mails\").append(email);
                        if(\$(this).attr(\"read\")!==undefined){//the email has been read
                            \$(\"mails\").children(\":last\").css('background-color','green');
                        }else if(\$(this).attr(\"spam\")!==undefined){
                            \$(\"mails\").children(\":last\").css('background-color','yellow');
                        }else{
                            \$(\"mails\").children(\":last\").css('background-color','white');
                        }
                    });
                    \$(document).on('click','.eachMail',function(){
                        window.location=\"../server.php?email=true & from=\"+\$(this).children(\".from\").text()+\"& date=\"+\$(this).children(\".date\").text();
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }
                    });
                });
            \$(document).on('click','#sent',function(){
                numOfMail=\$(\"#numOfMail\").val();
                \$(\"#mails\").empty();
                \$.ajax({
                type:\"GET\",
                url : \"../server.php?sent=true&nom=\"+numOfMail,
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {

                    var all=\$(xml).children('mails').children(\"mail\");
                    all.each(function(){
                        var email='div class=\"eachMail\">'+'<div class=\"from\">'+\$(this).children(\"to\").text();
                        email+='</div><div class=\"subject\">'+\$(this).children(\"subject\").text();
                        email+='</div><div class=\"text\">'+\$(this).children(\"text\").text();
                        email+='</div><div class=\"date\">'+\$(this).children(\"date\").text()+'</div></div>';
                        \$(\"#mails\").append(email);
                        if(\$(this).attr(\"read\")!==undefined){//the email has been read
                            \$(\"mails\").children(\":last\").css('background-color','green');
                        }else if(\$(this).attr(\"spam\")!==undefined){
                            \$(\"mails\").children(\":last\").css('background-color','yellow');
                        }else{
                            \$(\"mails\").children(\":last\").css('background-color','white');
                        }
                    });
                    \$(document).on('click','.eachMail',function(){
                        window.location=\"../server.php?email=true & from=\"+\$(this).children(\".to\").text()+\"& date=\"+\$(this).children(\".date\").text();
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }
                    });
                });
                
           
            \$('input[type=radio][name=sortby]').change(function() {
                numOfMail=\$(\"#numOfMail\").val();
                \$(\"#mails\").empty();
                \$.ajax({
                type:\"GET\",
                url : \"../server.php?inbox=true&sortby=\"+this.value+\"&nom=\"+numOfMail,
                dataType : \"xml\",
                cache : false ,
                async : false ,
                success : function (xml) {
                    var all=\$(xml).children('mails').children(\"mail\");
                    all.each(function(){
                        var email='div class=\"eachMail\">'+'<div class=\"from\">'+\$(this).children(\"from\").text();
                        email+='</div><div class=\"subject\">'+\$(this).children(\"subject\").text();
                        email+='</div><div class=\"text\">'+\$(this).children(\"text\").text();
                        email+='</div><div class=\"date\">'+\$(this).children(\"date\").text()+'</div></div>';
                        \$(\"#mails\").append(email);
                        if(\$(this).attr(\"read\")!==undefined){//the email has been read
                            \$(\"mails\").children(\":last\").css('background-color','green');
                        }else if(\$(this).attr(\"spam\")!==undefined){
                            \$(\"mails\").children(\":last\").css('background-color','yellow');
                        }else{
                            \$(\"mails\").children(\":last\").css('background-color','white');
                        }
                    });
                    \$(document).on('click','.eachMail',function(){
                        window.location=\"../server.php?email=true & from=\"+\$(this).children(\".from\").text()+\"& date=\"+\$(this).children(\".date\").text();
                    });
                },error: function(jqXHR, textStatus, errorThrown)
                         {
                         // Handle errors here
                         console.log('ERRORS: ' + textStatus);
                         console.log(jqXHR.responseText);
                         // STOP LOADING SPINNER
                         }
                    });
            });

        });




    </script>
";
        
        $__internal_ac6da513e6f53e6fd461963974d22bebdc72c9aeed3e59a7a7dbabf2db3b2a34->leave($__internal_ac6da513e6f53e6fd461963974d22bebdc72c9aeed3e59a7a7dbabf2db3b2a34_prof);

    }

    public function getTemplateName()
    {
        return "@User/Profile/Inbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 47,  47 => 16,  39 => 13,  28 => 5,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <title>IE Project 4</title>*/
/*     <link rel="stylesheet" type="text/css" href={{ asset('Stylesheets/Inbox.css') }}>*/
/* </head>*/
/* <body>*/
/* <div id="header">*/
/* <h1>*/
/*     Inbox*/
/* </h1>*/
/* <h2 id="name_header" style="float: right; margin-top: -4%">*/
/*     <a href={{ path('profile_profile') }}>{{ user.name }}</a>*/
/* </h2>*/
/* <h2 id="logout" style="float: right; margin-top: -4%; margin-right: 8%">*/
/*     <a href={{ path('user_logout') }}>Logout</a>*/
/* </h2>*/
/* </div>*/
/* */
/* <div id="box">*/
/*     <h5 id="refresh">Refresh</h5>*/
/*     <h5 id="compose">Compose</h5>*/
/*     <h5 id="inbox">Inbox</h5>*/
/*     <h5 id="sent">Sent</h5>*/
/*     Num of Mail:<input type="text" name="numOfMail" id="numOfMail" value="4"><br>*/
/*     <input type="radio" name="sortby" id="date" checked="checked" value="date">Sort By Date<br>*/
/*     <input type="radio" name="sortby" id="sender" checked="checked" value="sender">Sort By sender<br>*/
/*     <input type="radio" name="sortby" id="attach" checked="checked" value="attach">Sort By attachment<br>*/
/* */
/* </div>*/
/* <div id="mails">*/
/*     <div class="eachMail">*/
/*         <div class="from">ali</div>*/
/*         <div class="subject">hello!</div>*/
/*         <div class="text">this is my first email...</div>*/
/*         <div class="date">3:02 95/4/3</div>*/
/*     </div>*/
/*     <div class="eachMail">*/
/*         <div class="from">zahra</div>*/
/*         <div class="subject">back to school email</div>*/
/*         <div class="text">Hey! I have to go back the next monday.</div>*/
/*         <div class="date">11:34 95/3/2</div>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* </html>*/
/*     <script src={{ asset('js/jquery-1.12.0.js') }}></script>*/
/*     <script type="text/javascript">*/
/*         $(document).ready(function(){*/
/*             var numOfMail=$("#numOfMail").val();*/
/*             $.ajax({*/
/*                 type:"GET",*/
/*                 url : "../server.php?inbox=true&nom="+numOfMail,*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/*                     var all=$(xml).children('mails').children("mail");*/
/*                     all.each(function(){*/
/*                         var email='div class="eachMail">'+'<div class="from">'+$(this).children("from").text();*/
/*                         email+='</div><div class="subject">'+$(this).children("subject").text();*/
/*                         email+='</div><div class="text">'+$(this).children("text").text();*/
/*                         email+='</div><div class="date">'+$(this).children("date").text()+'</div></div>';*/
/*                         $("#mails").append(email);*/
/*                         if($(this).attr("read")!==undefined){//the email has been read*/
/*                             $("mails").children(":last").css('background-color','green');*/
/*                         }else if($(this).attr("spam")!==undefined){*/
/*                             $("mails").children(":last").css('background-color','yellow');*/
/*                         }else{*/
/*                             $("mails").children(":last").css('background-color','white');*/
/*                         }*/
/*                     });*/
/*                     $(document).on('click','.eachMail',function(){*/
/*                         window.location="../server.php?email=true & from="+$(this).children(".from").text()+"& date="+$(this).children(".date").text();*/
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
/*             $(document).on('click','#refresh',function(){*/
/*                 numOfMail=$("#numOfMail").val();*/
/*                 $.ajax({*/
/*                 type:"GET",*/
/*                 url : "../server.php?refresh=true&nom="+numOfMail,*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/*                     var all=$(xml).children('mails').children("mail");*/
/*                     all.each(function(){*/
/*                         var email='div class="eachMail">'+'<div class="from">'+$(this).children("from").text();*/
/*                         email+='</div><div class="subject">'+$(this).children("subject").text();*/
/*                         email+='</div><div class="text">'+$(this).children("text").text();*/
/*                         email+='</div><div class="date">'+$(this).children("date").text()+'</div></div>';*/
/*                         $("#mails").append(email);*/
/*                         if($(this).attr("read")!==undefined){//the email has been read*/
/*                             $("mails").children(":last").css('background-color','green');*/
/*                         }else if($(this).attr("spam")!==undefined){*/
/*                             $("mails").children(":last").css('background-color','yellow');*/
/*                         }else{*/
/*                             $("mails").children(":last").css('background-color','white');*/
/*                         }*/
/*                     });*/
/*                     $(document).on('click','.eachMail',function(){*/
/*                         window.location="../server.php?email=true & from="+$(this).children(".from").text()+"& date="+$(this).children(".date").text();*/
/*                     });*/
/*                 },error: function(jqXHR, textStatus, errorThrown)*/
/*                          {*/
/*                          // Handle errors here*/
/*                          console.log('ERRORS: ' + textStatus);*/
/*                          console.log(jqXHR.responseText);*/
/*                          // STOP LOADING SPINNER*/
/*                          }*/
/* */
/*                     });*/
/*                 });*/
/* */
/*             $(document).on('click','#compose',function(){*/
/*                         window.location="../server.php?compose=true";*/
/*                     });*/
/* */
/*             $(document).on('click','#inbox',function(){*/
/*                 numOfMail=$("#numOfMail").val();*/
/*                 $("#mails").empty();*/
/*                 $.ajax({*/
/*                 type:"GET",*/
/*                 url : "../server.php?inbox=true&nom="+numOfMail,*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/*                     var all=$(xml).children('mails').children("mail");*/
/*                     all.each(function(){*/
/*                         var email='div class="eachMail">'+'<div class="from">'+$(this).children("from").text();*/
/*                         email+='</div><div class="subject">'+$(this).children("subject").text();*/
/*                         email+='</div><div class="text">'+$(this).children("text").text();*/
/*                         email+='</div><div class="date">'+$(this).children("date").text()+'</div></div>';*/
/*                         $("#mails").append(email);*/
/*                         if($(this).attr("read")!==undefined){//the email has been read*/
/*                             $("mails").children(":last").css('background-color','green');*/
/*                         }else if($(this).attr("spam")!==undefined){*/
/*                             $("mails").children(":last").css('background-color','yellow');*/
/*                         }else{*/
/*                             $("mails").children(":last").css('background-color','white');*/
/*                         }*/
/*                     });*/
/*                     $(document).on('click','.eachMail',function(){*/
/*                         window.location="../server.php?email=true & from="+$(this).children(".from").text()+"& date="+$(this).children(".date").text();*/
/*                     });*/
/*                 },error: function(jqXHR, textStatus, errorThrown)*/
/*                          {*/
/*                          // Handle errors here*/
/*                          console.log('ERRORS: ' + textStatus);*/
/*                          console.log(jqXHR.responseText);*/
/*                          // STOP LOADING SPINNER*/
/*                          }*/
/*                     });*/
/*                 });*/
/*             $(document).on('click','#sent',function(){*/
/*                 numOfMail=$("#numOfMail").val();*/
/*                 $("#mails").empty();*/
/*                 $.ajax({*/
/*                 type:"GET",*/
/*                 url : "../server.php?sent=true&nom="+numOfMail,*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/* */
/*                     var all=$(xml).children('mails').children("mail");*/
/*                     all.each(function(){*/
/*                         var email='div class="eachMail">'+'<div class="from">'+$(this).children("to").text();*/
/*                         email+='</div><div class="subject">'+$(this).children("subject").text();*/
/*                         email+='</div><div class="text">'+$(this).children("text").text();*/
/*                         email+='</div><div class="date">'+$(this).children("date").text()+'</div></div>';*/
/*                         $("#mails").append(email);*/
/*                         if($(this).attr("read")!==undefined){//the email has been read*/
/*                             $("mails").children(":last").css('background-color','green');*/
/*                         }else if($(this).attr("spam")!==undefined){*/
/*                             $("mails").children(":last").css('background-color','yellow');*/
/*                         }else{*/
/*                             $("mails").children(":last").css('background-color','white');*/
/*                         }*/
/*                     });*/
/*                     $(document).on('click','.eachMail',function(){*/
/*                         window.location="../server.php?email=true & from="+$(this).children(".to").text()+"& date="+$(this).children(".date").text();*/
/*                     });*/
/*                 },error: function(jqXHR, textStatus, errorThrown)*/
/*                          {*/
/*                          // Handle errors here*/
/*                          console.log('ERRORS: ' + textStatus);*/
/*                          console.log(jqXHR.responseText);*/
/*                          // STOP LOADING SPINNER*/
/*                          }*/
/*                     });*/
/*                 });*/
/*                 */
/*            */
/*             $('input[type=radio][name=sortby]').change(function() {*/
/*                 numOfMail=$("#numOfMail").val();*/
/*                 $("#mails").empty();*/
/*                 $.ajax({*/
/*                 type:"GET",*/
/*                 url : "../server.php?inbox=true&sortby="+this.value+"&nom="+numOfMail,*/
/*                 dataType : "xml",*/
/*                 cache : false ,*/
/*                 async : false ,*/
/*                 success : function (xml) {*/
/*                     var all=$(xml).children('mails').children("mail");*/
/*                     all.each(function(){*/
/*                         var email='div class="eachMail">'+'<div class="from">'+$(this).children("from").text();*/
/*                         email+='</div><div class="subject">'+$(this).children("subject").text();*/
/*                         email+='</div><div class="text">'+$(this).children("text").text();*/
/*                         email+='</div><div class="date">'+$(this).children("date").text()+'</div></div>';*/
/*                         $("#mails").append(email);*/
/*                         if($(this).attr("read")!==undefined){//the email has been read*/
/*                             $("mails").children(":last").css('background-color','green');*/
/*                         }else if($(this).attr("spam")!==undefined){*/
/*                             $("mails").children(":last").css('background-color','yellow');*/
/*                         }else{*/
/*                             $("mails").children(":last").css('background-color','white');*/
/*                         }*/
/*                     });*/
/*                     $(document).on('click','.eachMail',function(){*/
/*                         window.location="../server.php?email=true & from="+$(this).children(".from").text()+"& date="+$(this).children(".date").text();*/
/*                     });*/
/*                 },error: function(jqXHR, textStatus, errorThrown)*/
/*                          {*/
/*                          // Handle errors here*/
/*                          console.log('ERRORS: ' + textStatus);*/
/*                          console.log(jqXHR.responseText);*/
/*                          // STOP LOADING SPINNER*/
/*                          }*/
/*                     });*/
/*             });*/
/* */
/*         });*/
/* */
/* */
/* */
/* */
/*     </script>*/
/* */
