<?php

use App\Http\Controllers\Rgpanel\UserController;

// rgpanel.user.
Route::resource('/users', UserController::class)->middleware('can:read user');