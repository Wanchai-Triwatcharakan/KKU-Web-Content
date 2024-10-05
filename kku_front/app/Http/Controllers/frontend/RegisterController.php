<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class RegisterController extends Controller
{
    //
    public function indexPageRegister() {
        $regisPost = Post::where('category', ',3,')
            ->where('status_display', true)
            ->OrderBy('priority')
            ->get();
        $location = Post::where('id', 12)->first();
        return view('frontend.pages.register.register', compact('regisPost', 'location'));
    }
    
    public function dataDetail($id) {
        $post = Post::where('id', $id)
            ->where('category', ',3,')
            ->where('status_display', true)
            ->first();
        return view('frontend.pages.register.detail', compact('post'));
    }
}
