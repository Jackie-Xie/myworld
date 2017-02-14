<?php
/**
 * 爱好页面控制器
 */
class HobbyAction extends CommonAction {

	//爱好前台主页面
	public function index(){
		$Hobby = D('HobbyRelation');
		$data = $Hobby->relation(true)->select();
		// p($data);die;
		// p($data.picture);die;		
		$this -> assign('hobby',$data) -> display();
	}
}