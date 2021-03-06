# Laravel Blade Directives
[![Latest Stable Version](https://poser.pugx.org/wilsonpinto/laravel-blade-directives/v/stable.svg)](https://packagist.org/packages/wilsonpinto/laravel-blade-directives)
[![Build Status](https://travis-ci.org/wilsonpinto/laravel-blade-directives.svg?branch=master)](https://travis-ci.org/wilsonpinto/laravel-blade-directives)
[![License](https://poser.pugx.org/wilsonpinto/laravel-blade-directives/license)](https://packagist.org/packages/wilsonpinto/laravel-blade-directives)

This package adds custom directives for the Laravel 5 blade engine.

| Directive                           | Description   			                                                   |
| ----------------------------------- | -------------------------------------------------------------------------- |
| @set($variable, value)              | Creating (declaring) PHP variables                                         |
| @implode($delimiter, $array)        | PHP implode() function                                                     |
| @explode($delimiter, $string)       | PHP explode() function                                                     |
| @var_dump($variable)                | PHP var_dump() function                                                    |
| @dd($variable)                      | Laravel dd() function                                                      |

## Installation

Install the package using Composer.

``` bash
composer require "wilsonpinto/laravel-blade-directives"
```

After updating composer, add the ServiceProvider to the providers array in config/app.php

``` bash
Wilsonpinto\Blade\BladeDirectivesServiceProvider::class
```

Copy the package config to your local config with the publish command:
``` bash
php artisan vendor:publish --provider="Wilsonpinto\Blade\BladeDirectivesServiceProvider"
```
This will add a new configuration file to: config/blade-directives.php.

``` bash
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Directives
    |--------------------------------------------------------------------------
    |
    | custom your our own diresctives using proper handler
    |
    */    	 
    'directives' => [
        'datetime'   => function($expression) {
            return "<?php echo $expression->format('m/d/Y H:i'); ?>";
        },
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude
    |--------------------------------------------------------------------------
    |
    | exclude directives
    |
    */
    'exclude' => []
    
];
```
**Important** - when extending Blade, it's necessary to clear the cached view. Run the following command when you change config/blade-directives.php

```bash
php artisan view:clear
```

## Usage

``` bash
@set($alpha, true)

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel</title>
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-body">
    		@if($alpha)
                <p>Welcome to Laravel!</p>
            @endif
    	</div>
    </div>
</body>
</html>
```

## Contributing
This package is always open to contributions:


* Master will always contain the newest work, however it may not always be stable; use at your own risk.  Every new tagged release will come from the work done on master.


## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.