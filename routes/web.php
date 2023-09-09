<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SearchMailAddressController;

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

Route::get('user/admin', [UserController::class, 'index'])->middleware('admin');
Route::get('user/showuser/{user}', [UserController::class, 'show'])->name('user.show')->middleware('admin');
Route::get('user/{user}/edituser', [UserController::class, 'edit'])->name('user.edit');
Route::patch('user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::post('user/showsearchuser', [SearchMailAddressController::class, 'search'])->name('user.search')->middleware('admin');

Route::get('user/profile',[UserProfileController::class, 'edit'])->name('userprofile.edit');
Route::patch('user/editprofile',[UserProfileController::class, 'update'])->name('editprofile.update');

Route::get('sendmail', [SendMailController::class, 'send'])->name('sendmail');

Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{post}', [Postcontroller::class, 'destroy'])->name('post.destroy');
Route::get('post', [PostController::class, 'index'])->name('post.index');

Route::get('/test',[TestController::class, 'test'])->name('test');

Route::get('post/create',[PostController::class, 'create']);
Route::post('post',[PostController::class, 'store'])->name('post.store');
Route::get('post', [PostController::class, 'index']);

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
