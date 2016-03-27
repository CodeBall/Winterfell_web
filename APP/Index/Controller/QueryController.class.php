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
        curl_setopt($curl,
            CURLOPT_URL,'http://127.0.0.1:5000/words/paraphrase/'.session('user_id')."/".$key);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        $response = curl_exec($curl);
        $jsondecode = json_decode($response,true);
        $word = $jsondecode['words'];

        //进行分页操作
        $count = count($word);
        $page = getpage($count,10);
        $this->assign('select', $word); // 赋值数据集
        $this->assign('page', $page->show()); // 赋值分页输出
        //调用页面
        $this->display('word_show');
    }
}