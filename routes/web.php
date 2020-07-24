<?php

use Illuminate\Support\Facades\Route;
use SamuelNitsche\LaravelHetznerDns\HetznerApi;

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

Route::get('/', function (HetznerApi $api) {
	dd($api->getZoneByName('samynitsche.de'));
});

// Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
