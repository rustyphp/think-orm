<?php
namespace app\examples;
require_once(dirname(__DIR__) . '/vendor/autoload.php');

use think\facade\Db;
Db::setConfig([
    // 默认数据连接标识
    'default'=>'mysql',
    // 数据库连接信息
    'connections'=>[
        'mysql'=>[
            // 数据库类型
            'type'=>'mysql',
            // 主机地址
            'hostname'=>'127.0.0.1',
            // 用户名
            'username'=>'root',
            'password'=>'123456',
            // 数据库名
            'database'=>'demo',
            // 数据库编码默认采用utf8
            'charset'=>'utf8',
            // 数据库表前缀
            'prefix'=>'',
            // 数据库调试模式
            'debug'=>true,
        ],
    ],
]);
// 数据库配置信息设置（全局有效）
$result=Db::table('admin_auth_rule')->where('group_id', 1)->select();
print_r($result);die;
