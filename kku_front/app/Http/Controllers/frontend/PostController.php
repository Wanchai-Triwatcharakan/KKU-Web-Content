<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
     public function indexPagePost() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.post.post');
    }
    public function dataDetail() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.post.detail');
    }
}
