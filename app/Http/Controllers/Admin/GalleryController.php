<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index',compact('galleries'));
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
        $this->validate($request,[
            'image' => 'required|image'
        ],
         [
             'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

        // get from image
        $galleryImage = $request->file('image');
        $slug = Str::random(10);
        if (isset($galleryImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $galleryImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$galleryImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('gallery'))
            {
                Storage::disk('public')->makeDirectory('gallery');
            }
//          Resize image for category and upload
            $galleyResize = Image::make($galleryImage)->resize(800,450)->stream();
            Storage::disk('public')->put('gallery/'.$galleryImageName,$galleyResize);

        }else{
            $galleryImageName = "default.png";
        }

        $gallery = new Gallery();
        $gallery->image = $galleryImageName;
        $gallery->save();
        Toastr::success('Gallery Image Successfully Saved', 'Success');
        return back();
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
        $this->validate($request,[
            'image' => 'image'
        ],
         [
             'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

         $gallery = Gallery::find($id);
        $galleryImage = $request->file('image');
        $slug = Str::random(10);
        if (isset($galleryImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $galleryImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$galleryImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('gallery'))
            {
                Storage::disk('public')->makeDirectory('gallery');
            }
//          Delete old image
        if (Storage::disk('public')->exists('gallery/'.$gallery->image))
        {
            Storage::disk('public')->delete('gallery/'.$gallery->image);
        }
//          Resize image for category and upload
            $galleyResize = Image::make($galleryImage)->resize(800,450)->stream();
            Storage::disk('public')->put('gallery/'.$galleryImageName,$galleyResize);

        }else{
            $galleryImageName = $gallery->image;
        }


        $gallery->image = $galleryImageName;
        $gallery->save();
        Toastr::success('Gallery Image Successfully Saved', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if (!is_null($gallery)){
            if (Storage::disk('public')->exists('gallery/'.$gallery->image))
            {
                Storage::disk('public')->delete('gallery/'.$gallery->image);
            }

            $gallery->delete();
            Toastr::success('Gallery Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
