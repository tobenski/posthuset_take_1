<?php

use App\Http\Controllers\Admin\AftenMenuController;
use App\Http\Controllers\Admin\AfternoonDishController;
use App\Http\Controllers\Admin\AnbefalerDishController;
use App\Http\Controllers\Admin\AnbefalerMenuController;
use App\Http\Controllers\Admin\BorneMenuController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChildrensDishController;
use App\Http\Controllers\Admin\DinnerDishController;
use App\Http\Controllers\Admin\EftermiddagsMenuController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Livewire\Events as LivewireEvents;
use App\Http\Controllers\Admin\FrokostMenuController;
use App\Http\Controllers\Admin\HomeBoxesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\LunchDishController;
use App\Http\Livewire\Admin\Menukort;
use App\Http\Livewire\Forside;
use App\Http\Livewire\Admin\Menus;
use App\Http\Livewire\Admin\Pages;
use App\Http\Livewire\Admin\Slides;
use App\Http\Livewire\CateringMenuOrder;
use App\Http\Livewire\CateringMenus;
use App\Http\Livewire\CateringMenuShow;
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




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    // Admin routes limited to users with role Admin.
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('menu', Menus::class)->name('navigation');
    Route::get('slide', Slides::class);

    Route::get('page', Pages::class);
    Route::get('menukort', Menukort::class);


    Route::resources([
        'pages' => PagesController::class,
        'homebox' => HomeBoxesController::class,
        'frokostmenu' => FrokostMenuController::class,
        'eftermiddagsMenu' => EftermiddagsMenuController::class,
        'borneMenu' => BorneMenuController::class,
        'aftenMenu' => AftenMenuController::class,
        'anbefalerMenu' => AnbefalerMenuController::class,
        'event' => EventController::class,
        'calendar' => CalendarController::class,

    ]);
    Route::resource('frokostmenu.lunchDish', LunchDishController::class)->shallow();
    Route::resource('eftermiddagsMenu.afternoonDish', AfternoonDishController::class)->shallow();
    Route::resource('borneMenu.childrensDish', ChildrensDishController::class)->shallow();
    Route::resource('aftenMenu.dinnerDish', DinnerDishController::class)->shallow();
    Route::resource('anbefalerMenu.anbefalerDish', AnbefalerDishController::class)->shallow();
});


Route::get('/arrangementer/{event?}', LivewireEvents::class)->name('arrangementer');
Route::get('/menukort', LivewireMenukort::class)->name('menukort');
Route::get('/catering', CateringMenus::class)->name('catering');
Route::post('/catering/order', CateringMenuOrder::class)->name('catering.order');
Route::get('catering/{menu}', CateringMenuShow::class)->name('catering.show');

Route::get('/test/{event?}', Test::class)->name('test');
Route::get('/', Forside::class)->name('home');
