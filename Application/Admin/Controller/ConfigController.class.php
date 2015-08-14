<?php

// +----------------------------------------------------------------------
// | @filename ConfigController.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-11  19:12:17
// +----------------------------------------------------------------------
// | @Description
// +----------------------------------------------------------------------


namespace Admin\Controller;

use Think\Controller;

class ConfigController extends CommonController {
    public function index()
    {
        $this->display();
    }
    public function group() {
        $this->display();
    }

}
