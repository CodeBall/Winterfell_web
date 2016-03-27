<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-3-23
 * Time: 下午8:31
 */
namespace Index\Controller;
use Think\Controller;
class WordsController extends Controller{
    public function index(){
        $value = session('token');
        if(empty($value)){
            $this->error("请登录",U('Index/login'));
        }
        $this->display();
    }
}