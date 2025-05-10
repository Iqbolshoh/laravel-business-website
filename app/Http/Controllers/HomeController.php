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

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $features = Feature::all();
        $aboutData = About::all();
        $serviceItems = AboutItem::all();
        $services = Service::all();

        $aboutItems = [];
        foreach ($aboutData as $about) {
            $aboutItems[$about->id] = [
                'title' => $about->title,
                'p1' => $about->p1,
                'p2' => $about->p2,
                'image' => $about->image,
                'list_items' => []
            ];
        }

        foreach ($serviceItems as $item) {
            $aboutItems[$item->about_id]['list_items'][] = $item->list_item;
        }

        return view('home', compact('banners', 'features', 'aboutItems', 'services'));
    }
}
