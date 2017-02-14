<?php
/**
 * 系统信息页
 * @Author   Jackie Xie
 * @DateTime 2016-04-30
 */

class CopyAction extends CommonAction{
	//系统信息视图
	public  function index(){
		$this -> display();
	}

	//前端用户管理
	public function manage(){
		// 实例化User对象
		$User = M('user'); 
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $User->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,10);

		//配置分页形式
		$Page->setConfig('header','个用户');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('regtime')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('select',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}

	//删除用户方法
	public function delete(){
		$uid = I('uid');
		M('user')->where(array( 'uid' => $uid ))->delete();
		$this->success('用户删除成功',U(GROUP_NAME.'/Copy/manage'));
	}

	//锁定用户方法
	public function lock(){
		$uid = I('uid');
		$data['islock'] = 1;
		M('user')->where(array( 'uid' => $uid ))->save($data);
		$this->success('用户锁定成功',U(GROUP_NAME.'/Copy/manage'));
	}

	//解锁用户方法
	public function open(){
		$uid = I('uid');
		$data['islock'] = 0;
		M('user')->where(array( 'uid' => $uid ))->save($data);
		$this->success('用户解锁成功',U(GROUP_NAME.'/Copy/manage'));
	}
}
