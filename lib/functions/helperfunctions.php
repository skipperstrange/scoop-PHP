<?php

/**
 * Generates the page title by appending the given title to the application name
 *
 * @param string $title The title to append (optional)
 * @return string The generated page title
 */
function _title($title = '') {
    if (trim($title) == '') {
        return APP_NAME;
    } else {
        return APP_NAME . ' - ' . $title;
    }
}

/**
 * Generates the meta tag content by appending the given title to the application name
 *
 * @param string $title The title to append (optional)
 * @return string The generated meta tag content
 */
function _meta($title = '') {
    if (trim($title) == '') {
        return APP_NAME;
    } else {
        return APP_NAME . ' - ' . $title;
    }
}

/**
 * Generates a URL based on the provided controller and view parameters
 *
 * @param string $controller The controller parameter (optional)
 * @param string $view The view parameter (optional)
 * @return string The generated URL
 */
function _link(String $controller = '', String $view = '') {
    $url = '';

    if (isset($controller) && trim($controller) != '') {
        $url .= 'controller=' . $controller;
    }

    if ((isset($view) && trim($view) != '') && (isset($controller) && trim($controller) != '')) {
        $url .= '&';
    }

    if (isset($view) && trim($view) != '') {
        $url .= 'view=' . $view;
    }

    if (PRETTY_URLS == true) {
        $container = explode('&', $url);
        $params = [];

        foreach ($container as $value) {
            $parsed = explode('=', $value);
            $params[] =  $parsed[1];
        }

        $params = array_unique($params);
        $url = implode('/', $params);
    } else {
        $url = '?' . $url;
    }
    return WEB_URL . $url;
}

/**
 * Generates a URL based on the provided route name
 *
 * @param string $name The route name
 * @param array $args Additional arguments (optional)
 * @return string|false The generated URL or false if the route name is not found
 */
function _link_by_name($name, $args = []) {
    if (isset($name) && trim($name) !== '') {
        $route = null;
        $routes = ROUTES;

        foreach ($routes as $index => $value) {
            if (strtolower($routes[$index]['name']) == strtolower($name)) {
                $route = $routes[$index];
                break;
            }
        }

        if ($route != null) {
            return _link($route['controller'], $route['view']);
        }
    }
    return false;
}

/**
 * Redirects to a specific controller and view
 *
 * @param string|null $controller The controller parameter (optional)
 * @param string|null $view The view parameter (optional)
 * @return void
 */
function redirect_to($controller = null, $view = null) {
    $url = _link($controller, $view);
    header('location:' . $url);
    exit();
}

/**
 * Generates a random string by hashing the given name and timestamp
 *
 * @param string|null $name The name to hash (optional)
 * @return string The generated random string
 */
function generateRandom($name = null) {
    return sha1(md5($name . time()));
}

/**
 * Assigns values from an array to an object
 *
 * @param object $object The object to assign values to
 * @param array $array The array containing values to assign
 * @return void
 */
function mapObjectValues($object, $array) {
    foreach ($array as $key => $value) {
        $object->$key = $value;
    }
}

/**
 * Encrypts the given value by hashing it
 *
 * @param mixed $input The value to encrypt
 * @return string The encrypted value
 */
function encryptValue($input) {
    return sha1(md5($input));
}

/**
 * Checks if a POST or GET value is not null
 *
 * @param string $post_or_get The type of request (post/get)
 * @param string|null $key The key to check (optional)
 * @param string|null $value The value to compare (optional)
 * @return bool True if the value is not null, false otherwise
 */
function check_post_get($post_or_get, $key = null, $value = '') {
    if (trim($post_or_get) == 'post' || trim($post_or_get) == 'p') {
        if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
            if (trim($value) != '') {
                if (trim($_POST[$key]) == "$value") {
                    return true;
                }
                return false;
            }
            return true;
        }
    }elseif (trim($post_or_get) == 'get' || trim($post_or_get) == 'g') {
        if (isset($_GET[$key]) && trim($_GET[$key]) != '') {
            if (trim($value) != '') {
                if (trim($_GET[$key]) == "$value") {
                    return true;
                }
                return false;
            }
            return true;
        }
    }
    return false;
}

/**
 * Retrieves a value from either the POST or GET array
 *
 * @param string $post_or_get The type of request (post/get)
 * @param string|null $key The key to retrieve (optional)
 * @return mixed|null The retrieved value or null if not found
 */
function post_get($post_or_get, $key = null) {
    if (check_post_get($post_or_get, $key)) {
        if (trim($post_or_get) == 'get' || trim($post_or_get) == 'g') {
            return $_GET[$key];
        }

        if (trim($post_or_get) == 'post' || trim($post_or_get) == 'p') {
            return $_POST[$key];
        }
    }
    return null;
}

/**
 * Generates a JSON response
 *
 * @param mixed|null $message The response message (optional)
 * @param int $code The response code (default: 200)
 * @param array $headers Additional headers (default: empty array)
 * @return string The encoded JSON response
 */
function json_response($message = null, $code = 200, $headers = ['']) {
    // Clear the old headers
    header_remove();
    // Set the actual code
    http_response_code($code);

    // Set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // Treat this as JSON
    header('Content-Type: application/json');

    if (count($headers) > 0) {
        foreach ($headers as $header => $value) {
            header("$header: $value");
        }
    }

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

    // Set the appropriate status header
    header('Status: ' . $status[$code]);

    // Return the encoded JSON response
    return json_encode(array(
        'status' => $code, // Success or not?
        'message' => $message
    ));
}

