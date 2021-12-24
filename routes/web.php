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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'],function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/administration', [App\Http\Controllers\Administration\AdministrationController::class, 'index'])
        ->name('administration.index');

    Route::get('/administration/director/{director}', [App\Http\Controllers\Administration\DirectorController::class, 'edit'])
        ->name('administration.director');

    Route::post('/administration/director/update/{director}', [App\Http\Controllers\Administration\DirectorController::class, 'update'])
        ->name('administration.director.update');

    Route::get('/administration/directors', [App\Http\Controllers\Administration\DirectorController::class, 'index'])
        ->name('administration.directors');

    Route::get('/administration/njacda/upload/directors', [App\Http\Controllers\Administration\ImportDirectorsController::class, 'create'])
        ->name('administration.upload.directors');

    Route::post('/administration/njacda/import/directors', [App\Http\Controllers\Administration\ImportDirectorsController::class, 'store'])
        ->name('administration.import.directors');

    Route::post('/administration/njacda/import/students', [App\Http\Controllers\Administration\ImportStudentsController::class, 'store'])
        ->name('administration.import.students');

});
/*
Route::group(['middleware' => ['auth:santum','verified'], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/administration', [App\Http\Controllers\Administration\AdmiistrationController::class, 'index'])
        ->name('administration.index');
}]);
*/

