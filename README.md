# Trigger your Netlify build hooks with ease

[![Latest Version on Packagist](https://img.shields.io/packagist/v/developmint/netlify-build-hook.svg?style=flat-square)](https://packagist.org/packages/developmint/netlify-build-hook)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Developmint/netlify-build-hook/master.svg?style=flat-square)](https://travis-ci.org/Developmint/netlify-build-hook)
[![Quality Score](https://img.shields.io/scrutinizer/g/developmint/netlify-build-hook.svg?style=flat-square)](https://scrutinizer-ci.com/g/developmint/netlify-build-hook)
[![Total Downloads](https://img.shields.io/packagist/dt/developmint/netlify-build-hook.svg?style=flat-square)](https://packagist.org/packages/developmint/netlify-build-hook)

This package provides a lightweight class to trigger your [Netlify build hooks](https://www.netlify.com/docs/webhooks/#incoming-webhooks)
properly.


## Installation

You can install the package via composer:

``` bash
composer require developmint/netlify-build-hook
```

## Usage

You must pass the following things to the constructor of `Developmint\NetlifyBuildHook\NetlifyBuildHook`.

* A Guzzle client
* The unique Identifier of you build hook (the last part of the build hook URL).

The last two arguments are optional:

* A custom title shown on Netlify
* Another branch the deploy should use

``` php
$client = new \GuzzleHttp\Client();
$id = 'XXX'
$hook = new \Developmint\NetlifyBuildHook\NetlifyBuildHook($client, $id);

// Alternatively

// With title
$hook = new \Developmint\NetlifyBuildHook\NetlifyBuildHook($client, $id, 'My custom title');

// With branch
$hook = new \Developmint\NetlifyBuildHook\NetlifyBuildHook($client, $id, null, 'other-branch');

// With everything
$hook = new \Developmint\NetlifyBuildHook\NetlifyBuildHook($client, $id, 'My custom title', 'branch-name');
```

### Get stats for a package of your choice

Trigger the hook with the corresponding `trigger`function of your class instance (from above).
If a problem occurs, a `RequestException` will be thrown.

``` php
$hook->trigger();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

Testing wasn't entirely possible as mocking the hooks doesn't help anyone and test hooks are not available.

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@developmint.de instead of using the issue tracker.

## Credits

- [Alexander Lichter](https://github.com/manniL)
- [All Contributors](../../contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
