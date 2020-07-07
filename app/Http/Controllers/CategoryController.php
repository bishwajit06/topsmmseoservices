<?php

namespace App\Http\Controllers;

use App\Category;
use App\Service;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function showCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $services = $category->services()->get();
        if (!is_null($category)){
            return view('layouts.frontend.service.serviceByCategory',compact('category','services'));
       }else{
            Toastr::error('Category Error Updated', 'Error');
            return redirect()->route('home');
        }
    }
}
