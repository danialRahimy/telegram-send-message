<?php

$paths = CLASS_DIR . PATH_SEPARATOR;

$paths .= get_include_path();
set_include_path($paths);

class Loader {

    public function load($className)
    {
        require_once $className . ".php";
    }

    public function register()
    {
        spl_autoload_register([$this,"load"]);
    }

}

$loader = new Loader();
$loader->register();