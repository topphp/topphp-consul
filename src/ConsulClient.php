<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * Project: topphp-consul
 * Date: 2020/2/9 21:45
 * Author: sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul;

use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Topphp\TopphpClient\guzzle\HttpHelper;

class ConsulClient
{
    /**
     * @var string
     */
    private $uri;

    public function __construct()
    {
        $this->uri = config('consul.uri') ?? '127.0.0.1:8500';
    }

    public function get($url, $data = []): ConsulResponse
    {
        $response = HttpHelper::handler()->get($this->uri . $url, $data);
        return $this->getResponse($response);
    }

    public function post($url, array $data = []): ConsulResponse
    {
        $response = HttpHelper::handler()->post($this->uri . $url, $data);
        return $this->getResponse($response);
    }

    public function put($url, array $data = []): ConsulResponse
    {
        $response = HttpHelper::handler()->put($this->uri . $url, $data);
        return $this->getResponse($response);
    }

    public function delete($url, array $data = []): ConsulResponse
    {
        $response = HttpHelper::handler()->delete($this->uri . $url, $data);
        return $this->getResponse($response);
    }

    private function getResponse(ResponseInterface $response): ConsulResponse
    {
        if (!$response) {
            throw new RuntimeException('response is fail');
        }
        if ($response->getStatusCode() >= 400) {
            throw new RuntimeException($response->getReasonPhrase(), $response->getStatusCode());
        }
        return new ConsulResponse(
            $response->getHeaders(),
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }
}
