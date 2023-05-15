<?php

namespace bushart\logtodatabase\Log;
use bushart\logtodatabase\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Yoeriboven\LaravelLogDb\Models\LogMessage;


class LogHandler extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        Log::create([
            'message' => $record['message'],
            'level' => $record['level'],
            'level_name' => !empty($record['level_name']) ? $record['level_name'] : null,
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'context' => json_encode($record['context']),
        ]);
    }

}