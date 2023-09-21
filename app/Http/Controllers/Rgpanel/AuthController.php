<?php

namespace App\Http\Controllers\Rgpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (!Auth::attempt($credential)) {
            return response()->json(['message' => __('auth.failed')], 422);
        }
        return response()->json(['message' => __('auth.success')]);
    }
    public function login()
    {
        return view('rgpanel.auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('rgpanel.auth.login', ['locale' => app()->getLocale()]);
    }
}