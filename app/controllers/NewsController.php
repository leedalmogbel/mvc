<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\Comments;


use Core;

class NewsController
{
    public function home() {}

    /*
    |----------------------------
    | Rendering create view for News
    |
    */

    public function create() {
        return $this->view('create');
    }

    /*
    |----------------------------
    | Handles updating News table
    |
    */

    public function store () {
        $news = new News();

        $news = $news->create('news', [
            'title'     => $_POST['title'],
            'body'      => $_POST['body'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return $this->redirect('');
    }

    /*
    |----------------------------
    | Handles updating Comment table
    |
    */

    public function update () {
        $news = new News();

        $news = $news->update('news', [
            'id'        => $_POST['id'],
            'title'     => $_POST['title'],
            'body'      => $_POST['body']
        ]);

        return $this->redirect('');
    }

    /*
    |----------------------------
    | Rendering edit view for News
    |
    */

    public function edit () {
        $news = new News();
        $news = $news->selectOne('news', $_GET['id']);
        return $this->view('edit', ['news' => $news]);
    }

    /*
    |----------------------------
    | Delete data from News
    |
    */

    public function delete () {
        $news = new News();

        $news = $news->delete('news', [
            'id' => $_GET['id'],
        ]);

        return $this->redirect('');
    }

    /*
    |----------------------------
    | Rendering News detail with comment
    |
    */

    public function detail () {
        $news = new News();
        $news = $news->selectOne('news', $_GET['id']);

        $comments = new Comments();
        $comments = $comments->selectOne('comment', $_GET['id']);

        return $this->view('detail', [
            'news' => $news,
            'comments' => $comments
        ]);
    }

    public function view($name, $data = []) {
        extract($data);
        return require "app/views/news/{$name}.view.php";
    }

    public function redirect($path) {
        header("Location: /{$path}");
    }
}