# Laravel UK towns.

![Packagist License](https://img.shields.io/packagist/l/yaroslawww/yaroslawww/laravel-uk-towns?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/yaroslawww/laravel-uk-towns)](https://packagist.org/packages/yaroslawww/yaroslawww/laravel-uk-towns)
[![Total Downloads](https://img.shields.io/packagist/dt/yaroslawww/yaroslawww/laravel-uk-towns)](https://packagist.org/packages/yaroslawww/yaroslawww/laravel-uk-towns)
[![Build Status](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/badges/build.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-uk-towns/?branch=master)

Import UK towns list and use town model.

## Installation

Install the package via composer:

```bash
composer require yaroslawww/laravel-uk-towns
```

Optionally you can publish the config file with:

```bash
php artisan vendor:publish --provider="UKTowns\ServiceProvider" --tag="config"
```

## Usage

### Import table

```shell
php artisan uk-towns:import
```


## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/) 
