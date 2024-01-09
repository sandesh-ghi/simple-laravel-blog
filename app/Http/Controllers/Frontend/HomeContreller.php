<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeContreller extends Controller
{
    function homePage(){
        $data['posts'] = Post::where('status', 1)->orderBy('created_at','desc')->paginate(3);
        return view('frontend.home',compact('data'));
    }
    function postDetail($slug){
        $data['posts'] = Post::where('slug', $slug)->first();
        return view('frontend.post_detail',compact('data'));
    }
}
