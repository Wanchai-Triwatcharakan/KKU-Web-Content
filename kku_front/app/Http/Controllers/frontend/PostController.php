<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function indexPagePost() {
        $pinnedNews = Post::where('category', ',5,')
                ->where('status_display', true)
                ->where('pin', true)
                ->limit(5)
                ->get();

        $allnews = Post::where('category', ',5,')
                    ->where('status_display', true)
                    ->paginate(10);
        return view('frontend.pages.post.post', compact('allnews', 'pinnedNews'));
    }
    public function dataDetail($id) {
        $news = Post::where('id', $id)
            ->where('category', ',5,')
            ->where('status_display', true)
            ->first();
        if (!$news) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลข่าวที่คุณต้องการ');
        }
         // หา news ก่อนหน้า
    $previousNews = Post::where('id', '<', $id)
        ->where('category', ',5,')
        ->where('status_display', true)
        ->orderBy('id', 'desc')
        ->first();

    // หา news หลังจากนั้น
    $nextNews = Post::where('id', '>', $id)
        ->where('category', ',5,')
        ->where('status_display', true)
        ->orderBy('id', 'asc')
        ->first();
        return view('frontend.pages.post.detail', compact('news', 'previousNews', 'nextNews'));
    }
}
