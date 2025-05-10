<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\OurServices;  // Make sure to import the correct model
use App\Models\SocialLink;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $service_sections = ServiceSection::all();
        $ourservices = OurServices::all();  // Use the correct variable name here
        $socialLinks = SocialLink::all();

        return view('services', compact('services', 'service_sections', 'ourservices', 'socialLinks'));  // Matching variable name
    }
}
