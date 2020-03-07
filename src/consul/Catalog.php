<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 16:59
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul\consul;

use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpConsul\OptionsResolver;

final class Catalog
{
    private $client;

    public function __construct(ConsulClient $client)
    {
        $this->client = $client;
    }

    public function register($node)
    {
        $params = [
            'body' => (string)$node,
        ];
        return $this->client->get('/v1/catalog/register', $params);
    }

    public function deregister($node)
    {
        $params = [
            'body' => (string)$node,
        ];
        return $this->client->get('/v1/catalog/deregister', $params);
    }

    public function datacenters()
    {
        return $this->client->get('/v1/catalog/datacenters');
    }

    public function nodes(array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/catalog/nodes', $params);
    }

    public function node($node, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/catalog/node/' . $node, $params);
    }

    public function services(array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/catalog/services', $params);
    }

    public function service($service, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc', 'tag']),
        ];
        return $this->client->get('/v1/catalog/service/' . $service, $params);
    }
}
