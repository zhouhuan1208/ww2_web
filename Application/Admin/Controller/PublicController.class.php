<?php

// +----------------------------------------------------------------------
// | @filename PublicController.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-11  14:59:31
// +----------------------------------------------------------------------
// | @Description
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class PublicController extends Controller {

    public function login() {
        if (IS_POST) {
            $verify = I('post.verify');  //获取验证码
            if (!check_verify($verify)) { //如果验证码错误，则跳转到登录页重新登录
                $this->error('您输入的验证码错误,请重新输入!', U('Public/login'));
            }

            if (empty(I('post.username'))) {
                $this->error('您没有输入用户名,请重新登录!', U('Public/login'));
            }

            if (empty(I('post.password'))) {
                $this->error('您没有输入密码,请重新登录!', U('Public/login'));
            }

            /* 验证码正确开始验证密码 */
            $Admin = D('Admin');

            $map['username'] = I('post.username');
            $user = $Admin->where($map)->find();  //实例化模型类通过用户名查询出这条用户数据


            $session_time = I('post.remember_me','');


            if ($user['status'] == 1) { //判断是否被锁定 status 1为正常 0为锁定
                if (I('post.password', '', 'md5') == $user['password']) { //判断密码是否正确      
                    if ($Admin->autoLogin($user,$session_time)) {
                        $this->success('登录成功!', U('Index/index'));
                    } else {
                        $this->error('登录发生未知错误,请重新登录!', U('Index/index'));
                    }
                } else {
                    $this->error('您输入的密码错误,请重新登录!', U('Public/login'));
                }
            } else {
                $this->error('账号被锁定,请联系管理员!', U('Public/login'));
            }
        } else {
            if (is_login()) {
                $this->redirect('Index/index');
            } else {
                $this->display();
            }
        }
    }

    /* 退出登录 */

    public function logout() {
        if (is_login()) {
            D('Admin')->logout();
            $this->success('退出成功！', U('Public/login'));
        } else {
            $this->redirect('Public/login');
        }
    }

    public function verify() {
        $config = array(
            'useCurve' => false,
            'fontSize' => 16,
            'imageW' => 140,
            'imageH' => 33,
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }

}
