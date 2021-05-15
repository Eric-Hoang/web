<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Naptiencontroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');
Route::get('Deposit', [Naptiencontroller::class, 'index'])->middleware('auth')->name('naptien.index');
Route::post('Deposit', [Naptiencontroller::class, 'naptien'])->middleware('auth')->name('naptien.naptien');
Route::resource('apps', AppController::class);
Route::resource('apps.comments', CommentController::class);
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('most-free-download', [AppController::class, 'mostFreeDownLoad'])->name('apps.most-free-download');
Route::get('most-paid-download', [AppController::class, 'mostPaidDownload'])->name('apps.most-paid-download');
Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('test', function () {
    $val = [50000, 100000, 200000, 500000];
    App\Models\Card::create(['seri' => mt_rand(1, 1000), 'number' => mt_rand(1, 1000), 'amount' => collect($val)->random()]);
});
