<?php
/**
 * 爱好管理页
 * @Author   Jackie Xie
 * @DateTime 2016-05-21
 */

class HobbyAction extends CommonAction{
	//爱好列表视图
	public  function show(){
		$this -> display();
	}


	//编辑爱好详情
	public function edit(){
		$this -> display();
	}

	public function modify(){
		$this -> display();
	}

	//添加爱好
	public function add(){
		$this -> display();
	}

	//添加爱好
	public function add_handle(){
		$this -> display();
	}

	//添加爱好
	public function del(){
		$this -> display();
	}
}