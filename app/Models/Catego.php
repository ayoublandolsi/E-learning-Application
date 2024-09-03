<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catego;

class Catego extends Model
{
    protected $guarded =['id'];
    protected $fillable=[ 'name'];

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
    public function groups(){
        return $this->hasMany('App\Models\Group');
    }
    public function certificatees()
    {
        return $this->belongsTo(Certificatee::class);
    }
    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }
    use HasFactory;
}
