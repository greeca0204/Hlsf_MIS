<?php
return array(
	//'配置项'=>'配置值'
		
	/* 默认设定 */
    'DEFAULT_THEME'        =>  '',	// 默认模板主题名称
    'DEFAULT_MODULE'       =>  'Cms',  // 默认模块
    'DEFAULT_CONTROLLER'   =>  'Login', // 默认控制器名称
    'DEFAULT_ACTION'       =>  'index' , // 默认操作名称

    // 数据库设定
    'DB_TYPE'   => 'mysql',
	'DB_HOST'   => '120.25.162.62',
	'DB_USER'   => 'root',
	'DB_PWD'    => 'Sf791125',

	'DB_NAME'   => 'hlsf',
	'DB_PREFIX' => 'hlsf_',
	'DB_DEBUG'  => false,

    /**
	 * 模板文件默认后缀名
	 */
	'TMPL_TEMPLATE_SUFFIX' => '.tpl',

	'TMPL_PARSE_STRING' => array(
		'__IMG__'         => __ROOT__ . '/Public/img',
		'__CSS__'         => __ROOT__ . '/Public/css',
		'__JS__'          => __ROOT__ . '/Public/js',
		'__FONT__'        => __ROOT__ . '/Public/font',
		'__THIRD__'       => __ROOT__ . '/Public/3rd' ,
		'__UPLOAD__'      => __ROOT__ . '/Public/upload'
		
	),

	'URL_CASE_INSENSITIVE' =>   true ,
	'URL_PARAMS_BIND'       =>  true, 
	'URL_PARAMS_BIND_TYPE'  =>  1 
);