<?php

namespace app\controller;

use app\BaseController;

class Cron extends BaseController
{
    public function index()
    {
        // 执行workerman脚本，防止进程被杀死
        $command = "php " . root_path() . DIRECTORY_SEPARATOR . 'think cron start -d > /dev/null 2>&1 &';
        exec($command);
        return 'success';
    }

    public function stop()
    {
        // 在.env中添加STOP=true，支持停止服务
        $isStop = env("CRON_STOP", false);
        if ($isStop) {
            // 执行workerman脚本，防止进程被杀死
            $command = "php " . root_path() . DIRECTORY_SEPARATOR . 'think cron stop > /dev/null 2>&1 &';
            exec($command);
        }
        return 'success';
    }
}