<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function indexPagePost() {
        $allnews = Post::where('category', ',5,')
            ->where('status_display', true)
            ->get();
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.post.post', compact('allnews'));
    }
    public function dataDetail() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.post.detail');
    }
}
