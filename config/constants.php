<?php
//This is the first config file that runs.

//determines if requests are async or javascript triggered
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

// This function must be availible
function is_secure_connection(){
    $secure_connection = 0;    
    if(isset($_SERVER['HTTPS'])){        
        $secure_connection = 1;        
        if ($_SERVER["HTTPS"] == "on"){
               return $secure_connection;
            }else{
                $secure_connection = 0;
            }
        return $secure_connection;
    }
    return $secure_connection;
}

define('UP_ONE', '../');
define('VERSION', '1.0');


define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . DS);
define('APP', basename(dirname(dirname(__FILE__))));

if (($_SERVER['SERVER_PORT']) === 80 || ($_SERVER['SERVER_PORT']) === 443) {

define('PORT', ':'.$_SERVER['SERVER_PORT']);
} else {
	define('PORT', '');
}

//if (is_secure_connection() == 0):
//define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST']).DS;
//define('WEB_URL', 'http://'.$_SERVER['SERVER_NAME'].PORT.DS);
// elseif (is_secure_connection() == 1):
    
define('BASE_URL', @$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].DS);
if(MODE === 'development'){
    define('WEB_URL', @$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].DS.APP.PORT.DS);
}else{
    define('WEB_URL', @$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].PORT.DS);
}
//endif;

define('LIB', 'lib' . DS);
define('STATIC_DATA', 'static'.DS);
define('RESOURCES', 'resources'.DS);
define('CONFIG_PATH','config'.DS);
define('PUBLIC_PATH', 'public'.DS);
define('FILE_UPLOADS_PATH', 'public'.DS.'uploads'.DS);

//MVC PATHS
define('CONTROLLERS', 'Controllers' . DS);
define('VIEWS', 'Views' . DS);
define('PARTIALS', VIEWS. 'partials' . DS);
define('LAYOUTS', VIEWS.DS.'layouts'.DS);

//ResourcesURL
define('VENDOR_PATH', WEB_URL . 'public' . DS . 'vendor' . DS);
define('CSS_PATH', WEB_URL . 'public' . DS . 'css' . DS);
define('JS_PATH', WEB_URL . 'public' . DS . 'js' . DS);
define('IMAGES_URL', WEB_URL . 'public' . DS . 'images' . DS);
define('FONT_URL', WEB_URL . 'public' . DS . 'fonts' . DS);
