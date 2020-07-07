<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use App\Service;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::latest()->get();
        return view('admin.review.create',compact('services'));
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
            'name' => 'required|',
            'review' => 'required',
            'star' => 'required|integer',
            'image' => 'nullable|image'
        ],
         [
             'name.required' => 'Please provide a Customer name',
             'image.image' => 'Please provide a valid Banner image with .jpg, .png, .gif, .jpeg extension'
         ]
         );

        // get from image
        $reviewImage = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($reviewImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $reviewImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$reviewImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('reviews'))
            {
                Storage::disk('public')->makeDirectory('reviews');
            }
//          Resize image for category and upload
            $review = Image::make($reviewImage)->resize(110,110)->stream();
            Storage::disk('public')->put('reviews/'.$reviewImageName,$review);

        }else{
            $reviewImageName = NULL;
        }


        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->service_id = $request->service_id;
        $review->image = $reviewImageName;
        $review->save();
        Toastr::success('Review Successfully Saved', 'Success');
        return redirect()->route('admin.review.index');
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
        $review = Review::find($id);
        $services = Service::latest()->get();
        return view('admin.review.edit',compact('services','review'));
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
            'name' => 'required|',
            'review' => 'required',
            'star' => 'required|integer',
            'image' => 'nullable|image'
        ],
         [
             'name.required' => 'Please provide a Customer name',
             'image.image' => 'Please provide a valid Banner image with .jpg, .png, .gif, .jpeg extension'
         ]
         );


          // get from image
        $reviewImage = $request->file('image');
        $slug = Str::slug($request->name);
        $review = Review::find($id);
        if (isset($reviewImage))
    {
//          Make unique name for image
        $currentdate = Carbon::now()->toDateString();
        $reviewImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$reviewImage->getClientOriginalExtension();

//          Check reviews directory is exists
        if (!Storage::disk('public')->exists('reviews'))
        {
            Storage::disk('public')->makeDirectory('reviews');
        }

//          Delete old image
        if (Storage::disk('public')->exists('reviews/'.$review->image))
        {
            Storage::disk('public')->delete('reviews/'.$review->image);
        }

//          Resize image for reviews and upload
        $reviewImageSize = Image::make($reviewImage)->resize(110,110)->stream();
        Storage::disk('public')->put('reviews/'.$reviewImageName,$reviewImageSize);

    }else{
        $reviewImageName = $review->image;
    }

        $review->name = $request->name;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->service_id = $request->service_id;
        $review->image = $reviewImageName;
        $review->save();
        Toastr::success('Review Successfully Saved', 'Success');
        return redirect()->route('admin.review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if (!is_null($review)){
            if (Storage::disk('public')->exists('reviews/'.$review->image))
            {
                Storage::disk('public')->delete('reviews/'.$review->image);
            }

            $review->delete();
            Toastr::success('Review Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
