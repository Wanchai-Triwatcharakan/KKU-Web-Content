<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SeminarRoom;
use App\Models\ScheduleTime;

class ScheduleController extends Controller
{
    //
    public function indexPageSchedule() {
        $schedule = Post::where('category', ',4,')
            ->where('status_display', true)
            ->get();
        return view('frontend.pages.schedule.schedule', compact('schedule'));
    }
    public function dataDetail($id) {
        $post = Post::where('id', $id)->with('scheduleTimes')->first();
        $tagsArray = json_decode($post->tags, true);
        if (is_array($tagsArray)) {
            $rooms = SeminarRoom::where('status_display', true)
                ->whereIn('id', $tagsArray)
                ->with('scheduleTimes')
                ->get();
        } else {
            $rooms = [];
        }
        // $rooms = SeminarRoom::where('status_display', true)->with('scheduleTimes')->get();
        return view('frontend.pages.schedule.scheduleDetail', compact('post', 'rooms'));
    }
}
