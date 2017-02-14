<?php
/**
 * 通用控制器
 * 主要用于验证是否登陆 以及 用户权限
 * @Author   Jackie Xie
 * @DateTime 2016-04-11
 */

class CommonAction extends Action {
    /* 定义用户id */
    public static $userid = '';

    /**
     * 自动执行
     */
    public function _initialize()
    {
        // 判断用户是否登录
        if (session('adid')) {
            $this->userid = session('adid');
        } else {
            $this->error('对不起,您还没有登录,正跳转至登录界面...', U(GROUP_NAME . '/Login/index'));
        }
    }

}