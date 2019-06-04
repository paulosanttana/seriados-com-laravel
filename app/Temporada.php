<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    //mapeamento do relacionamento (Temporada tem varias'hasMany' Episodios)
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    //mapeamento do relacionamento (Temporada pertece a um Seriado)
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
