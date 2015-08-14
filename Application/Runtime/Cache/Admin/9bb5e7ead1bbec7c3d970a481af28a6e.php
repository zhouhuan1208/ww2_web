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
<body class="no-skin">
<!-- 头部 -->

    <div id="navbar" class="navbar navbar-default    navbar-collapse">
        <script type="text/javascript">
            try {
                ace.settings.check('navbar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="navbar-container" id="navbar-container">
            <!-- #section:basics/sidebar.mobile.toggle -->
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">切换</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <!-- /section:basics/sidebar.mobile.toggle -->
            <div class="navbar-header pull-left">
                <!-- #section:basics/navbar.layout.brand -->
                <a href="#" class="navbar-brand">
                    <small>
                        <i class="fa fa-leaf"></i>
                        ww2后台管理系统
                    </small>
                </a>

                <!-- /section:basics/navbar.layout.brand -->

                <!-- #section:basics/navbar.toggle -->
                <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
                    <span class="sr-only">Toggle user menu</span>
                    
                    <img src="/ww2_web/Public/Admin/avatars/avatar2.png" />
                </button>

                <!-- /section:basics/navbar.toggle -->
            </div>

            <!-- #section:basics/navbar.dropdown -->
            <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                <ul class="nav ace-nav">
                    <!-- #section:basics/navbar.user_menu -->
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="/ww2_web/Public/Admin/avatars/avatar2.png" />
                            <span class="user-info">
                                <small>您好,</small>
                                admin
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog"></i>
                                    账户设置
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?php echo U('Public/logout');?>">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    退出登录
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- /section:basics/navbar.user_menu -->
                </ul>
            </div>

            <!-- /section:basics/navbar.dropdown -->
        </div><!-- /.navbar-container -->
    </div>

<!-- /头部 -->
<!-- 主体 -->


    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>



        <ul class="nav nav-list">

            <?php if(is_array($__MENU__)): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>">
                    <a href="<?php echo (U($menu["url"])); ?>" class="dropdown-toggle">
                        <i class="menu-icon fa fa-cog"></i>
                        <span class="menu-text">
                            <?php echo ($menu["title"]); ?>
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <?php if(is_array($menu["group"])): $i = 0; $__LIST__ = $menu["group"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_group): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?php echo ($key); ?>
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>
                                <ul class="submenu">
                                    <?php if(is_array($menu_group["child"])): $i = 0; $__LIST__ = $menu_group["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_child): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>">
                                            <a href="<?php echo (U($menu_child["url"])); ?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                <?php echo ($menu_child["title"]); ?>
                                            </a>

                                            <b class="arrow"></b>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>








<!-- /主体 -->

<!-- 底部 -->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='/ww2_web/Public/Admin/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="/ww2_web/Public/Admin/js/bootstrap.js"></script>


    <!-- ace scripts -->
    <script src="/ww2_web/Public/Admin/js/ace/ace.js"></script>
    <script src="/ww2_web/Public/Admin/js/ace/ace.sidebar.js"></script>
    <!--
   <script src="/ww2_web/Public/Admin/js/ace/elements.scroller.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.colorpicker.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.fileinput.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.typeahead.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.wysiwyg.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.spinner.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.treeview.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.wizard.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/elements.aside.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.ajax-content.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.touch-drag.js"></script>
        
        <script src="/ww2_web/Public/Admin/js/ace/ace.sidebar-scroll-1.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.submenu-hover.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.widget-box.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.settings.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.settings-rtl.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.settings-skin.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.widget-on-reload.js"></script>
        <script src="/ww2_web/Public/Admin/js/ace/ace.searchbox-autocomplete.js"></script>
    -->

<!-- /底部 -->
</body>
</html>