<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class ActivityController extends Controller
{
    //
    public function indexPageActivity() {
        $photoactivity = Post::where('category', ',6,')
            ->where('status_display', true)
            ->OrderBy('priority')
            ->paginate(10);
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.activity.activity', compact('photoactivity'));
    }
    public function dataDetail($id) {
        // return view('frontend.pages.seminar.seminar');
        $post = Post::where('id', $id)
            ->where('status_display', true)
            ->firstOrFail(); // ดึง post ข้อมูลที่ต้องการ

        $images = $post->images()
            ->orderBy('position', 'asc') // เรียงตามลำดับจากน้อยไปมาก
            ->paginate(2); // แบ่งหน้า 10 รูปต่อหน้า

        return view('frontend.pages.activity.detail', compact('post', 'images'));
    }
}
