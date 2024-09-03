<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=[ 'id','name','desc','dateTime','duree','course_id','prof_id',];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
    use HasFactory;

}
