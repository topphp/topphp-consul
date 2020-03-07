<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 15:13
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul\consul;

use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpConsul\ConsulResponse;
use Topphp\TopphpConsul\OptionsResolver;

final class Agent
{
    private $client;

    public function __construct(ConsulClient $client)
    {
        $this->client = $client;
    }

    public function checks()
    {
        return $this->client->get('/v1/agent/checks');
    }

    public function services()
    {
        return $this->client->get('/v1/agent/services');
    }

    public function members(array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['wan']),
        ];
        return $this->client->get('/v1/agent/members', $params);
    }

    public function self()
    {
        return $this->client->get('/v1/agent/self');
    }

    public function join($address, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['wan']),
        ];
        return $this->client->get('/v1/agent/join/' . $address, $params);
    }

    public function forceLeave($node)
    {
        return $this->client->get('/v1/agent/force-leave/' . $node);
    }

    public function registerCheck($check)
    {
        $params = [
            'body' => $check,
        ];
        return $this->client->put('/v1/agent/check/register', $params);
    }

    public function deregisterCheck($checkId)
    {
        return $this->client->put('/v1/agent/check/deregister/' . $checkId);
    }

    public function passCheck($checkId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['note']),
        ];
        return $this->client->put('/v1/agent/check/pass/' . $checkId, $params);
    }

    public function warnCheck($checkId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['note']),
        ];
        return $this->client->put('/v1/agent/check/warn/' . $checkId, $params);
    }

    public function failCheck($checkId, array $options = [])
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['note']),
        ];
        return $this->client->put('/v1/agent/check/fail/' . $checkId, $params);
    }

    public function registerService($service)
    {
        $params = [
            'body' => $service,
        ];
        return $this->client->put('/v1/agent/service/register', $params);
    }

    public function deregisterService($serviceId)
    {
        return $this->client->put('/v1/agent/service/deregister/' . $serviceId);
    }
}
