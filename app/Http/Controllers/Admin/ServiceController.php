<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Service;
use App\ServiceImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.service.create',compact('categories'));
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
            'name' => 'required | unique:services',
            'category_id' => 'required',
            'tags' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image[]' => 'nullable|image'

        ],
        [
            'name.unique' => 'Please provide a Unique name',
        ]

            );

        $service = new Service();

        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->slug = Str::slug($service->name);
        $service->quantity = $request->quantity;
        $service->price = $request->price;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->user_id = 1;
        $service->save();


        $images = $request->image;

        if (isset($images)){
            if (count($images) > 0){
                foreach ($images as $img){
                    $currentdate = Carbon::now()->toDateString();
                    $slug = $service->slug;
                    $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$img->getClientOriginalExtension();
                    // Check Category directory is exists
                    if (!Storage::disk('public')->exists('services'))
                    {
                        Storage::disk('public')->makeDirectory('services');
                    }
                    $serviceImage = Image::make($img)->resize(600,600)->stream();
                    Storage::disk('public')->put('services/'.$imageName,$serviceImage);

                    $serviceImage = new ServiceImage();
                    $serviceImage->service_id = $service->id;
                    $serviceImage->image = $imageName;
                    $serviceImage->save();
                }
            }
        }else{
            $imageName = NULL;
            $serviceImage = new ServiceImage();
            $serviceImage->service_id = $service->id;
            $serviceImage->image = $imageName;
            $serviceImage->save();
        }

        $service->tags()->attach($request->tags);

        Toastr::success('Product Successfully Saved', 'Success');
        return redirect()->route('admin.service.index');
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
        $service = Service::find($id);
        $serviceImages = ServiceImage::where('service_id',$id)->get();
        return view('admin.service.edit', compact('service','serviceImages'));
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
            'category_id' => 'required',
            'tags' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image[]' => 'nullable|image'

        ],
            [
                'name.unique' => 'Please provide a Unique name',
            ]

        );

        $service = Service::find($id);

        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->slug = Str::slug($service->name);
        $service->quantity = $request->quantity;
        $service->price = $request->price;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->user_id = 1;
        $service->save();


        $images = $request->image;

       //dd($images);

        if (isset($images)){
            if (count($images) > 0){
                foreach ($images as $image){
                    foreach($service->images as $img){
                    $currentdate = Carbon::now()->toDateString();
                    $slug = $service->slug;
                    $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                    // Check Category directory is exists
                        if (!Storage::disk('public')->exists('services'))
                        {
                            Storage::disk('public')->makeDirectory('services');
                        }
                        //         Delete old image
                        if (Storage::disk('public')->exists('services/'.$img->image))
                        {
                            Storage::disk('public')->delete('services/'.$img->image);
                        }

                        $serviceImage = Image::make($image)->resize(600,600)->stream();
                        Storage::disk('public')->put('services/'.$imageName,$serviceImage);

                        $serviceImage = ServiceImage::find($img->id);
                        $serviceImage->service_id = $service->id;
                        $serviceImage->image = $imageName;
                        $serviceImage->save();

                    }

                }

            }
        }else{



        }
        $service->tags()->sync($request->tags);
        Toastr::success('Product Successfully Saved', 'Success');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        foreach($service->images as $image){
            if (Storage::disk('public')->exists('services/'.$image->image));
            {
                Storage::disk('public')->delete('services/'.$image->image);
            }

            $image = ServiceImage::find($image->id);
            $image->delete();

        }

        $service->delete();
        Toastr::success('Service Successfully Deleted', 'Success');
        return redirect()->back();
    }
}
