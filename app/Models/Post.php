<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //campos que queremos evitar que se llene por asignacion masivo
    protected $guarded = ['id','created_at','updated_at'];

    //relacion user y post inversa (uno a muchos)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion category y post inversa (uno a muchos)
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //relacion post y tags (muchos a muchos)
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }

    /* public function getRouteKeyName()
    {
        return 'slug';
    } */
}
