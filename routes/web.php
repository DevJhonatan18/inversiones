<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$posts = App\Post::latest('published_at')->get();
    return view('welcome',compact('posts'));
});



Route::get('posts', function () {
    return App\Post::all();
});


/*Route::get('gastos', function () {
    return view('gastos');
});
*/
Route::get('gastos', 'GastosController@create');


Route::get('detalle', 'GastosController@list');





Route::post('gastos', 'GastosController@save');


Route::get('calendar', function () {
	
    return view('gastos_detalle_2');
});


Route::POST('calendar2','GastosController@getDetailbyDate');

// Route::get('gastos', 'GastosController@save');