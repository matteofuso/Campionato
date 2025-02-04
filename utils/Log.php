<?php

class Log
{
    static function errlog(Exception $e, string $file): void{
        $directory = dirname($file);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        error_log("[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n", '3', $file);
    }

}