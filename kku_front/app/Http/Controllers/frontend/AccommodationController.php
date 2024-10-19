<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AccommodationController extends Controller
{
    //
    public function indexPageAccommodation() {
        $hotels = Post::where('category', ',7,')->where('status_display', true)->get();
        // dd($hotels);
        $location = Post::where('id', 12)
            ->with('images')
            ->first();
        return view('frontend.pages.accommodation.accom', compact('location', 'hotels'));
    }
}
