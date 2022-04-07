<?php

use App\Http\Controllers\MyFirstController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/hello/{p1}/{p2}', function ($param, $param2) {
    return 'Hello Param:'. $param.' Secondo: '.$param2;
});

Route::get('/hello-view/{par}', function ($param) {
    $model = [
        'param1' => $param,
        'param2' => 'world',
    ];
    return view('hello-view', $model);
});


Route::get('/hello-controller/{p1}/{p2}', 'MyFirstController@index');

Route::get('/hello-controller-query-string', 'MyFirstController@indexWithQueryString');

//Route::get('/photos', 'Admin\PhotoController@index');
//Route::post('/photos', 'Admin\PhotoController@store');

// Route::resource('/photos', 'Admin\PhotoController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

    Route::resource('photos', 'PhotoController');
   
});