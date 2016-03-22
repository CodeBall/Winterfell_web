<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-3-22
 * Time: 下午9:12
 */
namespace Index\Controller;
use Think\Controller;
class CommonController extends Controller{
    //定义成功界面,不知道是不是需要穿参才能用
    public function success()
    {
        $this->display();
    }
    //定义失败界面
    public function error(){
        $this->display();
    }
}