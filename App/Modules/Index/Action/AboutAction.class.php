<?php
/**
 * 关于页面控制器
 */
class AboutAction extends CommonAction{
	//关于我主页
	public function index() {
		$Info = M('info');
		$data = $Info -> join('jk_admin ON jk_info.adid = jk_admin.adid') -> find();
		$this -> assign('info',$data) -> display();
	}
}