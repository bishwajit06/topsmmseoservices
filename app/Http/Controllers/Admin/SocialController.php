<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::where('id', 1)->first();
        return view('admin.social.index', compact('social'));
    }

    public function store(Request $request)
    {
        $social = new Social();

        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->instagram = $request->instagram;
        $social->pinterest = $request->pinterest;
        $social->youtube = $request->youtube;
        $social->linkedin = $request->linkedin;
        $social->rss = $request->rss;
        $social->save();
        Toastr::success('Social link Successfully Saved', 'Success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $social = Social::find($id);

        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->instagram = $request->instagram;
        $social->pinterest = $request->pinterest;
        $social->youtube = $request->youtube;
        $social->linkedin = $request->linkedin;
        $social->rss = $request->rss;
        $social->save();
        Toastr::success('Social link Successfully updated', 'Success');
        return redirect()->back();
    }
}
