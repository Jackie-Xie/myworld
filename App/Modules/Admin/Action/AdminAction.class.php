<?php
/**
 * 管理员信息页
 * @Author   Jackie Xie
 * @DateTime 2016-04-12
 */
class AdminAction extends CommonAction{
	//管理员信息添加视图
	public  function index(){
		$this -> display();
	}

    //图像上传处理
    Public function uppic(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();
        $upload->autoSub = true;
        $upload->subType = 'custom';
        if ($upload->upload('./Uploads/images/')){
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

    //信息添加处理
    public  function info_handle(){
        // 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData = array(
                'username' =>  I('username','','htmlspecialchars'),
                'sex' =>  I('sex','','htmlspecialchars'),
                'birthday' =>  I('birthday','','htmlspecialchars'),
                'constellation' =>  I('constellation','','htmlspecialchars'),
                'animalsign' =>  I('animalsign','','htmlspecialchars'),
                'hometown' =>  I('hometown','','htmlspecialchars'),
                'address' =>  I('address','','htmlspecialchars'),
                'indexname' =>  I('indexname','','htmlspecialchars'),
                'motto' =>  I('motto','','htmlspecialchars'),
                'introduce' =>  I('introduce','','htmlspecialchars'),
                'dream' =>  I('dream','','htmlspecialchars'),
                'degree' => I('degree','','htmlspecialchars'),
                'career' =>  I('career','','htmlspecialchars'),
                'ismarried' =>  I('ismarried','','htmlspecialchars'),
                'majortag' =>  I('majortag','','htmlspecialchars'),
                'photoUrl' =>  I('photoUrl','','htmlspecialchars'),
                'like' =>  I('like','','htmlspecialchars'),
                'sports' =>  I('sports','','htmlspecialchars'),
                'musics' =>  I('musics','','htmlspecialchars'),
                'films' =>  I('films','','htmlspecialchars'),
                'books' =>  I('books','','htmlspecialchars'),
                'superstars' =>  I('superstars','','htmlspecialchars'),
                'college_life' => I('college_life','','htmlspecialchars'), 
                'senior_life' =>  I('senior_life','','htmlspecialchars'),
                'middle_life' =>  I('middle_life','','htmlspecialchars'),
                'qq' =>  I('qq','','htmlspecialchars'),
                'email' =>  I('email','','htmlspecialchars'),
                'mobile' =>  I('mobile','','htmlspecialchars'),
                'telephone' =>  I('telephone','','htmlspecialchars'),
                'contactaddress' =>  I('contactaddress','','htmlspecialchars'),
                'zipcode' =>  I('zipcode','','htmlspecialchars')
            );

            // 实例化Admin对象
            $Info = M("info");

            //组装查询条件 
            $condition['adid'] = session('adid');
            // 查询条件传入,$condition是一个关联数组
            $info = $Info->where($condition)->find();

            //存取信息入数据库
            $saveData = array(
                'adid' => session('adid'),
                'sex' =>  $postData['sex'],
                'birthday' =>  $postData['birthday'],
                'constellation' =>  $postData['constellation'],
                'animalsign' =>  $postData['animalsign'],
                'hometown' =>  $postData['hometown'],
                'address' =>  $postData['address'],
                'indexname' =>  $postData['indexname'],
                'motto' =>  $postData['motto'],
                'introduce' =>  $postData['introduce'],
                'dream' =>  $postData['dream'],
                'degree' =>$postData['degree'],
                'career' => $postData['career'],
                'ismarried' =>  $postData['ismarried'],
                'majortag' =>  $postData['majortag'],
                'photoUrl' =>  $postData['photoUrl'],
                'like' =>  $postData['like'],
                'sports' =>  $postData['sports'],
                'musics' =>  $postData['musics'],
                'films' =>  $postData['films'],
                'books' =>  $postData['books'],
                'superstars' =>  $postData['superstars'],
                'college_life' => $postData['college_life'], 
                'senior_life' =>  $postData['senior_life'],
                'middle_life' =>  $postData['middle_life'],
                'qq' => $postData['qq'],
                'telephone' => $postData['telephone'],
                'contactaddress' => $postData['contactaddress'],
                'zipcode' =>  $postData['zipcode']
            );

            //验证查询结果
            if(!$info){
                $data['error_msg'] = '新增成功';
                M('info')->add($saveData);
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '修改成功';
                M('info')->save($saveData);
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }

        }
    }

	//修改密码
	public function pwd(){
		$this -> display();
	}

	//修改密码处理
	public function pwd_handle(){
		// 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData['username'] = I('username');
             $postData['password'] = I('password','','md5');

            // 实例化Admin对象
            $Admin = M("admin");

            //组装查询条件 
            $condition['username'] = $postData['username'];
            $condition['email'] = $postData['username'];
            $condition['mobile'] = $postData['username'];
            //改变查询逻辑为“OR”
            $condition['_logic'] = 'OR';
            // 查询条件传入,$condition是一个关联数组
            $admin = $Admin->where($condition)->find();

             //验证查询结果,密码
            if(!$admin){
                $data['error_msg'] = '此管理员用户不存在';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }else{
                //存取用户信息入数据库
                $saveData = array(
                    'adid' => $admin['adid'],
                    'password' => $postData['password']
                );

                M('admin')->save($saveData);

                //返回前台数据
                $data['error_msg'] = '密码修改成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');

            }
        }
	}


	//管理员注册
	public function register(){
		$this -> display();
	}

	//管理员注册处理
	public function reg_handle(){
		// 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
             //接收前台数据
             $postData['username'] = I('username');
             $postData['mobile'] = I('mobile');
             $postData['email'] = I('email');
             $postData['password'] = I('password','','md5');

            // 实例化Admin对象
            $Admin = D("Admin");

             // 自动验证 创建数据集
            if (!$data = $Admin->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                $error = $Admin->getError();
                $data['error_msg'] = $error;
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }
            // p($data);

            //插入数据库
            if($id = M('admin')->data($data)->add()){
                $data['error_msg'] = '注册成功';
                $data['status'] = 1;
                $this->ajaxReturn($data,'json');
            }else{
                //返回前台数据
                $data['error_msg'] = '注册失败';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');

            }
        }
	}


}