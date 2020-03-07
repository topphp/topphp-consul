<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 18:06
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul\consul;

use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpConsul\OptionsResolver;

final class Session
{
    private $client;

    public function __construct(ConsulClient $client)
    {
        $this->client = $client;
    }

    public function create($body = null, array $options = [])
    {
        $params = [
            'body'  => $body,
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->put('/v1/session/create', $params);
    }

    public function destroy($sessionId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->put('/v1/session/destroy/' . $sessionId, $params);
    }

    public function info($sessionId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/session/info/' . $sessionId, $params);
    }

    public function node($node, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/session/node/' . $node, $params);
    }

    public function all(array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/session/list', $params);
    }

    public function renew($sessionId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->put('/v1/session/renew/' . $sessionId, $params);
    }
}
