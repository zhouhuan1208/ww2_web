<?php

return array(
    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true, 
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(      
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        '__AVATARS__'=>__ROOT__ . '/Public/' . MODULE_NAME . '/avatars'
    ),
    
    /*可访问IP*/
    'ADMIN_ALLOW_IP'  =>'127.0.0.1',
    
    'DEVELOP_MODE' => true,
);
