<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 17:49
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul\consul;

use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpConsul\OptionsResolver;

final class Health
{
    private $client;

    public function __construct(ConsulClient $client)
    {
        $this->client = $client;
    }

    public function node($node, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/health/node/' . $node, $params);
    }

    public function checks($service, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/health/checks/' . $service, $params);
    }

    public function service($service, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc', 'tag', 'passing']),
        ];
        return $this->client->get('/v1/health/service/' . $service, $params);
    }

    public function state($state, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];
        return $this->client->get('/v1/health/state/' . $state, $params);
    }
}
