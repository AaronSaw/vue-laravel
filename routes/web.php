<?php

use App\Http\Controllers\ExcelController;
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
use App\Http\Controllers\PostController;

Route::get('post', [PostController::class, 'index'])->name('post');
Route::post('post', [PostController::class, 'createPost']);
Route::delete('post/{id}', [PostController::class, 'deletePost']);
Route::get('/', function () {
    return view('post');
});
Route::get('excel',[ExcelController::class,'index'])->name('excel.index');
Route::post('excel',[ExcelController::class,'store'])->name('excel.store');
Route::delete('excel/{id}',[ExcelController::class,'delete'])->name('excel.delete');

Route::get('/import',function(){
    return view('excelindex');
});
Route::post('/import',[ExcelController::class,'import'])->name('excel.import');

//laravel export
Route::get('users/export/', [ExcelController::class, 'export'])->name('excel.export');

//download pdf
Route::get('generate-pdf', [ExcelController::class, 'generatePDF'])->name('download.pdf');
