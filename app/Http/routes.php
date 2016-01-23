<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	// throw new Exception("Tracy is work!", 1);
	
    return view('welcome');
});

Route::get('hello', function(){
	return "Hello World!";
});

Route::get('post/{id?}', function($id = '0') {
	return "id:".$id;
})->where('id', '[0-9]+');

// route name
Route::get('post2/{id?}', ['as' => 'post2.show', function($id = 0) {
	return "id:".$id;
}])->where('id', '[0-9]+');


Route::group(['prefix' => 'fruit'], function() {
	Route::get('apple', function() {
		return "everyone's apple.";
	});
	Route::get('banana', function() {
		return "everyone's banana.";
	});
});

Route::group(['prefix' => 'admin/fruit'], function() {
	Route::get('apple', ['as' => 'ad.fr.apple', function() {
		return "admin's apple.";
	}]);
	Route::get('banana', ['as' => 'ad.fr.banana', function() {
		return "admin's banana.";
	}]);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
