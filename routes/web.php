    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartamentController;
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
    ]);
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
})->withoutMiddleware([Auth::class]);
/*
Route::controller(DepartamentController::class)->group(function () {
    Route::get('/departaments', 'index')->name('departaments.index');
    Route::get('/departaments/{departament}', 'show')->name('departaments.show');
})->withoutMiddleware([Auth::class]);*/
