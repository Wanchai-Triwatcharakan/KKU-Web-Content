<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class ActivityController extends Controller
{
    //
    public function indexPageActivity() {
        $photoactivity = Post::where('category', ',6,')->where('status_display', true)->OrderBy('priority')->paginate(10);
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.activity.activity', compact('photoactivity'));
    }
    public function dataDetail($id) {
        // return view('frontend.pages.seminar.seminar');
        $postsupport = Post::where('id', $id)
            ->where('status_display', true)
            ->with(['images' => function($query) {
                $query->orderBy('position', 'asc'); // สั่งเรียงตามฟิลด์ position ตามลำดับจากน้อยไปมาก
            }])
            ->first();

        return view('frontend.pages.activity.detail', compact('postsupport'));
    }
}
