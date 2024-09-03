<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apprenant;

class Apprenant extends Model
{
    protected $guarded =['id'];
    protected $fillable=[ 'name','phonenumber','email','img','gendre','spec','password'];

    public function courses(){
        return $this->belongsToMany('App\\models\Course');
    }
    public function groups(){
        return $this->belongsToMany(Groupe::class);
    }
    use HasFactory;
}
