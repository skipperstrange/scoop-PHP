<?php

if (!defined('DS')) {
    define('DS', '/');
  }

if ( ! file_exists($file = __DIR__.'/vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}
include_once "vendor/autoload.php";

if(MODE == 'development'){
    ini_set('display_errors',1);
}else{
    ini_set('display_errors',0);
}

$pageTitle = '';


if(PRETTY_URLS == true){

    // Load routes from config/routes.php
     $routes = ROUTES;  
     
     // holds the named captures, $_POST data
     $params = parse_params();
 

     //Process The query string to be suite route search parameters
    $url =  $_SERVER['REQUEST_URI'];
        // Removes Apllication root from url
    $url = str_replace('/' . APP . '/', '', $url);
    
    // Removes query string from $url we don't need it anymore affect routes.
     $url = @str_replace('?' . $_SERVER['QUERY_STRING'], '', $url);

   //  becomes true if $route['url'] matches $url
    $route_match = false;

    // loops over $routes looking for a match
    for ($i = 0; $i < count($routes); $i++) {
    $route = $routes[$i];
    // if match found appends $matches to $params
    // sets $route_match to true and also exits loop.

        if (preg_match($route['url'], $url, $matches)) {
            
            $params = array_merge($params, $matches);

            // Sets controller and view components once match is found
            $view = $route['view'];
            $controller = $route['controller'];
            $_GET = array_merge($_GET, $params);
            $route_match = true;
            break;
        }

        if(!$route_match) {
            $view = '404';$controller = '';
        }
    }
}else{
    //resort to the conventional query strin method of accessing parsed get data. i. e. (?controller=index&view=index...)
    $controller = @$_GET['controller'] ? @$_GET['controller']: 'index' ;
    if(MVC_MODE == 'strict'){
        $view = @$_GET['view'] ? @$_GET['view']: $controller ;
    }else{
        $view = $_GET['view'] ? @$_GET['view']: 'index' ;
    }
}


if(file_exists(CONTROLLERS.$controller.'.php')){
    include_once CONTROLLERS.$controller.'.php';
}else{
//    die("$controller.php not found. Please make sure controller exists.");
}

@include_once VIEWS.'layouts'.DS.'layout.php';
