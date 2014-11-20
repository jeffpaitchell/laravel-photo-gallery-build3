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

/* Make sure you have the 'App::bind' statements in order for your 
repositories to be recognized. */

App::bind('Acme\repositories\StoneRepository', 'Acme\repositories\Eloquent\EloquentStoneRepository');

App::bind('Acme\repositories\PhotoRepository', 'Acme\repositories\Eloquent\EloquentPhotoRepository');

/* Other routes */

Route::get('stones/new_stone', array('as'=>'new_stone', 'uses'=>'StonesController@create'));

Route::post('stones/store_stone', array('as'=>'store_stone', 'uses'=>'StonesController@store'));

Route::get('stones/stone/show/{id}', array('as'=>'show_stone', 'uses'=>'StonesController@show'));

Route::get('stones/stone/show/{id}/edit', array('as'=>'edit_stone', 'uses'=>'StonesController@edit'));

Route::put('/stones/show/{id}/update', array('as'=>'update_stone', 'uses'=>'StonesController@update'));

Route::delete('stones/stone/{id}/destroy', array('as'=>'delete_stone', 'uses'=>'StonesController@destroy'));

Route::get('stones/new_photo', array('as'=>'new_photo', 'uses'=>'StonePhotosController@create'));

Route::post('stones/store_photo', array('as'=>'store_photo', 'uses'=>'StonePhotosController@store'));

Route::get('stones/{stoneId}/photo/{photoid}/show', array('as'=>'show_photo', 'uses'=>'StonePhotosController@show'));

Route::get('stones/{stoneId}/photo/{photoid}/show_full', array('as'=>'show_photo_full', 'uses'=>'StonePhotosController@show_full'));

Route::get('stones/stone/{stoneid}/photo/{photoid}/edit', array('as'=>'edit_photo', 'uses'=>'StonePhotosController@edit'));

Route::put('stones/stone/{stoneid}/photo/{photoid}/update', array('as'=>'update_photo', 'uses'=>'StonePhotosController@update'));

Route::delete('stones/stone/{stoneid}/photo/{photoid}/destroy', array('as'=>'delete_photo', 'uses'=>'StonePhotosController@destroy'));

/* Main home page route */

Route::get('stones', array('as'=>'overview', 'uses' => 'GalleryController@index'));



Route::get('/', function()
{
	return View::make('hello');
});


