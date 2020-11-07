<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
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
            'title' => 'required | unique:posts',
            'category_id' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'image' => 'image'

        ],
        [
            'title.unique' => 'Please provide a Unique name',
        ]

            );

        $post = new Post();
        // get from image
        $image = $request->file('image');
        $slug = Str::slug($post->title);
        if (isset($image))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $postImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
//          Resize image for category and upload
            $categoryPost = Image::make($image)->resize(870,450)->stream();
            Storage::disk('public')->put('post/'.$postImageName,$categoryPost);

        }else{
            $postImageName = NULL;
        }


        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($post->title);
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->image = $postImageName;
        $post->save();

        $post->tags()->attach($request->tags);

        Toastr::success('Post Successfully Saved', 'Success');
        return redirect()->route('admin.post.index');
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
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
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
            'title' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'image' => 'image'

        ]);

        $post = Post::find($id);


        // get from image
        $image = $request->file('image');

        $slug = Str::slug($post->title);
        if (isset($image))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $postImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            //          Delete old image
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
//          Resize image for category and upload
            $categoryPost = Image::make($image)->resize(870,450)->stream();
            Storage::disk('public')->put('post/'.$postImageName,$categoryPost);

        }else{
            $postImageName = $post->image;
        }


        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($post->title);
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->image = $postImageName;
        $post->save();

        $post->tags()->sync($request->tags);

        Toastr::success('Post Successfully Updated', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!is_null($post)){
            if (Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }

            $post->delete();
            $post->tags()->detach();
            Toastr::success('Post Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
