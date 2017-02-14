
<?php
/**
 * 登录控制器
 */
class LoginAction extends Action {

    /**
     * 用户登录
     */
    public function index()
    {
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $login = D('Login');

            // 自动验证 创建数据集
            if (!$data = $login->create()) {               
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                $error = $login->getError();
                // exit($login->getError());
                $this->error($error);
            }


            //验证码匹配       
            if(I('verify','') != session('verify')){
                $this->error('验证码错误');
            }

            // 组合查询条件
            $condition = array();
            $condition['username'] = $data['username'];
            $condition['email'] = $data['username'];
            $condition['mobile'] = $data['username'];

            //改变查询逻辑为“OR”
            $condition['_logic'] = 'OR';

            // 查询条件传入,$condition是一个关联数组
            $result = $login->where($condition)->field('uid,username,password,lastdate,lastip')->find();

            // 验证用户名 对比密码
            if ($result && $result['password'] == $data['password']) {
                // 存储session
                session('uid', $result['uid']);          // 当前用户id
                session('username', $result['username']);   // 当前用户名
                session('lastdate', $result['lastdate']);   // 上一次登录时间
                session('lastip', $result['lastip']);       // 上一次登录ip

                // 更新用户登录信息
                $where['uid'] = session('uid');
                M('user')->where($where)->save($data);   // 更新登录时间和登录ip

                $this->success('登录成功,正跳转至博客首页...', U('Blog/index'));
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 用户注册
     */
    public function register()
    {
        // 判断提交方式 做不同处理
        if (IS_POST) {
            // 实例化User对象
            $user = D('User');
            // 自动验证 创建数据集
            if (!$data = $user->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                $error = $user->getError();
                $this->error($error);
            }
            p($data);
            //验证码匹配       
            if(I('verify','') != session('verify')){
                $this->error('验证码错误');
            }

            //插入数据库
            if ($id = M('user')->data($data)->add()) {

                $this->success('注册成功', U('Login/index'), 2);
            } else {
                $this->error('注册失败');
            }

        } else {
            $this->display();
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
     * 忘记密码
     */
    public function forgot(){
        $this -> display();
    }

    /**
     * 调用验证码类
     */
    Public function verify(){
        ob_clean();
    	import('class.Image',APP_PATH);
    	Image::verify();
    }
}