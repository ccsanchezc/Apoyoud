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
    return view('welcome');
});
Route::resource('/inicio', 'InicioController');

//ADMIN*---------*
Route::group(['prefix' => 'admin'], function(){
    
      Route::resource('user','AdminController');
    Route::get('user/{codigo}/destroy',[
           'uses' => 'AdminController@destroy',
           'as' => 'user.destroy',
    ]);
    
    Route::resource('serviA','AServiController');

       Route::get('serviA/{id}/destroy',[
           'uses' => 'AServiController@destroy',
           'as' => 'serviA.destroy',
    ]);

    Route::resource('sub','ASubController');

       Route::get('sub/{id}/destroy',[
           'uses' => 'ASubController@destroy',
           'as' => 'sub.destroy',
    ]);

    Route::resource('menuA','AMenuController');

       Route::get('menuA/{id}/destroy',[
           'uses' => 'AMenuController@destroy',
           'as' => 'menuA.destroy',
    ]);    

     Route::resource('pdfuser','PdfController'); 
    Route::get('pdfuser/ver/{id}','PdfController@pdfusera'); 
    Route::get('pdfuser/ver/{id}',[
           'uses' => 'PdfController@pdfusera',
           'as' => 'pdfuser.pdfusera',
    ]);
    
    
    Route::get('pdfuser/download/{id}','PdfController@pdfuserd'); 

    Route::get('crear_reporte_porsubsidio/{tipo}', 'PdfController@crear_reporte_porsubsidio');
    Route::get('crear_reporte_porservicio/{tipo}', 'PdfController@crear_reporte_porservicio');
    Route::get('crear_reporte_usuario/{tipo}', 'PdfController@crear_reporte_usuario');
      });

//ADMIN*---------*

//SUPERVISOR-------------------------
Route::group(['prefix' => 'super'], function(){
    
    Route::resource('servi','SServiController');

       Route::get('servi/{id}/destroy',[
           'uses' => 'SServiController@destroy',
           'as' => 'servi.destroy',
    ]);

    
    Route::resource('menu','SMenuController');

       Route::get('menu/{id}/destroy',[
           'uses' => 'AMenuController@destroy',
           'as' => 'menu.destroy',
    ]);    
      Route::resource('entrega','SEntreAlController');

       Route::get('entrega/{id}/destroy',[
           'uses' => 'SEntreAlController@destroy',
           'as' => 'entrega.destroy',
    ]);   
});
//ESTUDIANTE-------------------------
Route::group(['prefix' => 'estudi'], function(){
    
    Route::resource('serviusu','ServiUsuaController'); 
    Route::get('historico','EPdfController@pdfhistorico'); 
    Route::get('recibo', 'EPdfController@pdfrecibo');
    Route::resource('datos','DatosController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
