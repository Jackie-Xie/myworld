<?php
/**
 * 通用控制器
 * 主要用于验证是否登陆 以及 用户权限
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
        if (session('uid')) {
            $this->userid = session('uid');
        } else {
            $this->error('对不起,您还没有登录,正跳转至登录面...', U('Login/index'));
        }

        //分配栏目
        $cats = M('category')->where('isoff=1')->order('sort asc')->limit(0,7)->select();
        //p($cats);die;
        $this -> assign('cats',$cats);

        //分配文章
        $arts = M('article')->where('isdel=0')->order('time desc')->limit(0,6)->select();
        //p($arts);die;
        $this -> assign('arts',$arts);

        //分配评论
        $coms = D('CommentRelation')->order('time desc')->limit(0,6)->relation(true)->select();
        // p($coms);die;
        $this -> assign('coms',$coms);

    }

}