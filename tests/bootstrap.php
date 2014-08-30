<?php 

if ( ! is_file($vendorLoader = __DIR__.'/../vendor/autoload.php')) {
    spl_autoload_register(function($class){
        $class = ltrim($class, '\\');
        if (0 === stripos($class, 'Ahc')){
            $path =  dirname(__DIR__) . DIRECTORY_SEPARATOR;
            $path .= 0 === stripos($class, 'Ahc\\Tests') ? 'tests' : 'lib';
            $path .= DIRECTORY_SEPARATOR;

            require_once $path . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            return true;
        }
    });

    return;
}

$loader = require_once $vendorLoader;
$loader->add('Ahc\\Tests', __DIR__);
