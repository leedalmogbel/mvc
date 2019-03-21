<?php

namespace App\Controllers;

use App\Models\News;

use Core;

class PagesController
{
    public function home() {
        $news = new News();
        $news = $news->selectAll('news');

        return $this->view('index',
            ['news' => $news]
        );
    }

    public function view($name, $data = []) {
        extract($data);
        return require "app/views/{$name}.view.php";
    }
}