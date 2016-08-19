<?php

namespace Santasangre\Modelos;

use Illuminate\Database\Eloquent\Model;

class PerfilUsuario extends Model
{
    protected $table = 'usuario_perfil';

    
    protected $fillable = ['nombres', 'apellidos', 'genero','fecha_nacimiento','id_usuario'];

    //relaciones

    public function usuarios()
    {
    	return $this->belongsTo('Santasangre\Modelos\Usuarios','id_usuarios');
    }
}
