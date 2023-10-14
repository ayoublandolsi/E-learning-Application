<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded =['id'];





    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function catego()
    {
        return $this->belongsTo(Catego::class);
    }
    use HasFactory;
}
