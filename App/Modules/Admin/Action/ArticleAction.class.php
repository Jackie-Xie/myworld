<?php
/**
 * 博文管理页
 * @Author   Jackie Xie
 * @DateTime 2016-05-14
 */


class ArticleAction extends CommonAction{

	//查看视图
	public  function check(){
		$Article = D('ArticleRelation');
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Article->where('isdel=0')->relation(true)->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,3);

		//配置分页形式
		$Page->setConfig('header','个栏目');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Article->where('isdel=0')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
		$this-> assign('list',$list);
		$this-> assign('page',$show);
		$this -> display();
	}


	//添加博文
	public function add(){
		//查找所有类目
		$data = M('category')->where('isoff=1')->select();
		//分配所有类目
		$this->assign('cateList',$data);

		$this->display();
	}

	//添加博文处理
	public function add_handle(){
		 // 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData = array(
                'title' =>  I('title','','htmlspecialchars'),
                'thumb' => I('thumb','','htmlspecialchars'),
	        	'cid' => I('cid','','htmlspecialchars'),
	        	'click' => I('click','','htmlspecialchars'),
	        	'summary' => I('summary','','htmlspecialchars'),
	        	'content' => I('content','','htmlspecialchars'),
	        	'istop' => I('istop','','htmlspecialchars'),
	        	'time' => time()
            );

             // p($postData);die;
             
            // 实例化experience对象
            $article = M("article");

             //插入数据库
            if($id = $article->data($postData)->add()){
                $data['error_msg'] = '发表成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '发表失败';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');

            }

        }

	}
	

	//编辑博文
	public function edit(){
		//查找所有类目
		$data = M('category')->where('isoff=1')->select();
		//分配所有类目
		$this->assign('cateList',$data);

		$aid = I('aid');
		$article = D('ArticleRelation')->where(array('aid'=>$aid))->relation(true)->find();

		// p($article);die;

		$this->assign('article',$article)-> display();
	}

	//编辑博文处理
	public function edit_handle(){
		 // 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData = array(
                'title' =>  I('title','','htmlspecialchars'),
                'thumb' => I('thumb','','htmlspecialchars'),
	        	'cid' => I('cid','','htmlspecialchars'),
	        	'aid' => I('aid','','htmlspecialchars'),
	        	'click' => I('click','','htmlspecialchars'),
	        	'summary' => I('summary','','htmlspecialchars'),
	        	'content' => I('content','','htmlspecialchars'),
	        	'istop' => I('istop','','htmlspecialchars'),
	        	'time' => time()
            );

             // p($postData);die;
             
            // 实例化experience对象
            $article = M("article");

             //插入数据库
            if($article->where(array('aid' => $postData['aid']))->find()){
            	$article->where(array('aid' => $postData['aid']))->save($postData);
                $data['error_msg'] = '修改成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '修改失败';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');

            }

        }

	}

	//置顶
	public  function recycle_bin(){
		$Article = D('ArticleRelation');
		// 导入分页类
		import('Class.Page',APP_PATH);
		// 查询满足要求的总记录数
		$count      = $Article->where('isdel=1')->relation(true)->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page       = new Page($count,3);

		//配置分页形式
		$Page->setConfig('header','个栏目');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');

		// 分页显示输出
		$show       = $Page->show();

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Article->where('isdel=1')->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
		$this-> assign('list',$list);
		$this-> assign('page',$show);
		$this -> display();
	}

	//置顶
	public  function top(){
		$aid = I('aid');
		$data['istop'] = 1;
		M('article')->where(array( 'aid' => $aid ))->save($data);
		$this->success('置顶成功',U(GROUP_NAME.'/Article/check'));
	}
	//取消置顶
	public  function nottop(){
		$aid = I('aid');
		$data['istop'] = 0;
		M('article')->where(array( 'aid' => $aid ))->save($data);
		$this->success('置顶成功',U(GROUP_NAME.'/Article/check'));
	}

	//回收站视图
	public  function recycle(){
		$aid = I('aid');
		$data['isdel'] = 1;
		M('article')->where(array( 'aid' => $aid ))->save($data);
		$this->success('回收成功',U(GROUP_NAME.'/Article/check'));
	}

	//移除回收站视图
	public  function recover(){
		$aid = I('aid');
		$data['isdel'] = 0;
		M('article')->where(array( 'aid' => $aid ))->save($data);
		$this->success('恢复成功',U(GROUP_NAME.'/Article/check'));
	}

	//删除博文
	public  function del(){
		$aid = I('aid');
		M('article')->where(array( 'aid' => $aid ))->delete();
		$this->success('删除成功',U(GROUP_NAME.'/Article/check'));
	}
	

	//图像上传处理
    Public function uppic(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->autoSub = true;
        $upload->subType = 'custom';
        if ($upload->upload('./Uploads/articles/')){
            $info = $upload->getUploadFileInfo();
        }
        $file_newname = $info['0']['savename'];
        $MAX_SIZE = 20000000;
        if($info['0']['type'] !='image/jpeg' && $info['0']['type'] !='image/jpg' && $info['0']['type'] !='image/pjpeg' && $info['0']['type'] != 'image/png' && $info['0']['type'] != 'image/x-png'){
            echo "2";exit;
        }
        if($info['0']['size']>$MAX_SIZE)
            echo "上传的文件大小超过了规定大小";
        
        if($info['0']['size'] == 0)
            echo "请选择上传的文件";
        switch($info['0']['error'])
        {
            case 0:
                echo $file_newname;
                break;
            case 1:
                echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
                break;
            case 2:
                echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                break;
            case 3:
                echo "文件只有部分被上传";
                break;
            case 4:
                echo "没有文件被上传";
                break;
        }
    }

	//ueditor图片上传处理
	public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		//配置项
		$upload->autoSub = true;
		$upload->subType = 'date';
		$upload->dateFormat = 'Ymd';

		/*
	     * 'url'     :'a.jpg',   //保存后的文件路径
	     * 'title'   :'hello',   //文件描述，对图片来说在前端会添加到title属性上
	     * 'original':'b.jpg',   //原始文件名
	     * 'state'   :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
	     * */
		if($upload->upload('./Uploads/articles/')){
			//获取上传文件信息
			$info = $upload->getUploadFileInfo();

			//添加水印
			/*import('ORG.Util.Image');
			Image::water('./Uploads/' . $info[0]['savename'], './data/logo.png');*/
			import('Class.Image' , APP_PATH);
			Image::water('./Uploads/articles/' . $info[0]['savename']);

			echo json_encode(array(
				'url'      => $info[0]['savename'],
				'title'    => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
				'original' => $info[0]['name'],
				'state'    => 'SUCCESS'
				));
		}
		else{
			echo json_encode(array(
				'state'    => $upload->getErrorMsg()
				));
		}
		
	}

}