<?php
class UserModel extends Model {
    // 重新定义表

    // 主键名称
    protected $pk               =   'uid';
    // 数据表前缀
    protected $tablePrefix      =   'jk_';
    // 模型名称
    protected $name             =   'User';
    // 数据库名称
    protected $dbName           =   'myworld';
    // 数据表名（不包含表前缀）
    protected $tableName        =   'user';
    // 实际数据表名（包含表前缀）
    protected $trueTableName    =   'jk_user';


    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        array('email', 'require', '邮箱格式不为空！'), // 内置正则验证邮箱格式
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已被注册！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('email', '', '该邮箱已被占用', 0, 'unique', 1),// 新增的时候email字段是否唯一
        array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱格式 
        array('mobile', '', '该手机号码已被占用', 0, 'unique', 1), // 新增的时候mobile字段是否唯一
        array('mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 0), // 正则表达式验证手机号码
    );

    /**
     * 自动完成
     */
    protected $_auto = array(
        array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('regtime', 'time', 1, 'function'), // 对regtime字段在新增的时候写入当前时间戳
        array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
    );
}