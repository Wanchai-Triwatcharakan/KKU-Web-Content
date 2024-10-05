<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AccommodationController extends Controller
{
    //
    public function indexPageAccommodation() {
        $location = Post::where('id', 12)->first();
        return view('frontend.pages.accommodation.accom', compact('location'));
    }
}
