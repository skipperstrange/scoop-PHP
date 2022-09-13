<?php
//determines if requests are async or javascript triggered
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');


//This is the first config file that runs.
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
define('APP', basename(dirname(dirname(dirname(__FILE__)))));

if ($_SERVER['SERVER_PORT'] !== 80) {
	define('PORT', ':'.$_SERVER['SERVER_PORT']);
} else {
	define('PORT', '');
}

/*
if (is_secure_connection() == 0):
        define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST']).DS.APP.DS;
        define('WEB_URL', 'http://'.$_SERVER['SERVER_NAME'].PORT.DS.APP.DS);

 elseif (is_secure_connection() == 1):
        define('BASE_URL', 'https://'.$_SERVER['HTTP_HOST'].DS.APP.DS);
        define('WEB_URL', 'https://'.$_SERVER['SERVER_NAME'].PORT.DS.APP.DS);
endif;
*/
if(MODE == 'development'):
    define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].DS.APP.DS);
    define('WEB_URL', 'http://'.$_SERVER['SERVER_NAME'].PORT.DS.APP.DS);  
else:
    define('BASE_URL', $_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.$_SERVER['HTTP_HOST'].DS);
    define('WEB_URL', $_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.$_SERVER['HTTP_HOST'].DS);
endif;

define('LIB', 'lib' . DS);
define('CONFIG_PATH','config'.DS);
define('PUBLIC_PATH', 'public'.DS);
define('FILE_UPLOADS_PATH', 'public'.DS.'uploads'.DS);

//MVC PATHS
define('CONTROLLERS', 'Controllers' . DS);
define('VIEWS', 'Views' . DS);
define('SHARED', VIEWS. 'shared' . DS);
define('LAYOUTS', VIEWS.DS.'layouts'.DS);

//ResourcesURL
define('CSS_PATH',  WEB_URL.'public' . DS . 'css' . DS);
define('JS_PATH',  WEB_URL.'public' . DS . 'js' . DS);
define('FONT_URL', WEB_URL.'public' . DS . 'fonts' . DS);