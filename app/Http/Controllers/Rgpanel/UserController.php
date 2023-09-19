<?php

namespace App\Http\Controllers\Rgpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Auth::attempt(['email' => 'velicia@eterna.com', 'password' => '123']);
        return view('rgpanel.users.index', ['title' => __('menu.users')]);
    }
}