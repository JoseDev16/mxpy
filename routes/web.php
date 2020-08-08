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



Route::middleware(['auth'])->group(function()
{
//Rutas para coleccion

Route::get('/coleccion','ColeccionController@index')->name('coleccion.index');

Route::post('coleccion/nueva', 'ColeccionController@store')->name('coleccion.store');
        

Route::get('coleccion/edit/{id}', 'ColeccionController@edit')->name('coleccion.edit');
        

Route::post('coleccion/edit', 'ColeccionController@update')->name('coleccion.update');
   
        
Route::delete('coleccion/delete', 'ColeccionController@destroy')->name('coleccion.destroy');

//Rutas para color 

Route::get('/colores','ColorController@index')->name('colores.index');

Route::post('colores/nueva', 'ColorController@store')->name('colores.store');
        

Route::get('colores/edit/{id}', 'ColorController@edit')->name('colores.edit');
        

Route::post('colores/edit', 'ColorController@update')->name('colores.update');
   
        
Route::delete('colores/delete', 'ColorController@destroy')->name('colores.destroy');

Route::get('/camisa','CamisaController@index')->name('camisa.index');

Route::post('camisa/nueva', 'CamisaController@store')->name('camisa.store');
        

Route::get('camisa/edit/{id}', 'CamisaController@edit')->name('camisa.edit');
        

Route::post('camisa/edit', 'CamisaController@update')->name('camisa.update');
   
        
Route::delete('camisa/delete', 'CamisaController@destroy')->name('camisa.destroy');

//Rutas para camisa_color

Route::get('/camisacolor','CamisaColorController@index')->name('camisacolor.index');

Route::get('camisacolor/nueva', 'CamisaColorController@create')->name('camisacolor.create');

Route::post('camisacolor/reg', 'CamisaColorController@store')->name('camisacolor.store');
        

Route::get('camisacolor/edit/{id}', 'CamisaColorController@edit')->name('camisacolor.edit');
        

Route::post('camisacolor/edit', 'CamisaColorController@update')->name('camisacolor.update');
   
        
Route::delete('camisacolor/delete', 'CamisaColorController@destroy')->name('camisacolor.destroy');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('registroadminmaxistore', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registroadminmaxistore', 'Auth\RegisterController@register');

});

Route::get('autentificacionmaxistore', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('autentificacionmaxistore', 'Auth\LoginController@login');








Route::get('/','ColeccionController@indexHome')->name('coleccion.indexHome');




//Rutas para camisa
        


Route::get('colecciones/camisas/{id}', 'CamisaController@indexCamisas')->name('camisa.indexcamisas');

        


Route::get('camisacolor/agregarColores', 'CamisaColorController@agregarColor')->name('camisacolor.agregarColor');


Route::get('colecciones/camisas/detalle/{id}', 'CamisaColorController@detalleCamisa')->name('camisacolor.detalle');

        
