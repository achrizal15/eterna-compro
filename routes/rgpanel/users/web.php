<?php

use App\Http\Controllers\Rgpanel\UserController;

// rgpanel.user.
Route::prefix('/users')
         ->as('users.')
         ->controller(UserController::class)
         ->group(function () {
                  Route::get('/', 'index')->name('index');
         });