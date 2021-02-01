<?php

/**
 * PHP LiteFramework.
 *
 * @author Mamadou Aly Sy <mamco.aly.sy@gmail.com>
 */

/*
|-----------------------------------------------------------------
| Register the autoloader
|-----------------------------------------------------------------
|
| Load the autoloader that will generate class
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/*
|-----------------------------------------------------------------
| Bootstrap the application
|-----------------------------------------------------------------
|
| Bootstrap the application and do some actions from the framework
 */
require dirname(__DIR__) . '/bootstrap/app.php';

/*
|-----------------------------------------------------------------
| Running the Application
|-----------------------------------------------------------------
|
| Running the Application and handle request and response
 */
Application::run();
