<?php

/**
 * Returns the active URL by appending the value of 'uri' from the $_GET array to the WEB_URL constant.
 * @return string The active URL
 */
function activeUrl(){
    if(isset($_GET['uri'])){
        return WEB_URL.$_GET['uri'];
    }
}

/**
 * Returns the value of 'uri' from the $_GET array.
 * @return string The active URI
 */
function activeUri(){
    if(isset($_GET['uri'])){
        return $_GET['uri'];
    }
}

/**
 * Strips out escape characters from the given value.
 * @param mixed $value The value to be stripped
 * @return mixed The stripped value
 */
function stripslashes_deep($value)
{
    $value = is_array($value) ? array_map('stripslashes_deep', $value) :
        stripslashes($value);
    return $value;
}

/**
 * PHP < 5.3 compatibility
 * Returns an array of $_GET and $_POST data after removing escape characters if magic_quotes_gpc is enabled.
 * @return array The array of parsed parameters
 */
function parse_params()
{
    $params = array();

    // Check if magic_quotes_gpc is enabled
    if (ini_get('magic_quotes_gpc') == 1) {
        if (!empty($_POST)) {
            $params = array_merge($params, stripslashes_deep($_POST));
        } else {
            $params = array_merge($params, $_POST);
        }
    }

    // Check if magic_quotes_gpc is enabled
    if (ini_get('magic_quotes_gpc') == 1) {
        if (!empty($_GET)) {
            $params = array_merge($params, stripslashes_deep($_GET));
        } else {
            $params = array_merge($params, $_GET);
        }
    }

    return $params;
}