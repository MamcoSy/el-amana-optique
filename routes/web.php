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

        // users management
        Router::group('/users', function () {
            Router::get('/', 'UsersController@index');
            Router::get('/delete/{id}', 'UsersController@delete');
            Router::post('/edit/{id}', 'UsersController@edit');
            Router::any('/add', 'UsersController@add');
        });

        // prescriptions management
        Router::group('/prescriptions', function () {
            Router::get('/', 'PrescriptionsController@index');
            Router::get('/delete/{id}', 'PrescriptionsController@delete');
            Router::get('/view/{id}', 'PrescriptionsController@view');
            Router::post('/edit/{id}', 'PrescriptionsController@edit');
            Router::any('/add', 'PrescriptionsController@add');
        });

        // invoces management
        Router::group('/invoces', function () {
            Router::get('/', 'InvocesController@index');
            Router::get('/delete/{id}', 'InvocesController@delete');
            Router::post('/edit/{id}', 'InvocesController@edit');
            Router::post('/add', 'InvocesController@add');
        });

    });
});
