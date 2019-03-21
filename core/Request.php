<?php

namespace Core;

class Request
{
    /*
    |----------------------------
    | Getting uri
    |
    */
    public static function uri() {
        return  trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /*
    |----------------------------
    | Getting method [POST, GET, PATCH, PUT, DELETE]
    |
    */

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}