<?php

// +----------------------------------------------------------------------
// | @filename AdminController.class.php 
// +----------------------------------------------------------------------
// | @encoding UTF-8 
// +----------------------------------------------------------------------
// | @author Z.H <497110669@qq.com> 
// +----------------------------------------------------------------------
// | @datetime 2015-8-12  17:49:01
// +----------------------------------------------------------------------
// | @Description
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Think\Controller;

class AdminManageController extends CommonController {

    public function index() {
        $this->meta_title = '管理员列表';

        $this->display();
    }

    public function edit() {
        
    }

    public function delete() {
        
    }

    public function lock() {
        $where['id'] = I('post.id');
        $Admin = M('Admin');
        
        $status = $Admin->where($where)->getField('status');

        if ($status == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
   
        $data['code'] = $Admin->where($where)->save($data);
        $this->ajaxReturn($data);
    }

    public function adminList() {
        //获取Datatables发送的参数 必要
        $draw = $_GET['draw']; //这个值作者会直接返回给前台
        //排序
        $order_column = $_GET['order']['0']['column']; //那一列排序，从0开始
        $order_dir = $_GET['order']['0']['dir']; //ase desc 升序或者降序
        //拼接排序sql
        $orderSql = "";
        if (isset($order_column)) {
            $i = intval($order_column);

            switch ($i) {
                case 0;
                    $orderSql = "id " . $order_dir;
                    break;
                case 1;
                    $orderSql = "user_name " . $order_dir;
                    break;
                case 2;
                    $orderSql = "last_login_ip " . $order_dir;
                    break;
                case 3;
                    $orderSql = "last_login_time " . $order_dir;
                    break;
                case 4;
                    $orderSql = "login " . $order_dir;
                    break;
                case 5;
                    $orderSql = "status " . $order_dir;
                    break;
                default;
                    $orderSql = '';
            }
        }
        //搜索
        $search = $_GET['search']['value']; //获取前台传过来的过滤条件
        //分页
        $start = $_GET['start']; //从多少开始
        $length = $_GET['length']; //数据长度
        $limitSql = '';
        $limitFlag = isset($_GET['start']) && $length != -1;
        if ($limitFlag) {
            $limitSql = intval($start) . ", " . intval($length);
        }

        //条件过滤后记录数 必要
        $recordsFiltered = 0;
        //表的总记录数 必要
        $recordsTotal = 0;

        //定义查询数据总记录数
        $Admin = M('Admin');
        $recordsTotal = $Admin->count('id');

        //定义过滤条件查询过滤后的记录数sql
        //$sumSqlWhere = " where id||username LIKE '%" . $search . "%'";

        $sumSqlWhere['id'] = array("LIKE", $search);
        $sumSqlWhere['username'] = array("LIKE", $search);
        $sumSqlWhere['_logic'] = 'or';

        if (strlen($search) > 0) {
            $recordsFiltered = $Admin->where($sumSqlWhere)->count('id');
        } else {
            $recordsFiltered = $recordsTotal;
        }

        //查询数据
        $infos = array();
        if (strlen($search) > 0) {
            //如果有搜索条件，按条件过滤找出记录
            $infos = $Admin->field("id,username,last_login_ip,last_login_time,login,status")->where($sumSqlWhere)->order($orderSql)->limit($limitSql)->select();
        } else {
            //直接查询所有记录
            $infos = $Admin->field("id,username,last_login_ip,last_login_time,login,status")->order($orderSql)->limit($limitSql)->select();
            
        }

        /*
         * Output 包含的是必要的
         */
        $resultData = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => $infos
        );

        return $this->ajaxReturn($resultData);
    }

}
