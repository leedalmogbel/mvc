<?php

namespace Core;

App::bind('config', require 'config.php');

$config = App::get('config');

$app = [];

// function view($name, $data = []) {
//     extract($data);

//     return require "app/views/{$name}.view.php";
// }

// function redirect($path) {
//     header("Location: /{$path}");
// }
