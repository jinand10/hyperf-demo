<?php

declare(strict_types=1);

namespace App\Kernel\Http;

use App\Constants\ApiCode;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;

/**
 * Class Response
 * @author jin <jinand10@163.com>
 */
class Response
{
    /**
     * @Inject
     * @var ResponseInterface
     */
    protected $response;

    public function apiErrorFormat(int $code, string $msg = ''): array
    {
        return [
            'code' => $code,
            'msg' => $msg,
        ];
    }

    public function apiSuccessFormat($data = []): array
    {
        return [
            'code' => ApiCode::SUCCESS,
            'msg' =>  ApiCode::getMessage(ApiCode::SUCCESS),
            'data' => $data ?: new \stdClass(),
        ];
    }

    public function success($data = [])
    {
        return $this->response->json($this->apiSuccessFormat($data));
    }

    public function fail(int $code, string $msg = '')
    {
        return $this->response->json($this->apiErrorFormat($code, $msg));
    }
}
