<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 16-3-25
 * Time: 下午9:39
 * 查询控制器
 */
namespace Index\Controller;
use Think\Controller;
class QueryController extends Controller {
    //各种查询使用同一个展示页面,同一个分页查询函数,使用一个标识进行区分
    //bz = 1:查询全部
    //bz = 2:查询释义
    //bz = 3:查询例句
    //bz = 4:查询造句
    //bz = 5:时间线复习
    //bz = 6:随便看看
    //bz = 7:search输入框
    //查询所有单词
    public function all(){
        $curl = curl_init();
        //获取总数
        curl_setopt($curl,
            CURLOPT_URL,'http://127.0.0.1:5000/words/'.session('user_id')."/count");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        $count = curl_exec($curl);

        //获取最初的数据
        $num = 10;
        $No1 = 0;
        curl_setopt($curl,
            CURLOPT_URL,'http://127.0.0.1:5000/words/'.session('user_id')."/".$No1."/".$num);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        $response = curl_exec($curl);
        $jsondecode = json_decode($response,true);
        $word = $jsondecode['words'];
        $this->assign('select', $word); // 赋值数据集

        if($count%10 == 0)
            $this->maxp = floor($count/10);
        else
            $this->maxp = floor($count/10)+1;
        $this->assign('count', $count);
        $this->assign('p', 1);
        $this->assign('bz', 1);
        $this->display('word_show');
    }
    //获取分页数据展示
    public function all_word_show(){
        $p = $_GET['p'];
        $count = $_GET['count'];
        $bz = $_GET['bz'];
        $key = $_GET['key1'];
        $No1 = ($p-1)*10;
        if($p*10<=$count) $num = 10;
        else $num = $count-$No1+1;
        //获取该页数据
        $curl = curl_init();
        if($bz == 1)
            curl_setopt($curl,
                CURLOPT_URL,'http://127.0.0.1:5000/words/'.session('user_id')."/".$No1."/".$num);
        elseif($bz == 2)
            curl_setopt($curl,
                CURLOPT_URL,'http://127.0.0.1:5000/words/paraphrase/'.session('user_id')."/".$key."/".$No1."/".$num);


        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($curl);
        $jsondecode = json_decode($response,true);
        $word = $jsondecode['words'];
        $this->assign('select', $word); // 赋值数据集

        if($count%10 == 0)
            $this->maxp = floor($count/10);
        else
            $this->maxp = floor($count/10)+1;

        $this->assign('count', $count);
        $this->assign('p', $p);
        $this->assign('bz', $bz);
        $this->assign('key1', $key);
        $this->display('word_show');
    }
    public function paraphrase(){
        if(!session('user_id'))
            $this->error('登陆过期,请重新登录',U('Index/index/login'));
        else
            $this->display();
    }
    //根据释义查询处理
    public function paraphrase_handle(){
        $key = I('post.paraphrase_word');
        $curl = curl_init();
        //获取数目
        curl_setopt($curl,
            CURLOPT_URL,'http://127.0.0.1:5000/words/paraphrase/'.session('user_id')."/".$key."/count");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $count = curl_exec($curl);
        curl_close($curl);

        $num = 10;
        $No1 = 0;
        $curl = curl_init();
        curl_setopt($curl,
            CURLOPT_URL,'http://127.0.0.1:5000/words/paraphrase/'.session('user_id')."/".$key."/".$No1."/".$num);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        $response = curl_exec($curl);
        curl_close($curl);
        $jsondecode = json_decode($response,true);
        $word = $jsondecode['words'];

        $this->assign('select', $word); // 赋值数据集

        if($count%10 == 0)
            $this->maxp = floor($count/10);
        else
            $this->maxp = floor($count/10)+1;
        //调用页面
        $this->assign('key1', $key);
        $this->assign('bz', 2);
        $this->assign('count', $count);
        $this->assign('p', 1);
        $this->display('word_show');
    }
}