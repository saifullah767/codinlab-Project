<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    Route::middleware(['auth', 'verified'])->group(function () {
        

        Route::get('/logout', 'Auth\AuthenticatedSessionController@destroy');        

        Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
        Route::patch('/profile', 'ProfileController@update')->name('profile.update');
        Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

        //////////////////////

        Route::get('/projects', 'ProjectController@index');
        Route::post('/create-project', 'ProjectController@create');
        Route::get('/users', 'UserController@index');
        Route::post('/create-user', 'Auth\RegisteredUserController@store');
        Route::post('/create-comment', 'CommentsController@create');
        Route::get('/project/{project_id}', 'ProjectController@projectDetailPage');


    });
});

require __DIR__.'/auth.php';
