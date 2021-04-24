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
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('/verticals', VerticalController::class);
    Route::resource('/specializations', SpecializationController::class);
    Route::resource('/service-areas', DistrictController::class, [
        'names' => [
            'index' => 'districts.index',
            'create' => 'districts.create',
            'store' => 'districts.store',
            'edit' => 'districts.edit',
            'update' => 'districts.update',
            'destroy' => 'districts.destroy',
        ]
    ]);
    Route::resource('/rvsa-units', RvsaUnitController::class);
    Route::resource('/members', MemberController::class);
});


Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/migrate', function () {
    Artisan::call('migrate:fresh');
});

require __DIR__.'/auth.php';
