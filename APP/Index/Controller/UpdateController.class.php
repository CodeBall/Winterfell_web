<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-3-29
 * Time: 下午8:18
 */
namespace Index\Controller;
use Think\Controller;
class UpdateController extends Controller {
    public function paraphrase(){
        $paraphrase = I('post.paraphrase');
        $id = I('post.word_id');
        if(!session('user_id'))
            $this->error('登陆过期,请重新登录',U('Index/index/login'));
        $data = array(
            "paraphrase"=>$paraphrase,
            "wordId"=>$id,
            "token"=>session('token')
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/words/update/paraphrase');
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-Type:application/json',
            'Content-Length:'.strlen($data_string)
        ));
        $result = curl_exec($ch);
        $res = json_decode($result,true);
        if($res['status'] == 200)
            $this->success('释义修改成功',U('Index/Words/index'));
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'));
        else
            $this->error('修改失败',U('Index/Words/index'));
    }
    public function make_sent1(){
        print_r("hdsgyf");
    }
    public function make_sent2(){
        print_r("hdsgyf");
    }
    public function make_sent3(){
        print_r("hdsgyf");
    }
}