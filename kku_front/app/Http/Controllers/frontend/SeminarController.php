<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SeminarController extends Controller
{
    public function indexPageSeminar() {
        $post = Post::find(6);
        return view('frontend.pages.seminar.seminar', compact('post'));
    }
    public function indexPage() {
        $allLecturer = Post::where('category', ',10,')
            ->where('status_display', true)
            ->OrderBy('priority')
            ->paginate(10);
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.seminar.lecturer', compact('allLecturer'));
    }
}
