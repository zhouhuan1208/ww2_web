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

    public function index() {
        $id = I('get.id', 1);
        $type = C('CONFIG_GROUP_LIST');

        $list = M("Config")->where(array('status' => 1, 'group' => $id))->field('id,name,title,extra,value,remark,type')->order('sort')->select();
        if ($list) {
            $this->assign('list', $list);
        }
        $this->assign('id', $id);
        $this->meta_title = $type[$id] . '设置';
        $this->display();
    }

    /**
     * 批量保存配置
     */
    public function save($config) {
        if ($config && is_array($config)) {
            $Config = M('Config');
            foreach ($config as $name => $value) {
                $map = array('name' => $name);
                $Config->where($map)->setField('value', $value);
            }
        }

        S('DB_CONFIG_DATA', null); //保存完成 清理配置缓存
        $this->success('保存成功！');
    }

}
