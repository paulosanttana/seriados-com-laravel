<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    //mapeamento do relacionamento (Episodio pertece a Temporada)
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);   
    }
}
