<?php
return array(
	//开启分组
	'APP_GROUP_LIST' => 'Index,Admin',
	//默认分组
	'DEFAULT_GROUP' => 'Index',
	//开启独立分组
	'APP_GROUP_MODE' => 1,
	//独立分组路径
	'APP_GROUP_PATH' => 'Modules',

	//数据库连接参数
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'myworld',
	'DB_PREFIX' => 'jk_',
	'DB_CHARSET' => 'utf8',     

	//点语法默认解析
	'TMPL_VAR_IDENTIFY' => 'array',
	//模板路径，文件分隔符
	'TMPL_FILE_DEPR' => '_',
	//加载验证码配置项
	'LOAD_EXT_CONFIG' => 'verify,water',

	//URL不区分大小写
	'URL_CASE_INSENSITIVE' =>true,
);
