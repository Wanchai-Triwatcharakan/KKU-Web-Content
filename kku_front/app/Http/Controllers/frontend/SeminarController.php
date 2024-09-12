<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    
    public function indexPage() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.seminar.lecturer');
    }
}
