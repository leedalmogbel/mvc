<?php

namespace Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct() {
        
    }

    /*
    |----------------------------
    | Loading file to get what path to route
    |
    */

    public static function load($file) {

        $router = new static;

        require $file;

        return $router;
    }

    /*
    |----------------------------
    | Get mthod
    |
    */

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    /*
    |----------------------------
    | Post Method
    |
    */

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function register($routes) {
        $this->routes = $routes;
    }

    /*
    |----------------------------
    | Parsing Routes
    |
    */

    public function redirect($uri, $requestType) {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception("No route defined.");
    }

    /*
    |----------------------------
    | calling action for controllers
    |
    */

    protected function callAction($controller, $action) {

        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }

    public function view($name, $data = []) {
        extract($data);
        return require "app/views/{$name}.view.php";
    }


}