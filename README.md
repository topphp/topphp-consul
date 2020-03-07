# topphp-consul

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

# 安装组件
```shell
# 运行以下命令
$ composer require topphp/topphp-consul
```
# 单元测试
```shell
composer test
``` 

#### 注意
> 交互输入必须使用英文半角输入法,否则会出现字符确实.

现代的PHP组件都使用语义版本方案(http://semver.org), 版本号由三个点(.)分数字组成(例如:1.13.2).第一个数字是主版本号,如果PHP组件更新破坏了向后兼容性,会提升主版本号.
第二个数字是次版本号,如果PHP组件小幅更新了功能,而且没有破坏向后兼容性,会提升次版本号.
第三个数字(即最后一个数字)是修订版本号,如果PHP组件修正了向后兼容的缺陷,会提升修订版本号.

## Structure
> 组件结构

```
bin/        
build/
docs/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer create-project topphp/topphp-consul 你的组件名称
```

## Usage

``` php
$skeleton = new topphp\componentBuilder();
echo $skeleton->echoPhrase('Hello, TOPPHP!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sleep@kaituocn.com instead of using the issue tracker.

## Credits

- [topphp][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/topphp/topphp-consul.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/topphp/topphp-consul/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/topphp/topphp-consul.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/topphp/topphp-consul.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/topphp/topphp-consul.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/topphp/topphp-consul
[link-travis]: https://travis-ci.org/topphp/topphp-consul
[link-scrutinizer]: https://scrutinizer-ci.com/g/topphp/topphp-consul/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/topphp/topphp-consul
[link-downloads]: https://packagist.org/packages/topphp/topphp-consul
[link-author]: https://github.com/topphp
[link-contributors]: ../../contributors
