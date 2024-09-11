<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function indexPage() {
        return view('frontend.pages.home.index');
    }

    public function NewsPage() {
        $news = Post::where('category', 'LIKE', '%7%')->get();
        return view('frontend.pages.news', compact('news'));
    }

    public function NewsDetailPage($id) {
        $news = Post::find($id);
        return view('frontend.pages.news-detail', compact('news'));
    }
    
    public function AboutUsPage() {
        return view('frontend.pages.aboutus');
    }
}
