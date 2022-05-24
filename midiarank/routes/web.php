<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'MediaController@getAllMedias');

Route::prefix('medias')->group(function(){
    Route::get('/games', 'MediaController@showAllGames');
    // Route::get('/game/{id}', 'MediaController@showOneGame')->middleware('verified');
    Route::get('/game/{id}', 'MediaController@showOneGame');
    Route::get('/movies', 'MediaController@showAllMovies');
    Route::get('/movie/{id}', 'MediaController@showOneMovie');
    Route::get('/series', 'MediaController@showAllSeries');
    Route::get('/serie/{id}', 'MediaController@showOneSerie');
});

Route::prefix('user')->group(function(){

    Route::get('/myProfile', 'UserController@myProfile')->middleware('verified');
    Route::get('/like', 'UserController@like')->middleware('verified');
    Route::get('/dislike', 'UserController@dislike')->middleware('verified');
    Route::get('/avaliacao', 'UserController@avaliacao')->middleware('verified');
    Route::get('/deleta-avaliacao', 'UserController@deletaAvaliacao')->middleware('verified');
});

Route::get('/register', function(){

    return view('register');
});

Route::get('/login', function(){
    return view('login');
});


Route::get('/logout', function(){
    Session::pull('saveJson'); // preciso deletar da sessão essa variável pra atualizar o json para o python calcular as recomendações
    return view('login');
});

Route::get('/about', function(){

    return view('about');
});
//Auth::routes();
Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MediaController@getAllMedias')->name('home');
