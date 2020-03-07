<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 17:51
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul\consul;

use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpConsul\OptionsResolver;

final class KV
{
    private $client;

    public function __construct(ConsulClient $client)
    {
        $this->client = $client;
    }

    public function get($key, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, [
                'dc',
                'recurse',
                'keys',
                'separator',
                'raw'
            ]),
        ];
        return $this->client->get('v1/kv/' . $key, $params);
    }

    public function put($key, $value, array $options = [])
    {
        $params = [
            'body'  => $value,
            'query' => OptionsResolver::resolve($options, [
                'dc',
                'flags',
                'cas',
                'acquire',
                'release'
            ]),
        ];
        return $this->client->put('v1/kv/' . $key, $params);
    }

    public function delete($key, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc', 'recurse']),
        ];
        return $this->client->delete('v1/kv/' . $key, $params);
    }
}
