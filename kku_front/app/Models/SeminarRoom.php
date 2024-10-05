<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarRoom extends Model
{
    use HasFactory;

    protected $table = "seminar_rooms";

    protected $primaryKey = "id";

    protected $guarded = [];
    
    public function scheduleTimes()
    {
        return $this->hasMany(ScheduleTime::class, 'room_id');
    }
}
