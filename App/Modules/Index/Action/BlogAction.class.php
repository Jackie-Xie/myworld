<?php
/**
 * 博客首页控制器
 */
class BlogAction extends RightAction {

	//首页显示视图
	public function index() {
		//分配博客到前端
		$Blog = M('article');
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Blog->where('isdel=0')->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,2);

		//配置分页形式
		$Page->setConfig('header','篇博文');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Blog->where('isdel=0')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('select',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}

}