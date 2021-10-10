<?php

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

URL::forceRootUrl('https://webapps.bps.go.id/acehsingkilkab/jftlogbook/');
URL::forceScheme('https');

Route::get('/', function () {
    return view('welcome');
});


//Clear configurations:
Route::get('/config-clear', function() {
    $status = Artisan::call('config:clear');
    return '<h1>Configurations cleared</h1>';
});

//

//Clear cache:
Route::get('/cache-clear', function() {
    $status = Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

//Clear configuration cache:
Route::get('/config-cache', function() {
    $status = Artisan::call('config:Cache');
    return '<h1>Configurations cache cleared</h1>';
});

//migrate
Route::get('/migrate', function() {
    $status = Artisan::call('migrate:fresh --seed');
    return '<h1>migrate and seed success</h1>';
});

Route::get('/storage-link', function() {
    $status = Artisan::call('storage:link');
    return '<h1>Storage link Success</h1>';
});