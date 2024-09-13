<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function indexPage() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.register.register');
    }
    
    public function dataDetail() {
        // return view('frontend.pages.seminar.seminar');
        return view('frontend.pages.register.detail');
    }
}
