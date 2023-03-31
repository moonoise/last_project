<?php

use App\Http\Controllers\AdminRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StepRegisController;
use App\Http\Middleware\OnoffStatus;


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

Route::get('/', [HomeController::class, 'show']);
Route::get('/home', [HomeController::class, 'show'])->name('home');
Route::get('/off', [HomeController::class, 'off'])->name('off');


Route::middleware([OnoffStatus::class])->group(function(){
    Route::get('step1', [StepRegisController::class, 'step1_show'])->name('step1.show');

    Route::post('step1', [StepRegisController::class, 'step1'])->name('step1.save');
    Route::get('/step2/{token}', [StepRegisController::class, 'step2'])->name('step2.show');
    Route::put('/step2/{token}', [StepRegisController::class, 'step2_save'])->name('step2.save');
    Route::get('/step3/{token}', [StepRegisController::class, 'step3'])->name('step3.show');
    Route::put('/step3/{token}', [StepRegisController::class, 'step3_save'])->name('step3.save');
    Route::get('/step4/{token}', [StepRegisController::class, 'step4'])->name('step4.show');
    Route::post('/step5/{token}', [StepRegisController::class, 'step5'])->name('step5.show');
    Route::get('/printpreview/{token}', [StepRegisController::class, 'printpreview'])->name('printpreview.show');
});




// Route::get('/', function () {
//     // Only authenticated users may access this route...
//     return view('welcome');
// })->middleware('auth.basic');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', function () {
            return view('admin.home');
        })->name('admin.home');

        Route::get('/registed_show',[AdminRegisterController::class,'registed_show'])->name('registed_show.show');
        Route::get('/registed_show/search',[AdminRegisterController::class,'registed_search'])->name('registed_show.search');
        Route::get('/onoff',[AdminRegisterController::class,'onoff'])->name('onoff.show');

        Route::delete('/registed/{id}',[AdminRegisterController::class,'destroy'])->name('registed_show.destroy');



    });
});
