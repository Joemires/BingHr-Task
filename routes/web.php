<?php

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

Route::get('/', function () {
    return redirect()->route('backend.users.index');
});

Route::
    as('backend.')
    ->middleware('auth')
    ->prefix('backend')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('overview', function () {
            return redirect()->route('backend.users.index');
        });

        // Route::delete('users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
        Route::resource('users', 'UserController');
    });

Route::prefix('auth')->group( fn () => require __DIR__.'/auth.php');
