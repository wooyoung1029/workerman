<?php
use Workerman\Worker;
require_once __DIR__ . '/../vendor/workerman/workerman/Autoloader.php';

// 设置当前Worker实例的协议类。
$worker = new Worker('tcp://0.0.0.0:8686');
$worker->protocol = 'Workerman\\Protocols\\Http';

$worker->onMessage = function($connection, $data)
{
    var_dump($_GET, $_POST);
    $connection->send("hello");
};

// 运行worker
Worker::runAll();