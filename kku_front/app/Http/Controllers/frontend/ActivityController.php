<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function indexPageActivity() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.activity.activity');
    }
    public function dataDetail() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.activity.detail');
    }
}
