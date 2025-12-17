<?php

namespace bushart\logtodatabase\Log;

use bushart\logtodatabase\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Yoeriboven\LaravelLogDb\Models\LogMessage;


class LogHandler extends AbstractProcessingHandler
{
    /**
     * Write log record to database.
     */
    protected function write($record): void
    {
        // Support Monolog v2 & v3
        if ($record instanceof LogRecord) {
            $message   = $record->message;
            $level     = $record->level->value;
            $levelName = $record->level->name;
            $context   = $record->context;
        } else {
            $message   = $record['message'] ?? null;
            $level     = $record['level'] ?? null;
            $levelName = $record['level_name'] ?? null;
            $context   = $record['context'] ?? [];
        }

        Log::on(
            config('logtodatabase.db_connection_name', 'mysql')
        )->create([
            'message'     => $message,
            'level'       => $level,
            'level_name'  => $levelName,
            'user_id'     => auth()->id(),
            'context'     => json_encode($context),
        ]);
    }
}
