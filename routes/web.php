<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\genreController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [genreController::class, 'getGenres']);
Route::get('/admin/genre', [genreController::class, 'getGenres']);
Route::get('/admin/genre/add_genre_form', [genreController::class, 'addGenre']);

Route::get('/loginregister', function () {
    return view('loginregister.index');
});

Route::post('/loginregister/login', [userController::class, 'login']);
Route::post('/loginregister/register', [userController::class, 'register']);
