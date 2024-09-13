<?php
// namespace App\Http\Controllers\frontoffice;
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backoffice\CategoryController;
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
// \Artisan::call('cache:clear');
// \Artisan::call('route:clear');

// Route::get('/', function () {
//     return "S_House_Design_API";
// });
Route::get('/', [HomeController::class, 'indexPage']);

Route::prefix('seminar/')->group(function () {
    Route::get('/', [SeminarController::class, 'indexPage']);
});

Route::prefix('register/')->group(function () {
    Route::get('/', [RegisterController::class, 'indexPage']);
    Route::get('/detail', [RegisterController::class, 'dataDetail'])->name('register.detail');
});

Route::prefix('schedule/')->group(function () {
    Route::get('/', [ScheduleController::class, 'indexPage']);
    // Route::get('/detail', [RegisterController::class, 'dataDetail'])->name('register.detail');

});


// Test debug
// Route::get('/', [CategoryController::class, 'index']);
