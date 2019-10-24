Laravel PostcodeNL API package
==============
[![Latest Stable Version](https://poser.pugx.org/deniztezcan/laravel-postcodenl-api/v/stable)](https://packagist.org/packages/deniztezcan/laravel-postcodenl-api)
[![Total Downloads](https://poser.pugx.org/deniztezcan/laravel-postcodenl-api/downloads)](https://packagist.org/packages/deniztezcan/laravel-postcodenl-api)
[![Latest Unstable Version](https://poser.pugx.org/deniztezcan/laravel-postcodenl-api/v/unstable)](https://packagist.org/packages/deniztezcan/laravel-postcodenl-api)
[![License](https://poser.pugx.org/deniztezcan/laravel-postcodenl-api/license)](https://packagist.org/packages/deniztezcan/laravel-postcodenl-api)
[![StyleCI](https://github.styleci.io/repos/212767317/shield?branch=master)](https://github.styleci.io/repos/212767317/shield?branch=master)

Intergrates the PostcodeNL API with Laravel 5 & 6 via a ServiceProvider and Facade. This package currently supports only the validation of dutch addresses.

### Instalation
```
composer require deniztezcan/laravel-postcodenl-api
```

Add a ServiceProvider to your providers array in `config/app.php`:
```php
    'providers' => [
    	//other things here

    	DenizTezcan\LaravelPostcodeNLAPI\PostcodeNLAPIServiceProvider::class,
    ];
```

Add the facade to the facades array:
```php
    'aliases' => [
    	//other things here

    	'PostcodeNLAPI' => DenizTezcan\LaravelPostcodeNLAPI\Facades\PostcodeNLAPI::class,
    ];
```

Finally, publish the configuration files:
```
php artisan vendor:publish --provider="DenizTezcan\LaravelPostcodeNLAPI\PostcodeNLAPIServiceProvider"
```

### Configuration
Please set your API: `key` and `secret` in the `config/postcodenlapi.php`

### Usage
To get the `street` and `city` linked to a Dutch `postalcode`, `housenr` and `extension`. The response is returned in json format, ideal for ajax.
```php
use PostcodeNLAPI;

$data = PostcodeNLAPI::validateDutch('1010AA', '1', 'a');

```
