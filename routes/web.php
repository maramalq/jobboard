<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::group(['prefix'=> 'jobs'], function () {
    Route::get('/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.jobs');
    Route::post('/save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
    Route::post('/search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.jobs');

});

Route::group(['prefix'=> 'categories'], function () {
    Route::get('/single/{id}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
});

Route::group(['prefix'=> 'users'], function () {
    Route::get('/profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('users.profile');
    Route::get('/applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('users.applications');
    Route::get('/savedjobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('users.savedjobs');
    Route::get('/edit-profile', [App\Http\Controllers\Users\UsersController::class, 'editProfile'])->name('users.editProfile');
    Route::post('/edit-profile', [App\Http\Controllers\Users\UsersController::class, 'updateProfile'])->name('users.updateProfile');
    Route::get('/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('users.editCV');
    Route::post('/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('users.updateCV');
});

Route::group(['prefix'=> 'contact'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::post('/', [App\Http\Controllers\Contacts\ContactController::class, 'send'])->name('send.contact');

});