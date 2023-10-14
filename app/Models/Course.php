<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded =['id'];
    public function catego(){
        return $this->belongsTo('App\models\Catego');
    }
    public function prof(){
        return $this->belongsTo('App\\models\Prof');
    }
    public function apprenants(){
        return $this->belongsToMany('App\\models\Apprenant');
    }
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
    public function groups(){
        return $this->belongsToMany(Groupe::class);
    }
    public function certificatees(){

            return $this->belongsTo(Certifictee::class);
    }
    public function tests()
    {
        return $this->belongsTo(Test::class);
    }
    use HasFactory;
}
