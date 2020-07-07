<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = Category::latest()->where('parent_id', NULL)->get();
        return view('admin.category.create',compact('mainCategories'));
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
            'name' => 'required',
            'banner_image' => 'nullable|image',
            'icon_image' => 'nullable|image',
        ],
         [
             'name.required' => 'Please provide a category name',
             'banner_image.image' => 'Please provide a valid Banner image with .jpg, .png, .gif, .jpeg extension',
             'icon_image.image' => 'Please provide a valid Icon image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

        // get from image
        $bannerImage = $request->file('banner_image');
        $thumbnailImage = $request->file('thumbnail_image');
        $iconImage = $request->file('icon_image');
        $slug = Str::slug($request->name);
        if (isset($bannerImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $bannerImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$bannerImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('category/banner'))
            {
                Storage::disk('public')->makeDirectory('category/banner');
            }
//          Resize image for category and upload
            $category = Image::make($bannerImage)->resize(850,360)->stream();
            Storage::disk('public')->put('category/banner/'.$bannerImageName,$category);

        }else{
            $bannerImageName = NULL;
        }

        if (isset($thumbnailImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $thumbnailImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$thumbnailImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('category/thumbnail'))
            {
                Storage::disk('public')->makeDirectory('category/thumbnail');
            }
//          Resize image for category and upload
            $category = Image::make($thumbnailImage)->resize(300,300)->stream();
            Storage::disk('public')->put('category/thumbnail/'.$thumbnailImageName,$category);

        }else{
            $thumbnailImageName = NULL;
        }

        if (isset($iconImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $iconImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$iconImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('category/icon'))
            {
                Storage::disk('public')->makeDirectory('category/icon');
            }
//          Resize image for category and upload
            $category = Image::make($iconImage)->resize(16,16)->stream();
            Storage::disk('public')->put('category/icon/'.$iconImageName,$category);

        }else{
            $iconImageName = NULL;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        if ($request->parent_id > 0){
            $category->parent_id = $request->parent_id;
        }else{
            $category->parent_id = NULL;
        }
        $category->banner_image = $bannerImageName;
        $category->thumbnail_image = $thumbnailImageName;
        $category->icon_image = $iconImageName;
        $category->save();
        Toastr::success('Category Successfully Saved', 'Success');
        return redirect()->route('admin.category.index');
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
        $category = Category::find($id);
        $mainCategories = Category::latest()->where('parent_id', NULL)->get();
        if (!is_null($category)){
            return view('admin.category.edit', compact('category','mainCategories'));
        }else{
            return redirect()->route('admin.category.index');
        }

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
            'name' => 'required',
            'banner_image' => 'nullable|image',
            'icon_image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name',
                'banner_image.image' => 'Please provide a valid Banner image with .jpg, .png, .gif, .jpeg extension',
                'icon_image.image' => 'Please provide a valid Icon image with .jpg, .png, .gif, .jpeg extension',
            ]
        );


        // get from image
        $bannerImage = $request->file('banner_image');
        $thumbnailImage = $request->file('thumbnail_image');
        $iconImage = $request->file('icon_image');
        $slug = Str::slug($request->name);
        $category = Category::find($id);
        if (isset($bannerImage))
    {
//          Make unique name for image
        $currentdate = Carbon::now()->toDateString();
        $bannerImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$bannerImage->getClientOriginalExtension();

//          Check Category directory is exists
        if (!Storage::disk('public')->exists('category/banner'))
        {
            Storage::disk('public')->makeDirectory('category/banner');
        }

//          Delete old image
        if (Storage::disk('public')->exists('category/banner/'.$category->banner_image))
        {
            Storage::disk('public')->delete('category/banner/'.$category->banner_image);
        }

//          Resize image for category and upload
        $categoryimage = Image::make($bannerImage)->resize(850,360)->stream();
        Storage::disk('public')->put('category/banner/'.$bannerImageName,$categoryimage);

    }else{
        $bannerImageName = $category->banner_image;
    }


    if (isset($thumbnailImage))
    {
//          Make unique name for image
        $currentdate = Carbon::now()->toDateString();
        $thumbnailImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$thumbnailImage->getClientOriginalExtension();

//          Check Category directory is exists
        if (!Storage::disk('public')->exists('category/thumbnail'))
        {
            Storage::disk('public')->makeDirectory('category/thumbnail');
        }

//          Delete old image
        if (Storage::disk('public')->exists('category/thumbnail/'.$category->thumbnail_image))
        {
            Storage::disk('public')->delete('category/thumbnail/'.$category->thumbnail_image);
        }

//          Resize image for category and upload
        $categoryimage = Image::make($thumbnailImage)->resize(300,300)->stream();
        Storage::disk('public')->put('category/thumbnail/'.$thumbnailImageName,$categoryimage);

    }else{
        $thumbnailImageName = $category->thumbnail_image;
    }

        if (isset($iconImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $iconImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$iconImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('category/icon'))
            {
                Storage::disk('public')->makeDirectory('category/icon');
            }

//          Delete old image
            if (Storage::disk('public')->exists('category/icon/'.$category->icon_image))
            {
                Storage::disk('public')->delete('category/icon/'.$category->icon_image);
            }

//          Resize image for category and upload
            $categoryimage = Image::make($iconImage)->resize(16,16)->stream();
            Storage::disk('public')->put('category/icon/'.$iconImageName,$categoryimage);

        }else{
            $iconImageName = $category->icon_image;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        if ($request->parent_id > 0){
            $category->parent_id = $request->parent_id;
        }else{
            $category->parent_id = NULL;
        }
        $category->banner_image = $bannerImageName;
        $category->thumbnail_image = $thumbnailImageName;
        $category->icon_image = $iconImageName;
        $category->save();
        Toastr::success('Category Successfully Updated', 'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)){
            if ($category->parent_id == NULL){
                $subCategories = Category::latest()->where('parent_id', $category->id)->get();
                foreach ($subCategories as $sub){
                    if (Storage::disk('public')->exists('category/banner/'.$sub->banner_image))
                    {
                        Storage::disk('public')->delete('category/banner/'.$sub->banner_image);
                    }
                    if (Storage::disk('public')->exists('category/thumbnail/'.$sub->thumbnail_image))
                    {
                        Storage::disk('public')->delete('category/thumbnail/'.$sub->thumbnail_image);
                    }
                    if (Storage::disk('public')->exists('category/icon/'.$sub->icon_image))
                    {
                        Storage::disk('public')->delete('category/icon/'.$sub->icon_image);
                    }
                    $sub->delete();
                }
            }
            if (Storage::disk('public')->exists('category/banner/'.$category->banner_image))
            {
                Storage::disk('public')->delete('category/banner/'.$category->banner_image);
            }
            if (Storage::disk('public')->exists('category/thumbnail/'.$category->thumbnail_image))
            {
                Storage::disk('public')->delete('category/thumbnail/'.$category->thumbnail_image);
            }
            if (Storage::disk('public')->exists('category/icon/'.$category->icon_image))
            {
                Storage::disk('public')->delete('category/icon/'.$category->icon_image);
            }
            $category->delete();
            Toastr::success('Category Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->route('admin.category.index');
        }

    }
}
