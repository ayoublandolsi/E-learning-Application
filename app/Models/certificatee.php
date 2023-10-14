<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificatee extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
    public function profs()
    {
        return $this->belongsToMany(Prof::class);
    }
    public function categos()
    {
        return $this->belongsTo('App\models\Catego');
    }
}
