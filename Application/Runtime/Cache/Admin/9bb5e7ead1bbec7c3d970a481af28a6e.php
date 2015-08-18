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
                <a href="<?php echo U('Index/index');?>" class="navbar-brand">
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

<!-- 左菜单 -->


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
                        <i class="menu-icon <?php echo ($menu["ico"]); ?>"></i>
                        <span class="menu-text">
                            <?php echo ($menu["title"]); ?>
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <?php if(is_array($menu["group"])): $i = 0; $__LIST__ = $menu["group"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_group): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu_group["class"]) && ($menu_group["class"] !== ""))?($menu_group["class"]):''); ?>">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?php echo ($key); ?>
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>
                                <ul class="submenu">
                                    <?php if(is_array($menu_group["child"])): $i = 0; $__LIST__ = $menu_group["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_child): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu_child["class"]) && ($menu_child["class"] !== ""))?($menu_child["class"]):''); ?>">
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

        </ul><!-- /nav-list -->

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






<!-- /左菜单 -->
<!-- 主体 -->

    <div class="main-content">
        <div class="main-content-inner">
            <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {
                    }
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">UI &amp; Elements</a>
                    </li>
                    <li class="active">Elements</li>
                </ul><!-- /.breadcrumb -->

                <!-- #section:basics/content.searchbox -->
                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->

                <!-- /section:basics/content.searchbox -->
            </div>
            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                
    <div class="page-header">
        <h1>网站设置</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <?php if(is_array(C("CONFIG_GROUP_LIST"))): $i = 0; $__LIST__ = C("CONFIG_GROUP_LIST");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><li <?php if(($id) == $key): ?>class="active"<?php endif; ?>>
                            <a href="<?php echo U('?id='.$key);?>">
                                <?php echo ($group); ?>配置
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="tab-content">
                    <form action="<?php echo U('save');?>" method="post" class="form-horizontal">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?><div class="form-item">
                                <label class="item-label"><?php echo ($config["title"]); ?></label>
                                <div class="controls">
                                    <?php switch($config["type"]): case "0": ?><input type="text" class="text input-small" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>" <?php if(!empty($config["remark"])): ?>data-rel="tooltip" data-placement="bottom" data-original-title="<?php echo ($config["remark"]); ?>"<?php endif; ?>><?php break;?>
                                    <?php case "1": ?><input type="text" class="text input-large" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>" <?php if(!empty($config["remark"])): ?>data-rel="tooltip" data-placement="bottom" data-original-title="<?php echo ($config["remark"]); ?>"<?php endif; ?>><?php break;?>
                                    <?php case "2": ?><textarea name="config[<?php echo ($config["name"]); ?>]" class="config_textarea" <?php if(!empty($config["remark"])): ?>data-rel="tooltip" data-placement="bottom" data-original-title="<?php echo ($config["remark"]); ?>"<?php endif; ?>><?php echo ($config["value"]); ?></textarea><?php break;?>
                                    <?php case "3": ?><textarea name="config[<?php echo ($config["name"]); ?>]" class="config_textarea" <?php if(!empty($config["remark"])): ?>data-rel="tooltip" data-placement="bottom" data-original-title="<?php echo ($config["remark"]); ?>"<?php endif; ?>><?php echo ($config["value"]); ?></textarea><?php break;?>
                                    <?php case "4": ?><select name="config[<?php echo ($config["name"]); ?>]" <?php if(!empty($config["remark"])): ?>data-rel="tooltip" data-placement="bottom" data-original-title="<?php echo ($config["remark"]); ?>"<?php endif; ?>>
                                            <?php $_result=parse_config_attr($config['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($config["value"]) == $key): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><?php break; endswitch;?>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <div class="form-item">
                            <label class="item-label"></label>
                            <div class="controls">
                                <button type="submit" class="btn btn-danger" target-form="form-horizontal">确 定</button>
                                <button class="btn btn-warning" onclick="javascript:history.back(-1);
                                        return false;">返 回</button>
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


<!-- /主体 -->

<!-- 底部 -->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='/ww2_web/Public/Admin/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="/ww2_web/Public/Admin/js/bootstrap.js"></script>


    <script src="/ww2_web/Public/Admin/js/ace/ace.js"></script>
    <script src="/ww2_web/Public/Admin/js/ace/ace.sidebar.js"></script>

    <script>
        $(function () {
            $('[data-rel=tooltip]').tooltip({container: 'body'});
        })
    </script>


<!-- /底部 -->
</body>
</html>