<?php
/**
 * 后台管理首页
 * @Author   Jackie Xie
 * @DateTime 2016-04-11
 */

class IndexAction extends CommonAction{
	//后台主页视图
	public  function index(){
		$this -> display();
	}

	//发布前端信息视图
	public  function experience(){
		$this -> display();
	}

	//处理发布经历信息
	public function handle(){
         // 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData = array(
                'title' =>  I('title','','htmlspecialchars'),
                'time' =>  I('time','','htmlspecialchars'),
                'photoUrl' =>  I('photoUrl','','htmlspecialchars'),
                'content' =>  I('content','','htmlspecialchars'),
                'infoid' =>  I('infoid','','htmlspecialchars')
            );

            // 实例化experience对象
            $experience = M("experience");

             //插入数据库
            if($id = M('experience')->data($postData)->add()){
                $data['error_msg'] = '添加成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '添加失败';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');

            }

        }

	}

	 //图像上传处理
    Public function uppic(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->autoSub = true;
        $upload->subType = 'custom';
        if ($upload->upload('./Uploads/experiences/')){
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
		if($upload->upload('./Uploads/experiences/')){
			//获取上传文件信息
			$info = $upload->getUploadFileInfo();

			//添加水印
			/*import('ORG.Util.Image');
			Image::water('./Uploads/' . $info[0]['savename'], './data/logo.png');*/
			import('Class.Image' , APP_PATH);
			Image::water('./Uploads/experiences/' . $info[0]['savename']);

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