<?php

namespace App\Http\Controllers\Rgpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('rgpanel.users.index', ['title' => __('menu.users')]);
    }
}