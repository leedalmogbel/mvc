<?php //-->



namespace App\Controllers;

use App\Models\Comments;


use Core;

class CommentsController
{

    /*
    |--------------------------------------------------------------------------
    | COmments Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the application delegates jobs and redirecting them
    | to diffent views.
    |
    */

    public function home() {}

    /*
    |----------------------------
    | Handles updating Comment table
    |
    */

    public function store () {
        $comments = new Comments();

        $comments = $comments->create('comment', [
            'body'      => $_POST['body'],
            'news_id'   => $_POST['news_id'],
            'created_at' => date('Y-m-d H:i:s')
            
        ]);

        return $this->redirect('news/detail?id=' . $_GET['id']);
    }

    /*
    |----------------------------
    | Handles routing on views
    |
    */

    public function view($name, $data = []) {
        extract($data);
        return require "app/views/news/{$name}.view.php";
    }

    public function redirect($path) {
        header("Location: /{$path}");
    }
}