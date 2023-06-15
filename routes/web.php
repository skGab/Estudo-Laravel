<?php

use App\Http\Controllers\SeriesController;
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
    return to_route('series.index');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', "index")->name('series.index');

    Route::get('/series/create', "create")->name('series.create');

    Route::delete('/series/destroy/{serie}', "destroy")->name('series.destroy');

    Route::post('/series/enrase', "enrase")->name('series.enrase');

    Route::post('/series/store', "store")->name('series.store');

    Route::get('/series/edit/{serie}', "edit")->name('series.edit');

    Route::put('/series/update/{serie}', "update")->name('series.update');
});
