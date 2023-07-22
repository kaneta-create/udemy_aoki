<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\contactFormController;
use App\Http\Controllers\ShopController;


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




Route::get('tests/test', [TestController::class, 'index']);

Route::get('shop', [ShopController::class, 'index']);

Route::prefix('contacts')->middleware('auth')
    ->group(function(){
        Route::get('/', [ContactFormController::class, 'index'])->name('contacts.index');
        Route::get('/create', [ContactFormController::class, 'create'])->name('contacts.create');
        Route::post('/', [ContactFormController::class, 'store'])->name('contacts.store');
        Route::get('/{id}', [ContactFormController::class, 'show'])->name('contacts.show');
        Route::get('/{id}/edit', [ContactFormController::class, 'edit'])->name('contacts.edit');
        Route::post('/{id}', [ContactFormController::class, 'update'])->name('contacts.update');
        Route::post('/{id}/destroy', [ContactFormController::class, 'destroy'])->name('contacts.destroy');

    });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
