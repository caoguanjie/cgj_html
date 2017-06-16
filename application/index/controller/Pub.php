<?php
/**
 * Created by PhpStorm.
 * User: caoguanjie
 * Date: 2017/5/30
 * Time: 下午1:06
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
use app\admin\model\BlogTag as tagModel;
use app\index\model\Pub as artModel;
class Pub extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $data1 = new tagModel;
        $data2 = new artModel;
        $res1 = $data1->field('id,name')->select();
        $res2 = $data2->field('id,title,create_time')->select();
        $time=[];
        foreach ($res2 as $value){
            $time[]=$value['create_time'];

        };
        $t = array_count_values($time);
        $this->assign('time',$t);
        $this->assign('tag',$res1);
        $this->assign('article',$res2);
    }

}