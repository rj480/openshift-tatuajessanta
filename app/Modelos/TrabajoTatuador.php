<?php

namespace Santasangre\Modelos;

use Illuminate\Database\Eloquent\Model;

class TrabajoTatuador extends Model
{
     protected $table = 'trabajo_tatuador';

    
    protected $fillable = ['imagen', 'enlace', 'descripcion','categoria','id_tatuador'];

    public function tatuador()
    {
    	return $this->belongsTo('Santasangre\Modelos\Tatuador','id_tatuador');
    }
}
