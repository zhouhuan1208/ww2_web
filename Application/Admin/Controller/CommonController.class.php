<?php

// +----------------------------------------------------------------------
// | @filename CommonController.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-11  14:58:00
// +----------------------------------------------------------------------
// | @Description 
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Think\Controller;
use Think\Auth;

class CommonController extends Controller {

    public function _initialize() {
        $auth = new Auth();
        define('UID', is_login());
        if (!UID) {// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }

        /* 读取数据库中的配置 */
        $config = S('DB_CONFIG_DATA');
        if (!$config) {
            $config = $this->lists('Config/lists');
            S('DB_CONFIG_DATA', $config);
        }
        
        C($config); //添加配置
        
        // 检查IP地址访问
        if (!empty(C('ADMIN_ALLOW_IP'))) {
            if (!in_array(get_client_ip(), explode(',', C('ADMIN_ALLOW_IP')))) {
                $this->error('403:禁止访问!', U("Public/login"));
            }
        }
        //检查访问权限
        if (!$auth->check(MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME, session('user_auth.uid'))) {
            $this->error("您没有权限访问此页面!");
        }

        $this->assign('__MENU__', $this->getMenus());  //访问成功先获取菜单
    }

    /**
     * 权限检测
     * @param string  $rule    检测的规则
     * @param string  $mode    check模式
     * @return boolean
     */
    final protected function checkRule($rule, $type = 1, $mode = 'url') {
        static $Auth = null;
        if (!$Auth) {
            $Auth = new Auth();
        }

        if (!$Auth->check($rule, UID, $type, $mode)) {
            //echo UID;
            return false;
        }
        return true;
    }

    /**
     * 获取控制器菜单数组,二级菜单元素位于一级菜单的'_child'元素中
     */
    public function getMenus($controller = CONTROLLER_NAME) {
        if (!C('DEVELOP_MODE')) {
            $menus = session('ADMIN_MENU_LIST');
        }
        if (empty($menus)) {
            // 获取主菜单
            $where['pid'] = 0;
            $where['hide'] = 0;
            if (!C('DEVELOP_MODE')) { // 是否开发者模式
                $where['is_dev'] = 0;
            }

            $menus = M('Menu')->where($where)->order('sort asc')->field('id,title,url,ico')->select();

            foreach ($menus as $key => $item) {

                if (!$this->checkRule(MODULE_NAME . '/' . $item['url'])) {  // 判断主菜单权限
                    unset($menus[$key]);
                    continue; //继续循环
                }

                if (strtolower(CONTROLLER_NAME . '/' . ACTION_NAME) == strtolower($item['url'])) {
                    $menus[$key]['class'] = 'active';
                }
            }

            $menus = $this->getMenusChild($menus);

            if (!C('DEVELOP_MODE')) {
                session('ADMIN_MENU_LIST', $menus);
            }
        }
        //print_r($menus);
        return $menus;
    }

    public function getMenusChild($menus) {


        // 查找当前子菜单
        foreach ($menus as $key => $item) {
            $where['pid'] = $item['id'];
            $where['hide'] = 0;
            if (C('DEVELOP_MODE')) { // 是否开发者模式
                $where['is_dev'] = 0;
            }

            $menu_child = M('Menu')->where($where)->order('sort asc')->field('id,title,url,group')->select();

            $group_child = array();
            foreach ($menu_child as $c_key => $c_item) {

                if ($this->checkRule(MODULE_NAME . '/' . $c_item['url'])) {  // 判断主菜单权限
                    if (!empty($c_item['group'])) {
                        $group_child[$c_item['group']]['group_name'] = $c_item['group'];
                        $group_child[$c_item['group']]['child'][$c_key]['id'] = $c_item['id'];
                        $group_child[$c_item['group']]['child'][$c_key]['title'] = $c_item['title'];
                        $group_child[$c_item['group']]['child'][$c_key]['url'] = $c_item['url'];
                        $group_child[$c_item['group']]['child'][$c_key]['ico'] = $c_item['ico'];
                        if (strtolower(CONTROLLER_NAME . '/' . ACTION_NAME) == strtolower($c_item['url'])) {
                            $group_child[$c_item['group']]['child'][$c_key]['class'] = 'active';
                            $group_child[$c_item['group']]['class'] = 'active open';
                            $menus[$key]['class'] = 'active open';
                        }
                    }
                }
            }
            $menus[$key]['group'] = $group_child;
        }
        return $menus;
    }
    
    /**
     * 获取数据库中的配置列表
     * @return array 配置数组
     */
    private function lists(){
        $map    = array('status' => 1);
        $data   = M('Config')->where($map)->field('type,name,value')->select();
        
        $config = array();
        if($data && is_array($data)){
            foreach ($data as $value) {
                $config[$value['name']] = $this->parse($value['type'], $value['value']);
            }
        }
        return $config;
    }
    
    /**
     * 根据配置类型解析配置
     * @param  integer $type  配置类型
     * @param  string  $value 配置值
     */
    private function parse($type, $value){
        switch ($type) {
            case 3: //解析数组
                $array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));
                if(strpos($value,':')){
                    $value  = array();
                    foreach ($array as $val) {
                        list($k, $v) = explode(':', $val);
                        $value[$k]   = $v;
                    }
                }else{
                    $value =    $array;
                }
                break;
        }
        return $value;
    }	

}
