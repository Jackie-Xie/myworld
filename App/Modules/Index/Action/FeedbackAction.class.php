<?php
/**
 * 建议页面控制器
 */
class FeedbackAction extends CommonAction {
	//建议墙主页	
	Public function index(){
		$advice= M('advice')->select();
		$this->assign('advice',$advice)->display();

	}

    //表单处理
	Public function handle(){
		if (!IS_AJAX) 	halt('页面不存在');
		$data = array (
			'username' => I('username'),
			'email' => I('email'),
			'content' => I('content'),
			'time' => time(),
			'userip' => get_client_ip(),
		);
		
		if ($id = M('advice')->data($data)->add()){
			$data['id'] = $id;
			$data['content'] = replace_phiz($data['content']);
			$data['time'] = date('y-m-d H:i', $data['time']);
			$data['status'] = 1;
			$this->ajaxReturn($data,'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}

	}
}
