# storage-zendframework

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Storage adapters that make use of Zend Framework.

## Install

Via Composer

``` bash
$ composer require phpab/storage-zendframework
```

## Usage

``` php
$container = new \Zend\Session\Container();
$adapter = new \PhpAb\Storage\Adapter\ZendSeession($container);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please open an issue in the issue tracker.
We realize this is not ideal but it's the fastest way to get the issue solved.

## Credits

- [Walter Tamboer](https://github.com/waltertamboer)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/phpab/storage-zendframework.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phpab/storage-zendframework/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/phpab/storage-zendframework.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/phpab/storage-zendframework.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phpab/storage-zendframework.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phpab/storage-zendframework
[link-travis]: https://travis-ci.org/phpab/storage-zendframework
[link-scrutinizer]: https://scrutinizer-ci.com/g/phpab/storage-zendframework/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/phpab/storage-zendframework
[link-downloads]: https://packagist.org/packages/phpab/storage-zendframework
[link-contributors]: ../../contributors
