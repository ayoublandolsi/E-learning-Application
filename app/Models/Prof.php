<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prof;

class Prof extends Model
{
    protected $guarded =['id'];
    public function courses(){
        return $this->hasMany('App\models\Course');
    }
    public function groups(){
        return $this->belongsToMany(Groupe::class);
    }
    public function Certificatees()
    {
        return $this->belongsToMany(Certificatee::class);
    }
    use HasFactory;
}
