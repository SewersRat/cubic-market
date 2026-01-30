<?php

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {

            $paths = [
                __DIR__ . '/' . $class . '.php',
                __DIR__ . '/../repositories/' . $class . '.php'
            ];

            foreach ($paths as $file) {
                if (file_exists($file)) {
                    require $file;
                    return;
                }
            }
        });
    }
}
