## Laravel Logs To Database

This package provides a custom log for Laravel applications that logs messages to a database table. With this package, you can easily store and query log messages in your application's database.

### Installation

To install the package, simply require it using Composer:
```
composer require bushart/logtodatabase
```
Publish the package configuration file:
```
php artisan vendor:publish --tag=config
```
This will publish the configuration file at:
```
config/logtodatabase.php
```

You can configure which database connection should be used for storing logs:
```
<?php

return [
    'db_connection_name' => env('DB_CONNECTION', 'mysql'),
];
```
Next, you should execute the log:db Artisan command

```
php artisan log:db
```

After the package is installed, you can run the migration to create the logs table in your database:

```
php artisan migrate
```

### Usage

To use the custom log, add it to your config/logging.php file:

```
use bushart\logtodatabase\Log\CustomDatabaseLogger;

'channels' => [
    // ...
      'db' => [
                'driver' => 'custom',
                'via'    => CustomDatabaseLogger::class,
      ],
],
```

Then, you can log messages to the database:

```
use Illuminate\Support\Facades\Log;

Log::channel('db')->info('Your message test',['user_id'=>1]);

Log::channel('db')->error('Your error message',['user_id'=>1]);

Log::channel('db')->warning('Your warning message ',['user_id'=>1]);
```

This will log the message to the logs table in your database.

### Support

If you encounter any issues with this package, please open an issue on the GitHub repository or contact us at busharthussain@gmail.com.

I hope this example description helps you write your own README file! Let me know if you have any other questions.