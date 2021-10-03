<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonthlyTaskController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DipaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/////////////////////////////////////////// Monthly Progress Route ////////////////////////////////////////////////

///GET semua laporan pada tahun ini
Route::get('/monthly_progress',[MonthlyTaskController::class,'getYearlyTasks']);


///GET semua laporan tugas bulanan pada bulan xxx
Route::get('/monthly_progress/{month_num}',[MonthlyTaskController::class,'getMonthlyTasks']);

///Get selected Task Indicator
Route::get('/monthly_progress/task/{task_id}',[MonthlyTaskController::class,'getSelectedIndicator']);

///UPDATE status laporan tugas bulanan pada bulan xxx
Route::post('/monthly_progress/task',[MonthlyTaskController::class,'updateMonthlyTaskProgress']);



/////////////////////////////////////////// SOP Route ////////////////////////////////////////////////

///ambil daftar semua SOP
Route::get('/sops',[SopController::class,'getListSop']);

Route::get('/sops/{sop_id}',[SopController::class,'getSelectedSopDetail']);

Route::get('/sops?search={keyword}',[SopController::class,'searchSop']);

Route::get('/sops?tags={role_tag}',[SopController::class,'filterRoleSop']);

Route::post('/sops',[SopController::class,'storeSop']);
Route::post('/sops/update',[SopController::class,'updateSop']);
Route::delete('sops/{sop_id}',[SopController::class,'deleteSop']);


/////////////////////////////////////////// Dashboard Route ////////////////////////////////////////////////
Route::get('/get_current_month',[DashboardController::class,'getCurrentMonth']);


/////////////////////////////////////////// Dipa Route ////////////////////////////////////////////////
Route::post('/dipa/upload',[DipaController::class,'uploadPok']);


/////////////////////////////////////////// Auth Route ////////////////////////////////////////////////
Route::middleware(['auth:sanctum'])->group(function () {
    //-- Auth Module Route --
    Route::post('/logout',[AuthController::class,'logout']);
});


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);