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
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        $data = array(
            "wordId"=>$id,
            "paraphrase"=>$paraphrase,
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
            $this->success('释义编辑成功',U('Index/Words/index'),0);
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        else
            $this->error('编辑失败,页面跳转中...',U('Index/Words/index'),1);
    }
    public function make_sent1(){
        $make_sent1 = I('post.make_sent1');
        $id = I('post.word_id');
        if(!session('user_id'))
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        $data = array(
            "wordId"=>$id,
            "makeSent1"=>$make_sent1,
            "token"=>session('token')
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/words/update/make1');
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
            $this->success('造句编辑成功',U('Index/Words/index'),0);
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        else
            $this->error('编辑失败,页面跳转中...',U('Index/Words/index'),1);
    }
    public function make_sent2(){
        $make_sent2 = I('post.make_sent2');
        $id = I('post.word_id');
        if(!session('user_id'))
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        $data = array(
            "wordId"=>$id,
            "makeSent2"=>$make_sent2,
            "token"=>session('token')
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/words/update/make2');
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
            $this->success('造句编辑成功',U('Index/Words/index'),0);
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        else
            $this->error('编辑失败,页面跳转中...',U('Index/Words/index'),1);
    }
    public function make_sent3(){
        $make_sent3 = I('post.make_sent3');
        $id = I('post.word_id');
        if(!session('user_id'))
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        $data = array(
            "wordId"=>$id,
            "makeSent3"=>$make_sent3,
            "token"=>session('token')
        );
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:5000/words/update/make3');
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
            $this->success('造句编辑成功,页面跳转中...',U('Index/Words/index'),0);
        else if($res['status'] === "wrong")
            $this->error('登陆过期,请重新登录',U('Index/index/login'),1);
        else
            $this->error('编辑失败,页面跳转中...',U('Index/Words/index'),1);
    }
}