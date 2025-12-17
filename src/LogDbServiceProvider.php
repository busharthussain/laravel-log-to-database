<?php

namespace bushart\logtodatabase;
use Illuminate\Support\ServiceProvider;
use bushart\logtodatabase\logtodatabase\Commands\MainCommand;
use bushart\logtodatabase\logtodatabase\Commands\ModelCommand;

class LogDbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->commands([
            MainCommand::class,
            ModelCommand::class,
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../src/config/logtodatabase.php',
            'logtodatabase'
        );
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/migration/022_11_24_110854_create_logs_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_logs_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config/logtodatabase.php' => config_path('logtodatabase.php'),
        ], 'config');

    }
}
