<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('', array('as'=>'author_list', 'uses'=>'AuthorsController@get_index'));

Route::delete('publisher/delete', array('as'=>'delete_publisher', 'uses'=>'PublishersController@delete_destroy'));

Route::get('publishers', array('as'=>'publisher_list', 'uses'=>'PublishersController@get_publishers'));
// This is an unamed route which is usually bad because
// it is hard to create a hyperlink to them. If you have a choice
// use a named route.
Route::get('author/{id}',                           // Is involved with this url.
    array('as'=>'author',                   // *name* of route.
        'uses'=>'AuthorsController@get_view')); // Reference to get_view method
// in the controller.
// Invokes GET request
Route::get('authors/new',                           // route url
    array('as'=>'new_author',               // route name
        'uses'=>'AuthorsController@get_new'));  // controller and function ref

Route::get('publishers/new',                           // route url
    array('as'=>'new_publisher',               // route name
        'uses'=>'PublishersController@get_new'));  // controller and function ref

// Invokes POST request
Route::post('authors/create',                          // route url
    array('as'=>'create_author',              // route name
        'uses'=>'AuthorsController@post_create')); // controller and function ref

Route::post('publishers/create',                          // route url
    array('as'=>'create_publisher',              // route name
        'uses'=>'PublishersController@post_create')); // controller and function ref

Route::put('authors/update', array('as'=>'update_author', 'uses'=>'AuthorsController@put_update'));
Route::get('author/edit/{id}', array('as'=>'edit_author', 'uses'=>'AuthorsController@get_edit'));

Route::delete('author/delete', array('as'=>'delete_author', 'uses'=>'AuthorsController@delete_destroy'));


