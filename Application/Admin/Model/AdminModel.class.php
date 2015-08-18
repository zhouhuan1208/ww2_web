<?php

// +----------------------------------------------------------------------
// | @filename AdminModel.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-11  14:56:58
// +----------------------------------------------------------------------
// | @Description
// +----------------------------------------------------------------------

namespace Admin\Model;

use Think\Model;

class AdminModel extends Model {

    protected $_validate = array(
    );

    /**
     * 更新登录信息
     */
    public function autoLogin($user, $session_time = '') {

        /* 更新登录信息 */
        $data = array(
            'id' => $user['id'],
            'login' => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip' => get_client_ip(1),
        );
        $this->save($data);

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'uid' => $user['id'],
            'username' => $user['username'],
            'last_login_time' => $user['last_login_time'],
        );

        /*
          if (!empty($session_time)) {
          session(array('name' => 'user_auth', 'expire' => $session_time), $auth);
          session(array('name' => 'user_auth_sign', 'expire' => $session_time), data_auth_sign($auth));
          return true;
          }
         */

        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
        return true;
    }

    /**
     * 注销当前用户
     */
    public function logout() {
        session('user_auth', null);
        session('user_auth_sign', null);
    }

}
