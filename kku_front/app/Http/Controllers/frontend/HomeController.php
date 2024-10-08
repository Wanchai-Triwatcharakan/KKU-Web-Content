<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\AdSlide;

class HomeController extends Controller
{
    //
    public function indexPage() {
        $adslide = AdSlide::where('ad_type', 1)
            ->where('ad_status_display', true)
            ->where('ad_position_id', 2)
            ->OrderBy('ad_priority')->get();
        $allPost = Post::where('status_display', true)->OrderBy('priority')->get();
        $regispost = $allPost->filter(function($post) {
            return strpos($post->category, ',3,') !== false;
        })->take(4);
        $allnews = $allPost->where('category', ',5,');
        $photoactivity = $allPost->where('category', ',6,');
        $lecturer = $allPost->where('category', ',10,');
        $location = $allPost->where('id', 12)->first();
        $postsupport = Post::where('id', 5)
            ->where('status_display', true)
            ->with(['images' => function($query) {
                $query->orderBy('position', 'asc'); // สั่งเรียงตามฟิลด์ position ตามลำดับจากน้อยไปมาก
            }])
            ->first();
        $postOrigin = Post::where('id', 6)
            ->with(['images' => function($query) {
                $query->orderBy('position', 'asc');
            }])
            ->first();
        return view('frontend.pages.home.index', compact('adslide', 'postsupport', 'regispost', 'allnews', 'lecturer', 'photoactivity', 'postOrigin', 'location'));
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
