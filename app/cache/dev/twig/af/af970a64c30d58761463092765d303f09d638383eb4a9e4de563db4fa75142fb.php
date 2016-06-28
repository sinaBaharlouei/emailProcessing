<?php

/* @User/User/login.html.twig */
class __TwigTemplate_29817e4a64037be1a573974bbaa336773e69095450ce09e7f1ed96cf67583eec extends Twig_Template
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
        $__internal_50c3d21d5c62f40272a476cbfdcfd19687cb9c8a83cb1b644e0f0080bdf4ffe5 = $this->env->getExtension("native_profiler");
        $__internal_50c3d21d5c62f40272a476cbfdcfd19687cb9c8a83cb1b644e0f0080bdf4ffe5->enter($__internal_50c3d21d5c62f40272a476cbfdcfd19687cb9c8a83cb1b644e0f0080bdf4ffe5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@User/User/login.html.twig"));

        // line 1
        echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <title>انتخاب</title>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" href=";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "/>
    <link rel=\"stylesheet\" href=";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/style.css"), "html", null, true);
        echo "/>
    <script type=\"text/javascript\" src=";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "></script>
    <script type=\"text/javascript\" src=";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "></script>
    <script type=\"text/javascript\" src=";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/login.js"), "html", null, true);
        echo "></script>
</head>
<body>
<div class=\"container\">
    <div class='bot-left'>
        <div class='site-header'>
            <center>
                <span class='site-header1'>mon</span><span class='site-header2'>.mon</span>
            </center>
        </div>
    </div>
</div>
<div class=' main-container'>
    <div class=\"container\">
        <div class=\"space\"></div>
        <div class=\"row\">
            <div class=\"col-md-6 col-md-offset-3\">
                <div class=\"panel panel-login\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-6\">
                                <a href=\"#\" class=\"active\" id=\"login-form-link\">ورود</a>
                            </div>
                            <div class=\"col-xs-6\">
                                <a href=\"#\" id=\"register-form-link\">ثبت نام</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class=\"panel-body\">
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <form id=\"login-form\" method=\"post\" role=\"form\" style=\"display: block;\"
                                      action=";
        // line 42
        echo $this->env->getExtension('routing')->getPath("user_login_check");
        echo " >
                                    <div class=\"form-group\">
                                        <input type=\"text\" name=\"_username\" id=\"username\" tabindex=\"1\"
                                               class=\"form-control\" placeholder=\"ایمیل\" value=\"\">
                                    </div>
                                    <div class=\"form-group\">
                                        <input type=\"password\" name=\"_password\" id=\"password\" tabindex=\"2\"
                                               class=\"form-control\" placeholder=\"کلمه عبور\">
                                    </div>
                                    <div class=\"form-group text-center\">
                                        <input type=\"checkbox\" tabindex=\"3\" class=\"\" name=\"_remember_me\" id=\"remember\">
                                        <label for=\"remember\"> به خاطر بسپار</label>
                                    </div>
                                    <div class=\"form-group\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-6 col-sm-offset-3\">
                                                <input type=\"submit\" name=\"login-submit\" id=\"login-submit\" tabindex=\"4\"
                                                       class=\"form-control btn btn-login\" value=\"وارد شوید\">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <div class=\"row\">
                                            <div class=\"col-lg-12\">
                                                <div class=\"text-center\">
                                                    <a href=\"http://phpoll.com/recover\" tabindex=\"5\"
                                                       class=\"forgot-password\">کلمه عبور خود را فراموش کرده اید ؟</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id=\"register-form\" method=\"post\" role=\"form\" style=\"display: none;\"
                                      action=";
        // line 75
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo ">
                                    <div class=\"form-group\">
                                        <input type=\"text\" name=\"name\" id=\"username\" tabindex=\"1\"
                                               class=\"form-control\" placeholder=\"نام کاربری\" value=\"\">
                                    </div>
                                    <div class=\"form-group\">
                                        <input type=\"email\" name=\"email\" id=\"email\" tabindex=\"1\" class=\"form-control\"
                                               placeholder=\"ایمیل\" value=\"\">
                                    </div>
                                    <div class=\"form-group\">
                                        <input type=\"password\" name=\"password\" id=\"password\" tabindex=\"2\"
                                               class=\"form-control\" placeholder=\"کلمه عبور\">
                                    </div>
                                    <div class=\"form-group\">
                                        <input type=\"password\" name=\"confirm_password\" id=\"confirm-password\"
                                               tabindex=\"2\" class=\"form-control\" placeholder=\"تکرار کلمه عبور\">
                                    </div>
                                    <div class=\"form-group\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-6 col-sm-offset-3\">
                                                <input type=\"submit\" name=\"register-submit\" id=\"register-submit\"
                                                       tabindex=\"4\" class=\"form-control btn btn-register\"
                                                       value=\"ثبت نام\">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"space\"></div>
</div>
<footer class='bot-footer'>
    <div class=\"container\">
        <div class='row'>
            <div class='col-md-6 col-md-offset-3'>
                <center>
                    <div class='links'>
                        <a href=\"#\">خانه</a>
                        <a href=\"#\">سوالات</a>
                        <a href=\"#\">پروفایل</a>
                        <a href=\"#\">درباره ما</a>
                        <a href=\"#\">تماس با ما</a></div>
                </center>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
    ";
        
        $__internal_50c3d21d5c62f40272a476cbfdcfd19687cb9c8a83cb1b644e0f0080bdf4ffe5->leave($__internal_50c3d21d5c62f40272a476cbfdcfd19687cb9c8a83cb1b644e0f0080bdf4ffe5_prof);

    }

    public function getTemplateName()
    {
        return "@User/User/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 75,  80 => 42,  44 => 9,  40 => 8,  36 => 7,  32 => 6,  28 => 5,  22 => 1,);
    }
}
/* <html xmlns="http://www.w3.org/1999/xhtml">*/
/* <head>*/
/*     <title>انتخاب</title>*/
/*     <meta charset="UTF-8">*/
/*     <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}/>*/
/*     <link rel="stylesheet" href={{ asset('css/style.css') }}/>*/
/*     <script type="text/javascript" src={{ asset('js/jquery.min.js') }}></script>*/
/*     <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }}></script>*/
/*     <script type="text/javascript" src={{ asset('js/login.js') }}></script>*/
/* </head>*/
/* <body>*/
/* <div class="container">*/
/*     <div class='bot-left'>*/
/*         <div class='site-header'>*/
/*             <center>*/
/*                 <span class='site-header1'>mon</span><span class='site-header2'>.mon</span>*/
/*             </center>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* <div class=' main-container'>*/
/*     <div class="container">*/
/*         <div class="space"></div>*/
/*         <div class="row">*/
/*             <div class="col-md-6 col-md-offset-3">*/
/*                 <div class="panel panel-login">*/
/*                     <div class="panel-heading">*/
/*                         <div class="row">*/
/*                             <div class="col-xs-6">*/
/*                                 <a href="#" class="active" id="login-form-link">ورود</a>*/
/*                             </div>*/
/*                             <div class="col-xs-6">*/
/*                                 <a href="#" id="register-form-link">ثبت نام</a>*/
/*                             </div>*/
/*                         </div>*/
/*                         <hr>*/
/*                     </div>*/
/*                     <div class="panel-body">*/
/*                         <div class="row">*/
/*                             <div class="col-lg-12">*/
/*                                 <form id="login-form" method="post" role="form" style="display: block;"*/
/*                                       action={{ path('user_login_check') }} >*/
/*                                     <div class="form-group">*/
/*                                         <input type="text" name="_username" id="username" tabindex="1"*/
/*                                                class="form-control" placeholder="ایمیل" value="">*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <input type="password" name="_password" id="password" tabindex="2"*/
/*                                                class="form-control" placeholder="کلمه عبور">*/
/*                                     </div>*/
/*                                     <div class="form-group text-center">*/
/*                                         <input type="checkbox" tabindex="3" class="" name="_remember_me" id="remember">*/
/*                                         <label for="remember"> به خاطر بسپار</label>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <div class="row">*/
/*                                             <div class="col-sm-6 col-sm-offset-3">*/
/*                                                 <input type="submit" name="login-submit" id="login-submit" tabindex="4"*/
/*                                                        class="form-control btn btn-login" value="وارد شوید">*/
/*                                             </div>*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <div class="row">*/
/*                                             <div class="col-lg-12">*/
/*                                                 <div class="text-center">*/
/*                                                     <a href="http://phpoll.com/recover" tabindex="5"*/
/*                                                        class="forgot-password">کلمه عبور خود را فراموش کرده اید ؟</a>*/
/*                                                 </div>*/
/*                                             </div>*/
/*                                         </div>*/
/*                                     </div>*/
/*                                 </form>*/
/*                                 <form id="register-form" method="post" role="form" style="display: none;"*/
/*                                       action={{ path('user_register') }}>*/
/*                                     <div class="form-group">*/
/*                                         <input type="text" name="name" id="username" tabindex="1"*/
/*                                                class="form-control" placeholder="نام کاربری" value="">*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <input type="email" name="email" id="email" tabindex="1" class="form-control"*/
/*                                                placeholder="ایمیل" value="">*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <input type="password" name="password" id="password" tabindex="2"*/
/*                                                class="form-control" placeholder="کلمه عبور">*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <input type="password" name="confirm_password" id="confirm-password"*/
/*                                                tabindex="2" class="form-control" placeholder="تکرار کلمه عبور">*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <div class="row">*/
/*                                             <div class="col-sm-6 col-sm-offset-3">*/
/*                                                 <input type="submit" name="register-submit" id="register-submit"*/
/*                                                        tabindex="4" class="form-control btn btn-register"*/
/*                                                        value="ثبت نام">*/
/*                                             </div>*/
/*                                         </div>*/
/*                                     </div>*/
/*                                 </form>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div class="space"></div>*/
/* </div>*/
/* <footer class='bot-footer'>*/
/*     <div class="container">*/
/*         <div class='row'>*/
/*             <div class='col-md-6 col-md-offset-3'>*/
/*                 <center>*/
/*                     <div class='links'>*/
/*                         <a href="#">خانه</a>*/
/*                         <a href="#">سوالات</a>*/
/*                         <a href="#">پروفایل</a>*/
/*                         <a href="#">درباره ما</a>*/
/*                         <a href="#">تماس با ما</a></div>*/
/*                 </center>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </footer>*/
/* */
/* </body>*/
/* </html>*/
/*     */
