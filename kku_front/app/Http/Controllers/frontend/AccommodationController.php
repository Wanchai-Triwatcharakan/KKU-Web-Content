<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    //
    public function indexPageAccommodation() {
        return view('frontend.pages.accommodation.accom');
    }
}
