# Notify for Laravel

A notification system for Laravel.

## Install

Via Composer

``` json
{
    "require": {
        "jeykeu/notify-laravel": "dev"
    }
}
```

## Configure on Laravel 5

Add the following line to the `providers` array in `app/config.php`
````php
JeyKeu\Notify\NotifyServiceProvider::class
````

And the the following line to the `aliases` array in `app/config.php`
````php
'Notify'       => JeyKeu\Notify\Notify::class
````

## License

The MIT License (MIT). Please see [License File](https://github.com/jeykeu/notify/blob/master/LICENSE) for more information.
