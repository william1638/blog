<?php

return array(
//*********************************附加设置***********************************
    'LOAD_EXT_CONFIG'       =>  'db,webconfig,oauth',         //加载网站设置文件

'TMPL_PARSE_STRING'  => array(
    '__ADMIN_CSS__'  =>  __ROOT__.trim(TMPL_PATH,'.').'Admin/Public/css',

),

//************************************数据库设置*************************************
    'DB_TYPE'               =>  'mysqli',                 // 数据库类型
    'DB_HOST'               =>  '127.0.0.1',     // 服务器地址
    'DB_NAME'               =>  'yzwblog',     // 数据库名
    'DB_USER'               =>  'root',     // 用户名
    'DB_PWD'                =>  '123',      // 密码
    'DB_PORT'               =>  '3306',     // 端口
    'DB_PREFIX'             =>  'yzw_',   // 数据库表前缀




);