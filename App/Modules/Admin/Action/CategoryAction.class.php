<?php
/**
 * 栏目管理控制器
 * @Author   Jackie Xie
 * @DateTime 2016-05-07
 */
class CategoryAction extends CommonAction{

	//添加栏目视图
	public function add(){
		$this -> display();
	}

	public function add_handle(){
		if(!IS_AJAX){
			halt('页面不存在');
		}
		else{
			//接收前台数据
			$data = array(
				'cname' => I('cname','','htmlspecialchars'),
				'bname' => I('bname','','htmlspecialchars'),
				'isoff' => I('isoff','','htmlspecialchars'),
				'keywords' => I('keywords','','htmlspecialchars'),
				'description' => I('description','','htmlspecialchars')
				);
			// 实例化category对象
			$category = M('category');
			$cid = $category->add($data);
			//返回前台数据
			if(!$cid){
				$data['error_msg'] = '因网络原因添加失败';
            	$data['status'] = 0;
			}else{
				$data['error_msg'] = '添加成功';
            	$data['status'] = 1;
			}
            $this->ajaxReturn($data,'json');
		}

	}
		
	//编辑栏目视图
	public function edit(){
		$cid = I('cid');
		$data = M('category')->where(array( 'cid' => $cid ))->find();
		$this  -> assign('data' , $data) -> display();
	}

	//编辑栏目后，修改视图
	public function modify(){
		if(!IS_AJAX){
			halt('页面不存在');
		}
		else{
			//接收前台数据
			$data = array(
				'cid' => I('cid','','htmlspecialchars'),
				'cname' => I('cname','','htmlspecialchars'),
				'bname' => I('bname','','htmlspecialchars'),
				'isoff' => I('isoff','','htmlspecialchars'),
				'keywords' => I('keywords','','htmlspecialchars'),
				'description' => I('description','','htmlspecialchars')
				);
			// 实例化category对象
			$category = M('category');
			$state = $category->where(array( 'cid' => $data['cid'] ))->save($data);
			//返回前台数据
			if(!$state){
				$data['error_msg'] = '因网络原因修改失败';
            	$data['status'] = 0;
			}else{
				$data['error_msg'] = '修改成功';
            	$data['status'] = 1;
			}
            $this->ajaxReturn($data,'json');
		}
	}

	//查看栏目视图
	public function check(){
		// 实例化advice对象
		$category = M('category'); 
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $category->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,4);

		//配置分页形式
		$Page->setConfig('header','个栏目');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $category->order('cid')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('select',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this -> display();		
	}

	//关闭栏目，1状态为开启状态，0为关闭状态
	public function close(){
		$cid = I('cid');
		$data['isoff'] = 0;
		M('category')->where(array( 'cid' => $cid ))->save($data);
		$this->success('栏目关闭成功',U(GROUP_NAME.'/Category/check'));
	}

	//打开栏目，1状态为开启状态，0为关闭状态
	public function open(){
		$cid = I('cid');
		$data['isoff'] = 1;
		M('category')->where(array( 'cid' => $cid ))->save($data);
		$this->success('栏目打开成功',U(GROUP_NAME.'/Category/check'));
	}

	//删除栏目
	public function del(){
		$cid = I('cid');
		M('category')->where(array( 'cid' => $cid ))->delete();
		$this->success('栏目删除成功',U(GROUP_NAME.'/Category/check'));
	}

}