# Laravel Botanalytics
[![Build Status](https://travis-ci.org/CasperLaiTW/laravel-botanalytics.svg)](https://travis-ci.org/CasperLaiTW/laravel-botanalytics)
[![StyleCI](https://styleci.io/repos/79917842/shield)](https://styleci.io/repos/79917842)

A Botanalytics Wrapper for Laravel

[Botanalytics](https://botanalytics.co/) is a bot analytics service, improves Human-to-Bot interaction.

## Install
### Composer
To get the latest version
```shell
composer require casperlaitw/laravel-botanalytics
```

### Add Provider
Include the provider within `config/app.php`
```php
'providers' => [
    ...
    Casperlaitw\LaravelBotanalytics\BotanalyticsServiceProvider::class,
    ...
]
```

### Publish Configuration
```shell
php artisan vendor:publish --provider=Casperlaitw\LaravelBotanalytics\BotanalyticsServiceProvider --tag=config
```
## Config
### Set Botanalytics Token
Add your botanalytics token to `.env`
```
BOTANALYTICS_TOKEN=botanalytics-token
```

## Usage

### Incoming Message

```php
<?php
namespace App;

use Casperlaitw\LaravelBotanalytics\BotanalyticsFacade;
use Closure;

class BotAnalyticsMiddleware
{
    /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            $body = $request->all();
            if (array_get($body, 'object') === 'page') {
                BotanalyticsFacade::facebook()->request([
                    'recipient' => null,
                    'message' => $body,
                ]);
            }
    
            return $next($request);
        }
}

```

### Out-going Message
```php
<?php
namespace App;

use Casperlaitw\LaravelBotanalytics\BotanalyticsFacade;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function request(Request $request)
    {
        $message = [
            'recipient' => [
                'id' => 'Sender ID',    
            ],
            'message' => [
                'text' => 'hello, world!',    
            ],
        ];
        
        // response $message to Facebook
        
        // Send to botanalytics
        BotanalyticsFacade::facebook()->request([
            'recipient' => array_get($message, 'recipient.id'),
            'message' => array_get($message, 'message'),
        ]);
    }
}

```

## License
This package is licensed under the [MIT license](https://github.com/CasperLaiTW/laravel-botanalytics/blob/master/LICENSE).