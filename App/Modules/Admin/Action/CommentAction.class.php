<?php
/**
 * 博文评论管理页
 * @Author   Jackie Xie
 * @DateTime 2016-05-15
 */

class CommentAction extends CommonAction{
	//博文评论列表
	public  function index(){

		// 实例化Comment对象
		$Comment = D('CommentRelation'); 
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Comment->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,4);

		//配置分页形式
		$Page->setConfig('header','条留言');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Comment->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
		
		// p($list);die;
		$this->assign('select',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}


	//回复评论
	public function reply(){
		// 实例化Comment对象
		$Comment = D('CommentRelation'); 
		$comid = I('comid');
		$comment = $Comment->where(array('comid'=>$comid))->relation(true)->find();

		$this->assign('comment',$comment)->display();
	}
	//回复评论处理
	public function	reply_handle(){
		// 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData = array(
                'comid' =>  I('comid'),
	        	'reply' => I('reply')
            );

             // p($postData);die;
             
            // 实例化comment对象
            $comment = M("comment");

             //插入数据库
            if($comment->where(array('comid'=>$postData['comid']))->save($postData)){
                $data['error_msg'] = '回复成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '回复失败';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }
        }
	}


	//回复评论
	public function del(){
		$comid = I('comid');
		// p($comid);die;
		M('comment')->where(array( 'comid' => $comid ))->delete();
		$this->success('评论删除成功',U(GROUP_NAME.'/Comment/index'));
	}

	public function lock(){
		$aid = I('aid');
		$data['islock'] = 1;
		// p($aid);die;
		M('user')->where(array( 'aid' => $aid ))->save($data);
		$this->success('评论者已锁定',U(GROUP_NAME.'/Copy/manage'));
	}

	public function del_user(){
		$aid = I('aid');
		// p($aid);die;
		M('user')->where(array( 'aid' => $aid ))->delete();
		$this->success('评论者已删除',U(GROUP_NAME.'/Copy/manage'));
	}
}