<?php
// namespace App\Http\Controllers\frontoffice;
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backoffice\CategoryController;
use Illuminate\Support\Facades\Route;
use phpseclib3\File\ASN1\Maps\PostalAddress;

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
    Route::get('origin', [SeminarController::class, 'indexPageSeminar'])->name('seminar.origin');
    Route::get('lecturer', [SeminarController::class, 'indexPage'])->name('seminar.lecturer');
});

Route::prefix('register/')->group(function () {
    Route::get('/', [RegisterController::class, 'indexPageRegister'])->name('register.index');
    Route::get('/detail/{id}', [RegisterController::class, 'dataDetail'])->name('register.detail');
});

Route::prefix('schedule/')->group(function () {
    Route::get('/', [ScheduleController::class, 'indexPageSchedule'])->name('schedule.index');
    Route::get('/detail', [ScheduleController::class, 'dataDetail'])->name('schedule.detail');
});

Route::prefix('post/')->group(function () {
    Route::get('/', [PostController::class, 'indexPagePost'])->name('post.index');
    Route::get('/detail/{id}', [PostController::class, 'dataDetail'])->name('post.detail');
});

Route::prefix('activity/')->group(function () {
    Route::get('/', [ActivityController::class, 'indexPageActivity'])->name('activity.index');
    Route::get('/detail/{id}', [ActivityController::class, 'dataDetail'])->name('activity.detail');
});

Route::prefix('accommodation/')->group(function () {
    Route::get('/', [AccommodationController::class, 'indexPageAccommodation'])->name('accommodation.index');
});

Route::prefix('contact/')->group(function () {
    Route::get('/', [ContactController::class, 'indexPageContact'])->name('contact.index');
});