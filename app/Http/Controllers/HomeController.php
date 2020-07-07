<?php

namespace App\Http\Controllers;

use App\Category;

use App\Service;
Use Menu;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {
        $categories = Category::all();
        //$sliders = Slider::orderBy('priority', 'asc')->get();
        $specialServices = Service::latest()->get()->take(3);
        $bestServices = Service::latest()->get();
        return view('layouts.frontend.pages.home',compact('categories','specialServices','bestServices'));
    }
}
