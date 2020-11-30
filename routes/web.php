<?php

use App\Http\Controllers\Admin\PagesController;
use App\Http\Livewire\Admin\Menukort;
use App\Http\Livewire\Forside;
use App\Http\Livewire\Admin\Menus;
use App\Http\Livewire\Admin\Pages;
use App\Http\Livewire\Admin\Slides;
use App\Http\Livewire\Menukort as LivewireMenukort;
use App\Http\Livewire\Test;
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

Route::get('/', Forside::class)->name('home');
Route::get('/test', Test::class)->name('test');
Route::get('/menukort/{type?}', LivewireMenukort::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    // Admin routes limited to users with role Admin.
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('menu', Menus::class);
    Route::get('slide', Slides::class);

    Route::get('page', Pages::class);
    Route::get('menukort', Menukort::class);

    Route::resources([
        'pages' => PagesController::class,
    ]);
});
