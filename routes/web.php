<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
Route::post('/admin/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');

Route::group(['prefix' => 'admin'],function()
{
    Route::group(['middleware' => 'admin.guest'],function()
    {});
    Route::group(['middleware' => 'admin.auth'],function()
    {

    });
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
