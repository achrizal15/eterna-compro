<?php

namespace App\Http\Controllers\Rgpanel;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $title = __('banner.Banners');
        $banners = Banner::all();
        return view('rgpanel.banner.index', compact('banners', 'title'));
    }
    public function create()
    {
        $title = __('banner.Create Banners');
        return view('rgpanel.banner.form', compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image_desktop' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'button_label' => 'nullable|string|max:100',
            'button_link' => 'nullable|url|max:255',
            'image_mobile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $request->file('image_desktop')->store('banners', 'public');
    }
}