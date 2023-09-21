<?php
use App\Http\Controllers\Rgpanel\AuthController;
use App\Http\Controllers\Rgpanel\BannerController;
use App\Http\Controllers\Rgpanel\DashboardController;

// rgpanel.

Route::middleware(['auth'])
         ->group(function () {
                  Route::get('/', DashboardController::class)->name('index');
                  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

                  Route::resource('banners', BannerController::class);

                  require __DIR__ . '/users/web.php';
         });
Route::prefix('/auth')
         ->as('auth.')
         ->middleware('guest')
         ->controller(AuthController::class)
         ->group(__DIR__ . '/auth/web.php');