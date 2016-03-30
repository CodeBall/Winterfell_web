<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-3-25
 * Time: 下午3:54
 */
namespace Index\Controller;
use Think\Controller;
class AddController extends Controller {
    public function index(){
        $this->name = session('name');
        $this->display();
    }
    //添加单词信息
    public function add_words(){
        //获取单词信息
        $word_name = I('post.word_name');
        $paraphrase = I('post.paraphrase');
        $original_sent = I('post.original_sent');
        $make_sent1 = I('post.make_sent1');
        $make_sent2 = I('post.make_sent2');
        $make_sent3 = I('post.make_sent3');
        //判断非空项
        if(!$word_name || !$paraphrase || !$original_sent)
            $this->error('单词,释义和原句必须要写哦',U('Index/Add/index'),1);
        $data = array(
            "word_name"=>$word_name,
            "paraphrase"=>$paraphrase,
            "original_sent"=>$original_sent,
            "make_sent1"=>$make_sent1,
            "make_sent2"=>$make_sent2,
            "make_sent3"=>$make_sent3,
            "user_id"=>session('user_id'),
            "token"=>session('token')
        );
        //转换格式并发送请求
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/words/add');
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-Type:application/json',
            'Content-Length:'.strlen($data_string)
        ));
        $result = curl_exec($ch);
        $res = json_decode($result,true);
        if($res['status'] == 200)
            $this->success('单词卡添加成功,页面跳转中...',U('Index/Add/index'),0);
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        else
            $this->error('添加失败,页面跳转中...',U('Index/Add/index'),1);
    }
}