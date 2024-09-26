<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ScheduleController extends Controller
{
    //
    public function indexPageSchedule() {
        $schedule = Post::where('category', ',4,')
            ->where('status_display', true)
            ->get();
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.schedule.schedule', compact('schedule'));
    }
    public function dataDetail() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.schedule.scheduleDetail');
    }
}
