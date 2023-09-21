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
        $route = route('rgpanel.banners.store', ['locale' => app()->getLocale()]);
        $method = 'post';
        return view('rgpanel.banner.form', compact('title', 'route', 'method'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image_desktop' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'button_label' => 'nullable|string|max:100',
            'button_link' => 'nullable|url|max:255',
            'image_mobile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $validate['image_desktop'] = $request->file('image_desktop')->store('banners', 'public');
        if ($request->hasFile('image_mobile')) {
            $validate['image_mobile'] = $request->file('image_mobile')->store('banners', 'public');
        }
        Banner::create($validate);
        return redirect()->route('rgpanel.banners.index', ['locale' => app()->getLocale()])
            ->with(['message' => __('banner.Banner successfully created')]);
    }
}