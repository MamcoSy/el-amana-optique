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
        Router::get('/settings', 'ParamController@index');

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

        // invoices management
        Router::group('/invoices', function () {
            Router::get('/', 'InvoicesController@index');
            Router::get('/delete/{id}', 'InvoicesController@delete');
            Router::post('/edit/{id}', 'InvoicesController@edit');
            Router::any('/add', 'InvoicesController@add');
            Router::get('/view/{id}', 'InvoicesController@view');
        });
    });
});
