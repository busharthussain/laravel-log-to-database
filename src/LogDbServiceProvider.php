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
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {



    }
}
