<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logoImage = $request->file('logo');
        $slug = Str::random(10);

        if (isset($logoImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $logoImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$logoImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/logo'))
            {
                Storage::disk('public')->makeDirectory('setting/logo');
            }
//          Resize image for and upload
            $logo = Image::make($logoImage)->resize(166,60)->stream();
            Storage::disk('public')->put('setting/logo/'.$logoImageName,$logo);

        }else{
            $logoImageName = NULL;
        }


        $faviconImage = $request->file('favicon');
        $slug = Str::random(10);

        if (isset($faviconImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $faviconImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$faviconImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/favicon'))
            {
                Storage::disk('public')->makeDirectory('setting/favicon');
            }
//          Resize image for and upload
            $favicon = Image::make($faviconImage)->resize(50,50)->stream();
            Storage::disk('public')->put('setting/favicon/'.$faviconImageName,$favicon);

        }else{
            $faviconImageName = NULL;
        }


        $home_bannerImage = $request->file('home_banner');
        $slug = Str::random(10);

        if (isset($home_bannerImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $home_bannerImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$home_bannerImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/home_banner'))
            {
                Storage::disk('public')->makeDirectory('setting/home_banner');
            }
//          Resize image for and upload
            $home_banner = Image::make($home_bannerImage)->resize(848,200)->stream();
            Storage::disk('public')->put('setting/home_banner/'.$home_bannerImageName,$home_banner);

        }else{
            $home_bannerImageName = NULL;
        }


        $setting = new Setting();

        $setting->logo = $logoImageName;
        $setting->favicon = $faviconImageName;
        $setting->home_banner = $home_bannerImageName;
        $setting->top_contact = $request->top_contact;
        $setting->header_title = $request->header_title;
        $setting->footer_copyright = $request->footer_copyright;
        $setting->save();
        Toastr::success('Setting Successfully Saved', 'Success');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $setting = Setting::find($id);

        $logoImage = $request->file('logo');
        $slug = Str::random(10);

        if (isset($logoImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $logoImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$logoImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/logo'))
            {
                Storage::disk('public')->makeDirectory('setting/logo');
            }

            // delete directory
            if (Storage::disk('public')->exists('setting/logo/'.$setting->logo))
        {
            Storage::disk('public')->delete('setting/logo/'.$setting->logo);
        }
//          Resize image for and upload
            $logo = Image::make($logoImage)->resize(166,60)->stream();
            Storage::disk('public')->put('setting/logo/'.$logoImageName,$logo);

        }else{
            $logoImageName = $setting->logo;
        }


        $faviconImage = $request->file('favicon');
        $slug = Str::random(10);

        if (isset($faviconImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $faviconImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$faviconImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/favicon'))
            {
                Storage::disk('public')->makeDirectory('setting/favicon');
            }

            // delete directory
            if (Storage::disk('public')->exists('setting/favicon/'.$setting->favicon))
            {
            Storage::disk('public')->delete('setting/favicon/'.$setting->favicon);
            }
//          Resize image for and upload
            $favicon = Image::make($faviconImage)->resize(50,50)->stream();
            Storage::disk('public')->put('setting/favicon/'.$faviconImageName,$favicon);

        }else{
            $faviconImageName = $setting->favicon;
        }


        $home_bannerImage = $request->file('home_banner');
        $slug = Str::random(10);

        if (isset($home_bannerImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $home_bannerImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$home_bannerImage->getClientOriginalExtension();

//          Check directory is exists
            if (!Storage::disk('public')->exists('setting/home_banner'))
            {
                Storage::disk('public')->makeDirectory('setting/home_banner');
            }

            // delete directory
            if (Storage::disk('public')->exists('setting/home_banner/'.$setting->home_banner))
            {
            Storage::disk('public')->delete('setting/home_banner/'.$setting->home_banner);
            }
//          Resize image for and upload
            $home_banner = Image::make($home_bannerImage)->resize(848,200)->stream();
            Storage::disk('public')->put('setting/home_banner/'.$home_bannerImageName,$home_banner);

        }else{
            $home_bannerImageName = $setting->home_banner;
        }



        $setting->logo = $logoImageName;
        $setting->favicon = $faviconImageName;
        $setting->home_banner = $home_bannerImageName;
        $setting->top_contact = $request->top_contact;
        $setting->header_title = $request->header_title;
        $setting->footer_copyright = $request->footer_copyright;
        $setting->save();
        Toastr::success('Setting Successfully updated', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
