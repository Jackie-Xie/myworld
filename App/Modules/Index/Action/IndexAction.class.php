<?php

class IndexAction extends Action {
    public function index(){
    	// 实例化User对象
        $UserInfo = M("info");
        $list = $UserInfo->where('adid = 1')->find();
        $info = array(
        	'indexname' => $list['indexname'],
        	'motto' => $list['motto']
        );
        // p($info);die;
        // 实例化experience对象
        $Info = M("experience");
        $list = $Info->where('infoid = 1')->order('time desc')->limit(0,3)->select();
		// p($list);die;
		
		$item0=$list[0];
		$item1=$list[1];
		$item2=$list[2];
        $this->assign('info',$info)->assign('item0',$item0)->assign('item1',$item1)->assign('item2',$item2);
    	$this->display();
    }
}