<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Post extends Model

{

    use HasFactory;



    protected $table = "posts";

    protected $primaryKey = "id";

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function scheduleTimes()
    {
        return $this->hasMany(ScheduleTime::class, 'post_id');
    }
}

