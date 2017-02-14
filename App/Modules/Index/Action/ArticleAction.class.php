<?php
/**
 * 博文控制器
 */
class ArticleAction extends CommonAction {

	//博文详情
	public function index() {
		$aid = I('aid','','htmlspecialchars') ;
		//分配博客到前端
		$Blog = D('ArticleRelation');
		// 找到该篇博文
		$article = $Blog->where(array('aid' => $aid))->relation(true)->find();
		// p($article);die;
		
		// 分配评论到前端
		$Comment = D('CommentRelation');
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Comment->where(array('aid' => $aid))->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,2);

		//配置分页形式
		$Page->setConfig('header','条评论');
		$Page->setConfig('first','<');
		$Page->setConfig('last','>');

		// 分页显示输出
		$show       = $Page->show();

		$comment = $Comment->where(array('aid' => $aid))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
		// p($comment);die;

		$this->assign('cat',$article['category']);
		$this->assign('article',$article);
		$this->assign('user',$comment['user']);
		$this->assign('comm',$comment);
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}


	//博文列表
	public function articleList() {
		//分配博客到前端
		$Blog = M('article');
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Blog->where('isdel=0')->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,4);

		//配置分页形式
		$Page->setConfig('header','篇博文');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$top = $Blog->where('isdel=0 AND istop=1')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$bottom = $Blog->where('isdel=0 AND istop=0')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('top',$top);// 赋值置顶数据集
		$this->assign('bottom',$bottom);// 赋值不置顶数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}

	public function comment_handle() {
		if (!IS_AJAX) {halt('页面不存在');}
		else{
			if(I('verify','') != session('verify')){
                $data['error_msg'] = '验证码错误';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }
            else{
            	$data = array (
					'nickname' => I('username'),
					'uid' => I('uid'),
					'aid' => I('aid'),
					'content' => I('content'),
					'time' => time()
				);
				// p($data);die;
				
				if ($id = M('comment')->data($data)->add()){
					$data['comid'] = $id;
					$data['time'] = date('Y-m-d H:i', $data['time']);
					$data['status'] = 1;
					$this->ajaxReturn($data,'json');
				}else{
					$data['error_msg'] = '发布失败';
					$data['status']=0;
					$this->ajaxReturn($data,'json');
				}
            }
		}
		
	}
}