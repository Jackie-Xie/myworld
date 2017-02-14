<?php
/**
 * 右边控制器
 * 
 */
class RightAction extends Action {
    /**
     * 自动执行
     */
    public function _initialize()
    {
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