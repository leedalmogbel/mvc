<?php
    /*
    |----------------------------
    | main index callng autoload and boostrap
    |
    */

// require 'functions.php';
require 'vendor/autoload.php';
require 'core/bootstrap.php';

use Core\Router;
use Core\Request;

Router::load('app/routes.php')
        ->redirect(Request::uri(), Request::method());