<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    //
    public function getLecturer() {
        $lecture = Lecturer::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $lecture
        ], 200);
    }

}
