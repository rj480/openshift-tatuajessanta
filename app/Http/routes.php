<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//registro de usuario 
Route::get('registro', ['as' => 'registro_usuario', 'uses' => 'Auth\AuthController@getRegistro']);
Route::post('registro', ['as' => 'post_registro', 'uses' => 'Auth\AuthController@postRegistro']);

// inicio de sesion
Route::get('login',['as' => 'vista_login', 'uses'=> 'Auth\AuthController@getLogin']);
Route::post('login',['as' => 'post_login', 'uses'=> 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'salir', 'uses'=> 'Auth\AuthController@getLogout']);

//vista tatuador 
Route::get('tatuador',['as' => 'vista_tatuador', 'uses'=> 'Front\TatuadorController@getTatuador']);
//vista trabajo
Route::get('trabajos',['as'=> 'vista_trabajos','uses'=>'Front\TatuadorController@getTrabajo']);
//vista bocetos
Route::get('bocetos',['as'=> 'vista_bocetos','uses'=>'Front\TatuadorController@getBocetos']);


Route::get('/', ['as' => 'home', 'uses' => 'Front\HomeController@index']);
Route::get('contacto',['as' => 'como_llegar', 'uses'=>'Front\HomeController@getLlegar']);
//ruta para el administrador 

Route::group(['prefix' => 'administrador', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function (){

Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

Route::resource('tatuadores', 'TatuadorController');
Route::resource('slide','SlideController');
Route::resource('trabajos','TrabajoTatuadorController');
Route::resource('nosotros','NosotrosController');

});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/*Route::get('/', function () {
    return view('welcome');
});*/