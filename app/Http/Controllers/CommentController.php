<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function commentStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'image' => 'nullable|image'
        ],
         [
             'name.required' => 'Please provide your real name',
             'email.required' => 'Please provide a Valid',
             'image.image' => 'Please provide a valid profile image with .jpg, .png, .gif, .jpeg extension'
         ]
         );

        // get from image
        $commentImage = $request->file('image');

        //dd($commentImage);
        $slug = Str::slug($request->name);
        if (isset($commentImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $commentImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$commentImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('comment'))
            {
                Storage::disk('public')->makeDirectory('comment');
            }
//          Resize image for category and upload
            $comment = Image::make($commentImage)->resize(110,110)->stream();
            Storage::disk('public')->put('comment/'.$commentImageName,$comment);

        }else{
            $commentImageName = NULL;
        }


        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->image = $commentImageName;
        $comment->save();
        Toastr::success('Comment successfully submit and wait for admin Approved', 'Success');
        return redirect()->back();
    }


    public function commentApproved($id)
    {

       $comment = Comment::find($id);

       $comment->approve = 0;
       $comment->save();
        Toastr::success('Comment successfully Approved', 'Success');
        return redirect()->back();
    }

    public function commentUnApproved($id)
    {

       $comment = Comment::find($id);

       $comment->approve = 1;
       $comment->save();
        Toastr::success('Comment successfully Unapproved', 'Success');
        return redirect()->back();
    }
}
