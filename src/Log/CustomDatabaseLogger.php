<?php

namespace bushart\logtodatabase\Log;
use Monolog\Logger;


class CustomDatabaseLogger
{
    public function __invoke(array $config)
    {
        return new Logger('Database', [
            new LogHandler(),
        ]);
    }
}