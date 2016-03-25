<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页注册功能
    public function index(){
        $this->display();
    }
    //用户注册处理
    public function sign_up(){
        $username = I('post.inputUsername');
        $nikename = I('post.inputNikename');
        $email = I('post.inputEmail');
        $password = I('post.inputPassword');
        if(!$username || !$nikename || !$email || !$password)
            $this->error('输入的信息有空值,请重新注册',U('Index/Index/index'));
        $data = array(
            'username' => $username,
            'nikename' => $nikename,
            'email' => $email,
            'password' => md5($password)
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/users');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $resu = curl_exec($ch);
        $result = json_decode($resu);
        if(empty($result)){
            //跳转至失败界面
            $this->error('',U('Index/Common/error'));
        }else{
            $this->nikename = $result['nikename'];
            $this->email = $result['email'];
            //跳转至成功界面
            $this->success('',U('Index/Common/success'));
        }
    }
    //跳转至登陆界面
    public function login(){
        $this->display();
    }
    //登录处理
    public function login_handle(){
        $data = array(
            'username' => I('post.InputEmail'),
            'password' => md5(I('post.InputPassword'))
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/users/login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        //将返回的json格式的信息转换成数组形式
        $res = json_decode($result,true);
        if($res['status'] == "false"){
            $this->error('用户名或密码错误,登录失败',U('Index/login'));
        }else{
            //将token存放在session中
            session('[start]');
            session('token',$res['token']);
            session('user_id',$res['user_id']);
            session('name',$res['nikename']);
            //登陆成功,跳转到网站首页
            $this->success('',U('Words/index'));
        }
    }
}