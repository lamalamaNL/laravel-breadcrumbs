# Laravel Breadcrumbs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lamalama/laravel-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/lamalama/laravel-breadcrumbs)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://github.styleci.io/repos/268217938/shield?branch=master)](https://github.styleci.io/repos/268217938)
[![Total Downloads](https://img.shields.io/packagist/dt/lamalama/laravel-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/lamalama/laravel-breadcrumbs)

> :warning: **This package is in a preliminary development phase and not stable**: Do not use in production!

Create SEO proof breadcrumbs.

## Install

Via Composer

``` bash
$ composer require lamalama/laravel-breadcrumbs
```

You can optionally publish the config file with:
```bash
php artisan vendor:publish --provider="LamaLama\Breadcrumbs\BreadcrumbsServiceProvider" --tag="config"
```

## Use

You can use the custom ```@breadcrumbs``` blade directive

```php
@breadcrumbs
```

```html
<ol itemscope itemtype="https://schema.org/BreadcrumbList">
  <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
    <a itemprop="item" href="https://lamalama.nl/work">
        <span itemprop="name">Work</span></a>
    <meta itemprop="position" content="1" />
  </li>
  ›
  <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
    <a itemscope itemtype="https://schema.org/WebPage"
       itemprop="item" itemid="https://lamalama.nl/work/commerce"
       href="https://lamalama.nl/work/commerce">
      <span itemprop="name">Commerce</span></a>
    <meta itemprop="position" content="2" />
  </li>
  ›
  <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
    <span itemprop="name">Sneaker District</span>
    <meta itemprop="position" content="3" />
  </li>
</ol>
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Mark de Vries](https://github.com/lamalamaMark)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
