<?php
/**
 * 后台登录控制器
 * @Author   Jackie Xie
 * @DateTime 2016-04-21
 */

class LoginAction extends Action{
	/**
     * 登录视图
     */
	public function index(){
		$this -> display();
	}

	/**
     * 登录表单处理
     */
    public function login(){
        // 判断提交方式
        if (!IS_AJAX){
             halt('页面不存在');
        } 
        else{
            if(I('verify','') != session('verify')){
                $data['error_msg'] = '验证码错误';
                $data['status'] = 0;
                $this->ajaxReturn($data,'json');
            }
            else{
                 //接收前台数据
                 $postData['username'] = I('username');
                 $postData['password'] = I('password','','md5');

                // 实例化User对象
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
                if(!$admin || $admin['password'] != $postData['password']){
                    $data['error_msg'] = '账号或密码错误';
                    $data['status'] = 0;
                    $this->ajaxReturn($data,'json');
                }else{
                    //存取用户信息入数据库
                    $saveData = array(
                        'adid' => $admin['adid'],
                        'logintime' => time(),
                        'loginip' => get_client_ip()
                    );
                    M('admin')->save($saveData);

                    //存取session
                    session('adid',$admin['adid']);
                    session('adminname',$admin['username']);
                    session('logintime',date('Y-m-d H:i:s',$admin['logintime']));
                    session('loginip',$admin['loginip']);

                    //返回前台数据
                    $data['status'] = 1;
                    $this->ajaxReturn($data,'json');

                }
            }
        }
    }  
           

    /**
     * 用户注销
     */
    public function logout()
    {
        // 清除所有session
        session_unset();
        session_destroy();
        $this->success('注销成功，正在跳转至登录页面...', U(GROUP_NAME.'/Login/index'));
    }

	/**
     * 调用验证码类
     */
    public function verify(){
        ob_clean();
    	import('Class.Image',APP_PATH);
    	Image::verify();
    }
}