<?php

use LiteFramework\Router\Router;

Router::middleware('Guest', function () {
    Router::get('/', 'HomeController@index');
});
Router::post('/login', 'HomeController@login');

Router::middleware('Auth', function () {
    Router::get('/logout', 'HomeController@logout');
    Router::group('/admin-panel', function () {
        Router::get('/', 'AdminController@index');
        Router::get('/users', 'UsersController@index');
        Router::get('/users/delete/{id}', 'UsersController@delete');
        Router::post('/users/edit/{id}', 'UsersController@edit');
    });
});
