<?php
/**
 * Created by PhpStorm.
 * User: ying.yu
 * Date: 2019/9/4
 * Time: 14:23
 */
use Workerman\Worker;
require_once './vendor/workerman/workerman/Autoloader.php';

$worker = new Worker('tcp://0.0.0.0:1234');
$worker->count=3;
$worker->onMessage = function($connection, $data)
{
    // 长连接
    $connection->send("HTTP/1.1 200 OK\r\nConnection: keep-alive\r\nServer: workerman\1.1.4\r\n\r\nhello");
    // 短连接
    //$connection->close("HTTP/1.1 200 OK\r\nServer: workerman\1.1.4\r\n\r\nhello");
};
Worker::runAll();