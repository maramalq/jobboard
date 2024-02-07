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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jobs/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.jobs');
Route::post('/jobs/save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
Route::post('/jobs/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
Route::get('/categories/single/{id}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
Route::get('/users/profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('users.profile');
Route::get('/users/applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('users.applications');
Route::get('/users/savedjobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('users.savedjobs');
