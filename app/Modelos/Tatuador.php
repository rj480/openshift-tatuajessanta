<?php

namespace Santasangre\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tatuador extends Model
{
	protected $table = 'tatuador';


	protected $fillable = ['nombres', 'apellidos', 'telefono','descripcion','imagen','red_social'];

	public function trabajos()
	{
		return $this->hasOne('Santasangre\Modelos\TrabajoTatuador', 'id_tatuador');
	}


	public function getList()
    {
        $lista = $this->where('id', '!=', 1)->lists('nombres', 'id')->toArray();
        $lista = [0 => 'Seleccione uno'] + $lista;
        return $lista;
    }
}
