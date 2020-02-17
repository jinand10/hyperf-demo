<?php

declare(strict_types=1);

namespace App\Consumer\AsyncQueue;

use Hyperf\AsyncQueue\Job;
use GuzzleHttp\Client;

class RequestServerConsumer extends Job
{
    public $params;

    public function __construct($params)
    {
        // 这里最好是普通数据，不要使用携带 IO 的对象，比如 PDO 对象
        $this->params = $params;
    }

    /**
     * 异步队列消费者回调
     *
     * @author Jin<jinand10@163.com> 2020-01-10
     * @return void
     */
    public function handle()
    {
        $post = [
            'json' => $this->params['data']
        ];
        /**
         * 发送请求
         */
        $url = $this->params['url'].'?time='.$this->params['time'].'&sign='.$this->params['sign'];
        $response = (new Client())->request('POST', $url, $post, ['timeout' => 5]);
        if ($response->getStatusCode() != 200) {
            logger()->error('请求游戏服务端响应失败', ['res_code' => $response->getStatusCode()]);
        } 
        logger()->info('请求游戏服务端响应成功', ['params' => $this->params, 'res' => $response->getBody()->getContents()]);
    }
}
