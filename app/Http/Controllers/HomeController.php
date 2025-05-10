<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Feature;
use App\Models\About;
use App\Models\AboutItem;
use App\Models\Service;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $features = Feature::all();
        $aboutData = About::all();
        $serviceItems = AboutItem::all();
        $services = Service::all();
        $socialLinks = SocialLink::all();

        $aboutItems = [];
        foreach ($aboutData as $about) {
            $aboutItems[$about->id] = [
                'title' => $about->title,
                'text_1' => $about->text_1,
                'text_2' => $about->text_2,
                'image' => $about->image,
                'list_items' => []
            ];
        }

        foreach ($serviceItems as $item) {
            $aboutItems[$item->about_id]['list_items'][] = $item->bullet_point;
        }

        return view('home', compact('banners', 'features', 'aboutItems', 'services', 'socialLinks'));
    }
}
