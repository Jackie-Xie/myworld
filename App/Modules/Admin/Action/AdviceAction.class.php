<?php
/**
 * 留言管理页
 * @Author   Jackie Xie
 * @DateTime 2016-04-18
 */

class AdviceAction extends CommonAction{
	//留言管理视图
	public  function index(){
		// 实例化advice对象
		$advice = M('advice'); 
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $advice->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,4);

		//配置分页形式
		$Page->setConfig('header','条留言');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $advice->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('select',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}

	//删除留言
	public function del_advice(){
		$advid = I('advid');
		M('advice')->where(array( 'advid' => $advid ))->delete();
		$this->success('留言删除成功',U(GROUP_NAME.'/Advice/index'));
	}

	//删除留言者
	public function del_user(){
		$uid = I('uid');
		M('advice')->where(array( 'uid' => $uid ))->delete();
		M('user')->where(array( 'uid' => $uid ))->delete();
		$this->success('留言者删除成功',U(GROUP_NAME.'/Advice/index'));
	}

	//锁定留言者
	public function lock_user(){
		$uid = I('uid');
		$data['islock'] = 1;
		M('advice')->where(array( 'uid' => $uid ))->delete();
		M('user')->where(array( 'uid' => $uid ))->save($data);
		$this->success('留言者锁定成功',U(GROUP_NAME.'/Advice/index'));
	}
	
}