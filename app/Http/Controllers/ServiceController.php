<?php

namespace App\Http\Controllers;

use App\Service;
use App\ServiceImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function allServices()
    {
        $services = Service::latest()->paginate(9);
        return view('layouts.frontend.service.shop', compact('services'));
    }

    public function detail($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $randomServices = Service::take('12')->inRandomOrder()->get();
        //$serviceImages = ServiceImage::where('service_id',$slug)->get();
        return view('layouts.frontend.service.serviceDetail',compact('service','serviceImages','randomServices'));
    }
}
