<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BonusController;

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

Route::get('/', [BonusController::class, 'form'])->name('form');
Route::get('/list', [BonusController::class, 'list'])->name('list');
Route::post('/store', [BonusController::class, 'store'])->name('form.store');
Route::post('/update', [BonusController::class, 'update'])->name('form.update');
Route::post('/delete/{id}', [BonusController::class, 'delete'])->name('buruh.delete');
Route::get('/detail-buruh/{id}', [BonusController::class, 'detail'])->name('buruh.detail');

