<?php
return array(
	//'配置项'=>'配置值'
    /* 数据缓存设置 */
    'DATA_CACHE_TIME'       =>  1,             //长连接时间,REDIS_PERSISTENT为1时有效
    'DATA_CACHE_PREFIX'     =>  '',            // 缓存前缀
    'DATA_CACHE_TYPE'       =>  'Redis',       //数据缓存类型
    'DATA_EXPIRE'           =>  0,               //数据缓存有效期(单位:秒) 0表示永久缓存
    'DATA_PERSISTENT'      =>  1,               //是否长连接

    //Redis缓存配置
    'DATA_REDIS_HOST'            =>  '127.0.0.1', //分布式Redis,默认第一个为主服务器
    'DATA_REDIS_PORT'            =>  '6379',           //端口,如果相同只填一个,用英文逗号分隔
    'DATA_REDIS_AUTH'            =>  '',    //Redis auth认证(密钥中不能有逗号),如果相同只填一个,用英文逗号分隔
    'REDIS_CTYPE'           => 1, //连接类型 1:普通连接 2:长连接
    'REDIS_TIMEOUT'         => 0, //连接超时时间(S) 0:永不超时
    'REDIS_PERSISTENT'      =>1,
);