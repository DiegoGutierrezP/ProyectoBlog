<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','color'];//permitimos ingresar datos a la bd por asignacion masivo en los campos....

    //relacion post y tags (muchos a muchos)
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
