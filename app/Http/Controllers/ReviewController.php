<?php

namespace App\Http\Controllers;

use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerStore(Request $request)
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
        return redirect()->back();
    }

    


}
