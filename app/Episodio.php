<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Temporada;

class Episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    //mapeamento do relacionamento (Episodio pertece a Temporada)
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);   
    }
}
