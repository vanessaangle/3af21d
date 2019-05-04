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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', function(){
    return redirect('/');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin','as' => 'admin.','middleware' => 'auth'], function(){
    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::get('/user/profile','UserController@profile')->name('user.profile');
    Route::resources([
        '/user' => 'UserController',
        '/desa' => 'DesaController',
        '/kegiatan' => 'KegiatanController',
        '/petugas' => 'PetugasController',
        '/penduduk' => 'PendudukController',
        '/web' => 'WebController',
        '/administrasi' => 'AdministrasiController'
    ]);
});