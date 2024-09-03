<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $guarded =['id'];
    protected $fillable=[ 'name','datedeb','datefin','datetest','number','prof_id','apprenant_id','catego_id','course_id'];

    public function profs()
    {
        return $this->belongsToMany(Prof::class);
    }

    public function apprenants()
    {
        return $this->belongsToMany(Apprenant::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function categos()
    {
        return $this->belongsTo('App\models\Catego');
    }
 use HasFactory;
}
