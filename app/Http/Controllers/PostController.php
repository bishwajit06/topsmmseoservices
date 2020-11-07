<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{

    public function showAllPost()
    {
        $posts = Post::latest()->paginate(8);
        return view('layouts.frontend.pages.post.postByAll',compact('posts'));
    }

    public function details($slug)
    {

    //   $post = Post::where('slug',$slug)->approved()->published()->first();

       $post = Post::where('slug',$slug)->first();

    //    $blogKey = 'blog_' . $post->id;

    //    if (!Session::has($blogKey)){
    //        $post->increment('view_count');
    //        Session::put($blogKey,1);
    //    }
    //    $randomposts = Post::approved()->published()->take('3')->inRandomOrder()->get();

       return view('layouts.frontend.pages.post.postDetail',compact('post'));
    }



    public function showPostCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->latest()->paginate(8);
        return view('layouts.frontend.pages.post.postByCategory',compact('category','posts'));

        //dd($posts->count());

    //     if ($posts->count() > 0){
    //         return view('layouts.frontend.pages.post.postByCategory',compact('category','posts'));
    //    }else{
    //         Toastr::error('Category Error Updated', 'Error');
    //         return redirect()->route('home');
    //     }
    }


    public function showTagCategory($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->latest()->paginate(8);
        return view('layouts.frontend.pages.post.postByTag',compact('tag','posts'));
    }

    public function userByPost($username)
    {

        $user = User::where('username', $username)->first();

        $posts = $user->posts()->latest()->paginate(8);
        return view('layouts.frontend.pages.post.userByPost',compact('user','posts'));
    }



}
