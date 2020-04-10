<?php

// includes common/basic functions
require_once 'Common.php';

// enables error reporting if config['dev'] is true in Config.php
if (!empty($config['dev'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

session_start();

/*
 * Routing
 */

// gets full url, e.g. https://website.com/controller/method/param/
$full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// removes trailing slash
$full_url = rtrim($full_url, '/');

// cuts website url and leaves us with controller, method and params
$route = str_replace($config['host'], '', $full_url);

// if it doesn't match allowed characters, returns default route
if (!preg_match('/^[\/a-z0-9_-]+$/i', $route)) {
    $route = $config['route']['default'];
}

// returns array as in: 0 => controller class, 1 => method, 2 and more => params
$explode = explode('/', $route);

// redirect home if controller is undefined
if (empty($explode[0])) {
    redirect();
}

/*
 * Autoloader
 */

/*spl_autoload_register(function ($class) {
    if (file_exists(APP_PATH . 'Controllers/' . $class . '.php')) {
        die($class);
        require_once APP_PATH . 'Controllers/' . $class . '.php';
    } elseif (file_exists(APP_PATH . 'Models/' . $class . '.php')) {
        require_once APP_PATH . 'Models/' . $class . '.php';
    } elseif (file_exists(SYSTEM_PATH . $class . '.php')) {
        require_once SYSTEM_PATH . $class . '.php';
    } else {
        die("class $class not found");
    }
});*/


spl_autoload_register(function ($class) {
    $class = lcfirst($class);
    $class = str_replace('\\', '/', $class);

    if (file_exists(ROOT_PATH . $class . '.php')) {
        include ROOT_PATH . $class . '.php';
    } else {
        die("$class does not exist");
    }
});

// create object and unset explode[0]
$app_path = rtrim(APP_PATH, '/');
$app = substr($app_path, strrpos($app_path, '/' )+1);

$class_name = "\\$app\\Controllers\\" . ucfirst($explode[0]);
$object = new $class_name;
unset($explode[0]);

// check if method name is set (explode[1])
// default it to 'index' if it's not
// redirect home if method doesn't exist
$method = !empty($explode[1]) ? $explode[1] : 'index';
if (!method_exists($object, $method)) {
    die('Method ' . $class_name . '/' . $method . ' does not exist');
}
unset($explode[1]);


/*
 * Loading
 */
call_user_func_array([$object, $method], array_values($explode));