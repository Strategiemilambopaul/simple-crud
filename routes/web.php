<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/essaie', [MainController::class, 'essaie'])->name('dashboard');
Route::get('/create', [MainController::class, 'create'])->name('create');
Route::get('/create/category', [MainController::class, 'create_category'])->name('createCategory');
Route::post('/create/category', [MainController::class, 'redirectorCategory'])->name('redirectorCategory');
Route::get('/update/category/{id}', [MainController::class, 'update_category'])->name('updateCategory')->whereNumber('id');
Route::post('/update/category/{id}', [MainController::class, 'after_updating_category'])->name('category_up_dashboard')->whereNumber('id');
Route::get('/delete/category/{id}', [MainController::class, 'delete_category'])->name('delete_category')->whereNumber('id');
Route::get('/create/article', [MainController::class, 'create_article'])->name('createArticle');
Route::post('/create/article', [MainController::class, 'redirectorArticle'])->name('redirectorArticle');
Route::get('/update/article/{id}', [MainController::class, 'update_article'])->name('updateArticle')->whereNumber('id');
Route::post('/update/article/{id}', [MainController::class, 'after_updating_article'])->name('article_up_dashboard')->whereNumber('id');
Route::get('/delete/article/{id}', [MainController::class, 'delete_article'])->name('delete_article')->whereNumber('id');

require __DIR__.'/auth.php';


