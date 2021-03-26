<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\HelloMiddleware;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('hello',function(){
  return '<html><body><h1>sample page</h1></body></html>';
});
*/
Route::get('/', function () {
    return view('welcome');
});

//helloにアクセスした際には、hellomiddlewaregroupに登録してあるすべてのmiddlewareが呼び出される
//Route::get('hello','HelloController@index')->middleware('hello');
//use Middleware
//Route::get('hello','HelloController@index')->middleware(HelloMiddleware::class);
//use middleware add kernel.php(global middleware)


Route::post('hello','HelloController@post');
Route::get('hello','HelloController@index');

//insert
Route::get('hello/add','HelloController@add');
Route::post('hello/add','HelloController@create');

//update
Route::get('hello/edit','HelloController@edit');
Route::post('hello/edit','HelloController@update');

//delete
Route::get('hello/del','HelloController@del');
Route::post('hello/del','HelloController@remove');

Route::get('hello/show','HelloController@show');


Route::get('hello/other','HelloController@other');

//add person
Route::get('person','PersonController@index');
Route::get('person/find','PersonController@find');
Route::post('person/find','PersonController@search');
Route::get('person/add','PersonController@add');
Route::post('person/add','PersonController@create');
Route::get('person/edit','PersonController@edit');
Route::post('person/edit','PersonController@update');


//シングルアクションコントローラ
//Route::get('hello','HelloController');
