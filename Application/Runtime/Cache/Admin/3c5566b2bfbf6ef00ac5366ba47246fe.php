<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>后台管理系统</title>
<meta name="description" content="后台管理登录页" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/bootstrap.css" />
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/font-awesome.css" />

<!-- text fonts -->
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/ace-fonts.css" />

<!-- ace styles -->
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/ace-part2.css" />
<![endif]-->

    <link rel="stylesheet" href="/ww2_web/Public/Admin/css/ace-rtl.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="/ww2_web/Public/Admin/css/ace-ie.css" />
<![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lte IE 8]>
<script src="/ww2_web/Public/Admin/js/html5shiv.js"></script>
<script src="/ww2_web/Public/Admin/js/respond.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script src="/ww2_web/Public/Admin/js/jquery.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="/ww2_web/Public/Admin/js/jquery1x.js"></script>
<![endif]-->
</head>
<body class="login-layout blur-login">
<!-- 头部 -->


<!-- /头部 -->
<!-- 主体 -->


    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1> <i class="ace-icon fa fa-leaf green"></i> <span class="red">Ww2</span> <span class="white" id="id-text2">管理系统</span> </h1>
                        </div>
                        <div class="space-6"></div>
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger"> <i class="ace-icon fa fa-coffee green"></i> 管理员登录 </h4>
                                        <div class="space-6"></div>
                                        <form action="/ww2_web/admin.php/Public/login.html" method="post" id="login_form">
                                            <fieldset>
                                                <label class="block clearfix"> <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" placeholder="用户名" name="username" />
                                                        <i class="ace-icon fa fa-user"></i> </span> </label>
                                                <label class="block clearfix"> <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" placeholder="密码" name="password"/>
                                                        <i class="ace-icon fa fa-lock"></i> </span> </label>
                                                <label class="block clearfix"> <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control width-50" placeholder="验证码" name="verify" style="float:left">
                                                        <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>" style="float:right"> </span> </label>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="remember_me" value="2592000" />
                                                        <span class="lbl"> 自动登录</span> </label>
                                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary "> <i class="ace-icon fa fa-key"></i> <span class="bigger-110">登录</span> </button>
                                                </div>
                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- /.widget-main -->


                                </div>
                                <!-- /.widget-body --> 
                            </div>
                            <!-- /.login-box -->
                        </div>
                        <!-- /.position-relative --> 

                    </div>
                </div>
                <!-- /.col --> 
            </div>
            <!-- /.row --> 
        </div>
        <!-- /.main-content --> 
    </div>
    <!-- /.main-container --> 

    <block name="footer_script">
        <script type="text/javascript">
            $(function () {
                //刷新验证码
                var verifyimg = $(".verifyimg").attr("src");
                $(".reloadverify").click(function () {
                    if (verifyimg.indexOf('?') > 0) {
                        $(".verifyimg").attr("src", verifyimg + '&random=' + Math.random());
                    } else {
                        $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
                    }
                });
            });
        </script>
    

<!-- /主体 -->

<!-- 底部 -->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='/ww2_web/Public/Admin/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="/ww2_web/Public/Admin/js/bootstrap.js"></script>

<!-- /底部 -->
</body>
</html>