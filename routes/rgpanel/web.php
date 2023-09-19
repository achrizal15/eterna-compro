<?php
use App\Http\Controllers\Rgpanel\DashboardController;
use App\Http\Controllers\Rgpanel\UserController;

Route::get('/', DashboardController::class)->name('index');
Route::prefix('/users')
         ->as('users.')
         ->controller(UserController::class)
         ->group(__DIR__ . '/users/web.php');