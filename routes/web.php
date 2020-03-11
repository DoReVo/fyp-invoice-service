<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

// get one invoice
$router->get('/invoice/{id}', ['middleware' => 'JWTAuth', 'uses' => 'InvoiceController@getOne']);

// mark invoice as paid
// $router->patch('/invoice/{id}/pay', ['middleware' => 'SessionAuth', 'uses' => 'InvoiceController@markPaid']);

$router->get('/', ['middleware' => 'JWTAuth', 'uses' => 'InvoiceController@handleRequest']);
