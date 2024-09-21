<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeminarRoom;

class RoomSeminarController extends Controller
{
    //
    public function getSeminarRoom() {
        $room = SeminarRoom::all();
        return response([
            'message' => 'ok',
            'data' => $room,
        ], 200);
    }
}
