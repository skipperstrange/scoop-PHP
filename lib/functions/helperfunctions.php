<?php
function _title(String $title = ''){
    if(trim($title) == ''){
        return APP_NAME;
    }else{
    return APP_NAME.' - '.$title;
    }
}

function _link(String $controller = '', String $view = ''){
   
    $url = '';
    if (isset($controller) && trim($controller) != ''):
        $url .= 'controller=' . $controller;
    endif;
    if ((isset($view) && trim($view) != '') && (isset($controller) && trim($controller) !=
        '')) {
        $url .= '&';
    }
    if (isset($view) && trim($view) != ''):
        $url .= 'view=' . $view;
    endif;

    if(PRETTY_URLS == true){
         $container = explode('&', $url);
        foreach ($container as $value){
                 $parsed = explode('=', $value);
            $params[] =  $parsed[1];
        }
        $url =implode('/', $params);
    }else{
        $url = '?'.$url;
    }
    return  WEB_URL.$url;
}

function redirect_to($controller = null, $view = null)
{
    $url = _link($controller, $view);
    header('location:' . $url);
    exit();
}

function generateRandom($name = null) {
	return sha1(md5($name.time()));
}

function mapObjectValues($object, $array) {
	foreach ($array as $key => $value) {
		$object->$key = $value;
	}
}

function encryptValue($input) {
	return sha1(md5($input));
}

//checks if post or get value is not null
function check_post_get($post_or_get, $key = null, $value = null){
    if(trim($post_or_get) == 'get' || trim($post_or_get) == 'g'){
        if(isset($_GET[$key]) && trim($_GET[$key]) != ''){
            if(trim($value) != ''){
                if(trim($_GET[$key]) == "$value"){
                    return true;
                }
                return false;
            }
                return true;
            }
    }
    if(trim($post_or_get) == 'post' || trim($post_or_get) == 'p'){
        if(isset($_POST[$key]) && trim($_POST[$key]) != ''){
            if(trim($value) != ''){
                if(trim($_POST[$key]) == "$value"){
                    return true;
                }
                return false;
            }
                return true;
            }
    }
    return false;
}

function post_get($post_or_get, $key = null){
    if(check_post_get($post_or_get, $key)){
        if(trim($post_or_get) == 'get' || trim($post_or_get) == 'g'){
                        return $_GET[$key];
        }

        if(trim($post_or_get) == 'post' || trim($post_or_get) == 'p'){
            return$_POST[$key];
            }
        }
        return null;
}


function json_response($message = null, $code = 200, $headers = [''])
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);

    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    if(count($headers) > 0):
        foreach($headers as $header => $value){
            header("$header: $value");
        }
    endif;
    $status = array(
        200 => '200 OK',
        201 => '201 Created',
        204 => '204 No Content',
        205 => 'Reset Content',
        304 => 'Not Modified',
        400 => '400 Bad Request',
        401 => '401 Unauthorized',
        402 => '402 Payment Required',
        403 => '403 Forbidden',
        404 => '404 Not Found',
        405 => '405 Method Not Allowed',
        408 => '408 Request Timeout',
        422 => '422 Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code , // success or not?
        'message' => $message
        ));
}
