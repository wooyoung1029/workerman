<?php
use Workerman\Worker;
require_once __DIR__ . '/../vendor/workerman/workerman/Autoloader.php';

$worker = new Worker('websocket://0.0.0.0:8484');
// 启动8个进程，同时监听8484端口，以websocket协议提供服务
$worker->count = 8;
$worker->onWorkerStart = function($worker)
{
    echo "Worker starting...\n";
};
// 运行worker
Worker::runAll();