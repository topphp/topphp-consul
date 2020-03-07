<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 16:53
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul;

final class ConsulResponse
{
    private $headers;
    private $body;
    private $status;

    public function __construct($headers, $body, $status = 200)
    {
        $this->headers = $headers;
        $this->body    = $body;
        $this->status  = $status;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode()
    {
        return $this->status;
    }

    public function json()
    {
        return json_decode($this->body, true);
    }
}
