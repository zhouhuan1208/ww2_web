<?php

return array(
    //数据库配置信息
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'ww2_web', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'ww2_', // 数据库表前缀 
    'DB_CHARSET' => 'utf8', // 字符集
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    
     // 显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true, 
    
    //URL设置
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
);
