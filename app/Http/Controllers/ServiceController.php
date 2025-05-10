<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SocialLink;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $socialLinks = SocialLink::all();

        return view('services', compact('services', 'socialLinks'));
    }
}
