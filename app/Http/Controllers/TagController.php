<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller
{
    public function showTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $services = $tag->services()->get();
        if (!is_null($tag)){
            return view('layouts.frontend.service.serviceByTag',compact('tag','services'));
       }else{
            Toastr::error('Tag Error Updated', 'Error');
            return redirect()->route('home');
        }
    }
}
