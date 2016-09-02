<?php
require __DIR__.'/../vendor/autoload.php';
spl_autoload_register(function ($class) {
    if ($class) {
        $file = str_replace('\\', '/', $class);

        $file .= '.php';

        if (file_exists($file)) {
            include "$file";
        }
    }
});