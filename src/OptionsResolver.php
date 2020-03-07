<?php
/**
 * 凯拓软件 [临渊羡鱼不如退而结网,凯拓与你一同成长]
 * @package topphp-consul
 * @date 2020/3/7 15:57
 * @author sleep <sleep@kaituocn.com>
 */
declare(strict_types=1);

namespace Topphp\TopphpConsul;

final class OptionsResolver
{
    public static function resolve(array $options, array $availableOptions): array
    {
        return array_intersect_key($options, array_flip($availableOptions));
    }
}
