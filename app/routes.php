<?php



$router->get('', 'PagesController@home'); // render index
$router->get('news/create', 'NewsController@create'); // render news create form
$router->get('news/edit', 'NewsController@edit'); // render news create edit form
$router->get('news/detail', 'NewsController@detail'); // render news detail from with comments

$router->post('news', 'NewsController@store'); // adding news
$router->post('news/update', 'NewsController@update'); // updating news
$router->post('news/delete', 'NewsController@delete'); // deleting news

$router->post('comments', 'CommentsController@store'); // adding comment

