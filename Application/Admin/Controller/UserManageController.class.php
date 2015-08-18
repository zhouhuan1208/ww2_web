<?php

// +----------------------------------------------------------------------
// | @filename UserController.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-11  19:22:23
// +----------------------------------------------------------------------
// | @Description
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Think\Controller;

class UserManageController extends CommonController {

    public function index() {
        $this->meta_title = '管理员列表';
        $this->display();
    }
    
    public function add()
    {
        $this->display();
    }

}
