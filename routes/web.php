<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\CommentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'departaments' => DepartamentController::class,
        'categories' => CategoryController::class,
        'priorities' => PriorityController::class,
        'statuses' => StatusController::class,
        'incidents' => IncidentController::class,
        'comments' => CommentsController::class,
    ]);
});

Route::controller(DepartamentController::class)->group(function () {
    Route::get('/departaments', 'index')->name('departaments.index');
    Route::get('/departaments/{departament}', 'show')->name('departaments.show');
})->withoutMiddleware([Auth::class]);

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
})->withoutMiddleware([Auth::class]);

Route::controller(PriorityController::class)->group(function () {
    Route::get('/priorities', 'index')->name('priorities.index');
    Route::get('/priorities/{priority}', 'show')->name('priorities.show');
})->withoutMiddleware([Auth::class]);

Route::controller(StatusController::class)->group(function () {
    Route::get('/statuses', 'index')->name('statuses.index');
    Route::get('/statuses/{status}', 'show')->name('statuses.show');
})->withoutMiddleware([Auth::class]);

Route::controller(IncidentController::class)->group(function () {
    Route::get('/incidents', 'index')->name('incidents.index');
    Route::get('/incidents/{incident}', 'show')->name('incidents.show');
})->withoutMiddleware([Auth::class]);

Route::controller(CommentsController::class)->group(function () {
    Route::get('/comments', 'index')->name('comments.index');
    Route::get('/comments/{comment}', 'show')->name('comments.show');
})->withoutMiddleware([Auth::class]);