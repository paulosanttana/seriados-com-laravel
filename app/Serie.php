<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//ORM do Laravel
class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    //mapeamento do relacionamento (Serie tem varias'hasMany' Temporadas)
    public function  temporadas()
    {
        return $this->hasMany(Temporadas::class);
    }
}