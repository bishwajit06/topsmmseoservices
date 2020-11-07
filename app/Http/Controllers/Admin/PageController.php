<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'name' => 'required|unique:pages,name',
            'image' => 'nullable|image',
        ],
         [
             'name.required' => 'Please provide a Page name',
             'image.image' => 'Please provide a valid Page image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

        // get from image
        $image = $request->file('image');

        $slug = Str::slug($request->name);
        if (isset($image))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('page'))
            {
                Storage::disk('public')->makeDirectory('page');
            }
//          Resize image for category and upload
            $pageImage = Image::make($image)->resize(1098,360)->stream();
            Storage::disk('public')->put('page/'.$imageName,$pageImage);

        }else{
            $imageName = NULL;
        }



        $page = new Page();
        $page->name = $request->name;
        $page->slug = $slug;
        $page->body = $request->body;
        $page->image = $imageName;
        $page->save();
        Toastr::success('Page Successfully Saved', 'Success');
        return redirect()->route('admin.page.index');
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
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page'));
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
            'name' => 'required|unique:pages,name,'.$id,
            'image' => 'nullable|image',
        ],
        [
             'name.required' => 'Please provide a Page name',
             'image.image' => 'Please provide a valid Page image with .jpg, .png, .gif, .jpeg extension',
        ]
        );

        $page = Page::find($id);


        $image = $request->file('image');

        $slug = Str::slug($request->name);
        if (isset($image))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('page'))
            {
                Storage::disk('public')->makeDirectory('page');
            }
            //  Delete old image
            if (Storage::disk('public')->exists('page/'.$page->image))
            {
                Storage::disk('public')->delete('page/'.$page->image);
            }
//          Resize image for category and upload
            $pageImage = Image::make($image)->resize(1098,360)->stream();
            Storage::disk('public')->put('page/'.$imageName,$pageImage);

        }else{
            $imageName = $page->image;
        }




        $page->name = $request->name;
        $page->slug = $slug;
        $page->body = $request->body;
        $page->image = $imageName;
        $page->save();
        Toastr::success('Page Successfully Updated', 'Success');
        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if (!is_null($page)){
            if (Storage::disk('public')->exists('page/'.$page->image))
            {
                Storage::disk('public')->delete('page/'.$page->image);
            }

            $page->delete();
            Toastr::success('Page Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
