<?php

namespace Dan\Core\Support\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * Class Loggable
 *
 * @package Dan\Core\Support\Traits
 * @author Dan Richards <danrichardsri@gmail.com>
 */
trait Loggable
{
    /**
     * Log
     *
     * @param $message
     * @param bool $extra
     */
    protected function log($message, $extra = false)
    {
        if (config('app.debug')) {
            DB::enableQueryLog();
            $memoryUsage = number_format(memory_get_usage()/1024/1024, 2)." MB";
            $extraMsg = $extra ? " ($extra)" : "";
            Log::info(get_class($this)."{$extraMsg}: {$message} ~ using {$memoryUsage} of memory.");
        }
    }
}