<?php

function activeUrl(){
    return $_GET['uri'];
}

// strips out escape characters
function stripslashes_deep($value)
{
    $value = is_array($value) ? array_map('stripslashes_deep', $value) :
        stripslashes($value);
    return $value;
}

/**
 * Return array of $_GET and $_POST data
 * @return array
 */
function parse_params()
{
    $params = array();

    if (ini_get('magic_quotes_gpc') == 1) {
        if (!empty($_POST)) {
            $params = array_merge($params, stripslashes_deep($_POST));
        } else {
            $params = array_merge($params, $_POST);
        }

    }

    if (ini_get('magic_quotes_gpc') == 1) {
        if (!empty($_GET)) {
            $params = array_merge($params, stripslashes_deep($_GET));
        } else {
            $params = array_merge($params, $_GET);
        }

    }
    return $params;
}