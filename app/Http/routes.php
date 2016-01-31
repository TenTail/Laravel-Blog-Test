<?php
use Carbon\Carbon;
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




Route::get('CanvasTest', ['as' => 'CanvasTest', function() {
	return view('CanvasTest');
}]);

Route::group(['prefix' => 'ORM'], function () {
	Route::get('', ['as' => 'ORM.HOME', function () {
		echo "this is ORM HOME.";
	}]);
	Route::get('create', ['as' => 'ORM.create', function () {
		// 使用Facade的create方法
		\App\Models\Articles::create([
			'article_title' => '文章測試Facade',
	    	'article_content' => '這是一篇測試文章，第Facade篇。',
	    	'feature' => rand(0, 1),
	    	'page_view' => rand(0, 200),
	    	'created_at' => Carbon::now('Asia/Taipei'),
	    	'updated_at' => Carbon::now('Asia/Taipei'),
		]);
		echo "Facade!!<br />";

		// 使用new建構式
		$post = new \App\Models\Articles();

		$post->article_title = '文章測試new';
		$post->article_content = '這是一篇測試文章，第new篇。';
		$post->feature = rand(0, 1);
		$post->page_view = rand(0, 200);
		$post->created_at = Carbon::now('Asia/Taipei');
		$post->updated_at = Carbon::now('Asia/Taipei');

		$post->save();
		echo "new!!<br />";
	}]);
	Route::get('search', ['as' => 'ORM.search', function () {
		// 收尋資料
		$data = \App\Models\Articles::all();
		// var_dump($data);
		// exit();
		dd($data);

		// 條件收尋
		$data = \App\Models\Articles::where('feature', '=', true)->orderBy('id')->get();
		// dd($data);
	}]);
	Route::get('update', ['as' => 'ORM.update', function () {
		// 更新資料
		$data = \App\Models\Articles::find(1);

		$data->update([
			'article_title' => 'update test.',
			'feature' => true,
		]);

		$data = \App\Models\Articles::where('id', '=', 10);
		$data->update([
			'article_title' => 'update test=3=.',
			'feature' => false,
		]);

		// save方法
		$data = \App\Models\Articles::where('id', '=', 11)->first();
		$data->article_title = 'update test -3-.';
		$data->feature = true;

		$data->save();

	}]);
	Route::get('delete', ['as' => 'ORM.delete', function () {
		$data = \App\Models\Articles::find(2);
		$data->delete();

		\App\Models\Articles::destroy(19, 20);
	}]);
});

Route::get('test', function () {
	// $data = \App\Models\Article::find(5);
	$data1 = \App\Models\Article::all();
	$data2 = \App\Models\Article::where('id', '>', 8);
	$data3 = \App\Models\Article::orderBy('id', 'DESC');
	dd([$data1, $data2, $data3]);
});

/*
Route::get('hello', function(){
	return "Hello World!";
});

Route::get('post/{id}', function($id) {
	return "id:".$id;
})->where('id', '[0-9]+');

// route name
Route::get('post2/{id?}', ['as' => 'post2.show', function($id = 0) {
	return "id:".$id;
}])->where('id', '[0-9]+');


Route::group(['prefix' => 'fruit'], function() {
	Route::get('apple', ['as' => 'fr.apple', function() {
		return view('fruit.apple');
	}]);
	Route::get('banana', ['as' => 'fr.banana', function() {
		return view('fruit.banana');
	}]);
});

Route::group(['prefix' => 'admin/fruit'], function() {
	Route::get('apple', ['as' => 'ad.fr.apple', function() {
		return "admin's apple.";
	}]);
	Route::get('banana', ['as' => 'ad.fr.banana', function() {
		return "admin's banana.";
	}]);
});
*/

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
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

	Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);

	Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
    
    Route::group(['prefix' => 'article'], function () {
		Route::get('', 			['as' => 'article.index', 'uses' => 'ArticlesController@index']);
		Route::get('create', 	['as' => 'article.create', 'uses' => 'ArticlesController@create']);
		Route::post('store', 	['as' => 'article.store', 'uses' => 'ArticlesController@store']);
		Route::get('{id}/edit', ['as' => 'article.edit', 'uses' => 'ArticlesController@edit']);
		Route::patch('{id}', 	['as' => 'article.update', 'uses' => 'ArticlesController@update']);
		Route::delete('{id}', 	['as' => 'article.destroy', 'uses' => 'ArticlesController@destroy']);
	});
});
